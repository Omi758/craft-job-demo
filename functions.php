<?php
/**
 *  * Craft Jobのテーマ用の関数
 * テーマのスタイルとスクリプトを読み込む
 */
/**
 * Google Fonts用のpreconnect（早期接続で読み込み最適化）
 */
function craftjob_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.googleapis.com',
			'crossorigin' => false,
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => true,
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'craftjob_resource_hints', 10, 2 );

function craftjob_enqueue_assets() {
	$theme_uri = get_template_directory_uri();
	$theme_path = get_template_directory();

	// Google Fonts（外部URLのためバージョンは固定）
	wp_enqueue_style(
		'craftjob-google-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap',
		array(),
		null
	);

	// メインスタイルシート（キャッシュ対策のため filemtime でバージョン指定）
	wp_enqueue_style(
		'craftjob-style',
		$theme_uri . '/css/style.css',
		array( 'craftjob-google-fonts' ),
		filemtime( $theme_path . '/css/style.css' )
	);

	// メインスクリプト（type="module" を付与）
	wp_enqueue_script(
		'craftjob-main',
		$theme_uri . '/js/main.js',
		array(),
		filemtime( $theme_path . '/js/main.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'craftjob_enqueue_assets' );

// メインスクリプトにtype="module"を追加_ESModule専用
function craftjob_add_module_to_script( $tag, $handle, $src ) {
	if ( 'craftjob-main' === $handle ) {
		$tag = str_replace( '<script ', '<script type="module" ', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'craftjob_add_module_to_script', 10, 3 );



/**
 * カスタマイザーで運営会社のリンクを追加(変更を見据えて)
 * 管理画面→外観→カスタマイズ→連絡先・会社情報→運営会社URL
 * 運営会社URLを入力しない場合は、デフォルトのURL
 * 運営会社URLを入力すると、フッターの運営会社リンクがそのURL。
 */

function craftjob_customize_register( $wp_customize ) {
  $wp_customize->add_section( 'craftjob_contact_section', array(
      'title' => '連絡先・会社情報',
  ) );
  
  $wp_customize->add_setting( 'craftjob_company_url', array(
      'default'           => 'https://google.com/',
      'sanitize_callback' => 'esc_url_raw',
  ) );
  
  $wp_customize->add_control( 'craftjob_company_url', array(
      'label'   => '運営会社URL',
      'section' => 'craftjob_contact_section',
      'type'    => 'url',
  ) );

	// 運営会社名
	$wp_customize->add_setting( 'craftjob_company_name', array(
		'default' => 'LIBERA inc.',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'craftjob_company_name', array(
		'label' => '運営会社名',
		'section' => 'craftjob_contact_section',
		'type' => 'text',
	) );
}
add_action( 'customize_register', 'craftjob_customize_register' );


/**
 * アイキャッチ画像の設定
 */
add_theme_support( 'post-thumbnails' );

/**
 * Contact Form 7の整形機能を無効化
 */
add_filter( 'wpcf7_autop_or_not', 'my_wpcf7_autop' );
	function my_wpcf7_autop() {
		return false;
	}

/**
 * Contact Form 7のふりがな欄にひらがなバリデーションを追加
 * ひらがな・長音符（ー）・スペースのみ許可
 */
add_filter( 'wpcf7_validate_text*', 'craftjob_validate_kana', 20, 2 );
function craftjob_validate_kana( $result, $tag ) {
    if ( 'your-kana' === $tag->name ) {
        $value = isset( $_POST['your-kana'] ) ? trim( $_POST['your-kana'] ) : '';
        if ( ! empty( $value ) && ! preg_match( '/^[ぁ-んー\s]+$/u', $value ) ) {
            $result->invalidate( $tag, 'ひらがなで入力してください。' );
        }
    }
    return $result;
}

/**
 * コラム一覧_カード表示件数：9件/1P
 * タクソノミー（taxonomy.php）_カード表示件数12件/1P
 * カード表示件数12件/1P_archive-recruit.php
 * タクソノミー条件（tax_query）の組み立て_archive-recruit.php
 * 年収条件（meta_query）の組み立て_archive-recruit.php
 */
function craftjob_posts_per_page( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	// コラム一覧_表示件数9件
	if ( $query->is_home() ) {
		$query->set( 'posts_per_page', 9 );

		// カテゴリパラメータで記事を絞り込む
		if ( isset( $_GET['category'] )  && '' !== $_GET['category']) {
			$category_slug = sanitize_text_field( wp_unslash( $_GET['category'] ));
			$category = get_category_by_slug($category_slug);
			if ( $category ) {
			    $query->set( 'category_name', $category_slug );
			}
		}
}

// タクソノミー一覧_表示件数12件
		if ( $query->is_tax() ) {
			$query->set( 'posts_per_page', 12 );
		}

		// 求人（検索対応）_表示件数12件
		if ( $query->is_post_type_archive( 'recruit' ) ) {
			$query->set( 'posts_per_page', 12 );

	// ========= 検索ロジック =========
	// 1. タクソノミー条件の組み立て
	$tax_query = array();

	// 地域
	if ( !empty( $_GET['area'] ) ) {
		$area_slug = sanitize_text_field( wp_unslash( $_GET['area'] ) );
		$tax_query[] = array(
			'taxonomy' => 'area',
			'field'    => 'slug',
			'terms'    => $area_slug,
			'include_children' => true,
		);
	}

	// 雇用形態
	if( !empty( $_GET['employment_type'] ) ) {
		$employment_slug = sanitize_text_field( wp_unslash( $_GET['employment_type'] ) );
		$tax_query[] = array(
			'taxonomy' => 'employment_type',
			'field'    => 'slug',
			'terms'    => $employment_slug,
		);
	}

	// 職種
	if ( ! empty( $_GET['job_category'] ) ) {
		$job_slug = sanitize_text_field( wp_unslash( $_GET['job_category']) );
		$tax_query[] = array(
			'taxonomy' => 'job_category',
			'field'    => 'slug',
			'terms'    => $job_slug,
		);
	}

	if ( ! empty( $tax_query ) ) {
		$tax_query['relation'] = 'AND';
		$query->set( 'tax_query', $tax_query );
	}

	// 2. 年収条件（meta_query）の組み立て
	$meta_query = array();

	if ( ! empty( $_GET['salary_min'] ) ) {
		$meta_query[] = array(
			'key'     => 'salary',
			'value'   => intval( $_GET['salary_min'] ),
			'compare' => '>=',
			'type'    => 'NUMERIC',
		);
	}

	if ( ! empty( $_GET['salary_max'] ) ) {
		$meta_query[] = array(
			'key'     => 'salary',
			'value'   => intval( $_GET[ 'salary_max' ] ),
			'compare' => '<=',
			'type'    => 'NUMERIC',
		);
	}

	if ( !empty( $meta_query ) ) {
		$meta_query['relation'] = 'AND';
		$query->set( 'meta_query', $meta_query );
	}
}
}
add_action( 'pre_get_posts', 'craftjob_posts_per_page' );

/**
 * ページネーション
 * 各要素にはWordPressが付けるCSSクラスが含まる。
 * これを strpos() で判別して自分のHTML構造に当てはめる。
 * [
 * '<a class="prev page-numbers" href="...">前へ</a>',       // (1) 前へ
 * '<a class="page-numbers" href="...">1</a>',               // (2) ページ番号
 * '<span class="page-numbers current">2</span>',            // (3) 現在のページ
  *'<a class="page-numbers" href="...">3</a>',               // (2) ページ番号
  *'<span class="page-numbers dots">&hellip;</span>',         // (4) ドット
  *'<a class="page-numbers" href="...">10</a>',              // (2) ページ番号
  *'<a class="next page-numbers" href="...">次へ</a>',       // (5) 次へ
 *]
 */
function craftjob_pagination() {
	$links = paginate_links( [
		'type'      => 'array',
		'mid_size'  => 1,
		'prev_text' => 'prev',
		'next_text' => 'next',
	] );

	if ( ! $links ) {
		return;
	}

	echo '<div class="c-pagination-container">';
	echo '<nav class="c-pagination-nav" aria-label="ページネーション">';
	echo '<ul class="c-pagination-list">';

	foreach ( $links as $link ) {
		echo '<li class="c-pagination-item">';

		// URLを取り出す
		preg_match( '/href=["\']([^"\']+)["\']/', $link, $url_match );
		$url = ! empty( $url_match[1] ) ? esc_url( $url_match[1] ) : '';

		// ページ番号を取り出す
		preg_match( '/>(\d+)</', $link, $num_match );
		$page_num = ! empty( $num_match[1] ) ? $num_match[1] : '';

		if ( strpos( $link, 'prev' ) !== false ) {
			// (1) 前へボタン
			echo '<a href="' . $url . '" class="c-pagination-link c-pagination-link--prev">';
			echo '<span class="u-visually-hidden">前のページ</span>';
			echo '</a>';

		} elseif ( strpos( $link, 'next' ) !== false ) {
			// (5) 次へボタン
			echo '<a href="' . $url . '" class="c-pagination-link c-pagination-link--next">';
			echo '<span class="u-visually-hidden">次のページ</span>';
			echo '</a>';

		} elseif ( strpos( $link, 'current' ) !== false ) {
			// (3) 現在のページ
			echo '<a class="c-pagination-link is-active" aria-current="page">';
			echo '<span class="u-visually-hidden">現在のページ：</span>';
			echo esc_html( $page_num );
			echo '<span class="u-visually-hidden">ページ目</span>';
			echo '</a>';

		} elseif ( strpos( $link, 'dots' ) !== false ) {
			// (4) ドット
			echo '<span class="c-pagination-dots" aria-hidden="true">';
			echo '<span class="c-pagination-dots-icon"></span>';
			echo '</span>';

		} else {
			// (2) 通常のページ番号リンク
			echo '<a href="' . $url . '" class="c-pagination-link">';
			echo esc_html( $page_num );
			echo '<span class="u-visually-hidden">ページ目</span>';
			echo '</a>';
		}

		echo '</li>';
	}

	echo '</ul>';
	echo '</nav>';
	echo '</div>';
}


	/**
 * パンくずリストのカテゴリーURLを/column/?category={slug}に変更
 */
function craftjob_breadcrumb_category_url( $url, $type, $id ) {
	if ($type[0] === 'taxonomy' && $type[1] === 'category') {
		$term = get_term( $id, 'category' );
		if ($term && ! is_wp_error( $term )) {
			$url = home_url( '/column/?category=' . $term->slug );
		}
	}
	return $url;
}
add_filter( 'bcn_breadcrumb_url', 'craftjob_breadcrumb_category_url', 10, 3 );

	/**
 * ブロックエディタ_カスタムブロックスタイル（もくじ）
 */
function craftjob_register_block_styles() {
	register_block_style(
		'snow-monkey-blocks/box', // ブロック名
		array(
			'name' => 'toc',
			'label' => 'もくじ',
		)
	);
}
add_action( 'init', 'craftjob_register_block_styles' );


/**
 * エディタスタイルの読み込み
 */
function craftjob_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'craftjob_editor_styles' );

/**
 * セキュリティ対策
 * 参考記事：https://baigie.me/officialblog/2020/01/28/wordpress-security/
 */
remove_action( 'wp_head', 'wp_generator' ); // WordPressのバージョン
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // 短縮URLのlink
remove_action( 'wp_head', 'wlwmanifest_link' ); // ブログエディターのマニフェストファイル
remove_action( 'wp_head', 'rsd_link' ); // 外部から編集するためのAPI
remove_action( 'wp_head', 'feed_links_extra', 3 ); // フィードへのリンク
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // 絵文字に関するJavaScript
remove_action( 'wp_head', 'rel_canonical' ); // カノニカル
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // 絵文字に関するCSS
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // 絵文字に関するJavaScript
remove_action( 'admin_print_styles', 'print_emoji_styles' ); // 絵文字に関するCSS