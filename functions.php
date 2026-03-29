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

	// Splide CSS
	wp_enqueue_style(
		'splide-css',
		$theme_uri . '/css/vendor/splide-core.min.css',
		array(),
		null
	);

	// メインスタイルシート（キャッシュ対策のため filemtime でバージョン指定）
	wp_enqueue_style(
		'craftjob-style',
		$theme_uri . '/css/style.css',
		array( 'craftjob-google-fonts', 'splide-css' ),
		filemtime( $theme_path . '/css/style.css' )
	);

// Splide JS
wp_enqueue_script(
	'splide-js',
	$theme_uri . '/js/vendor/splide.min.js',
	array(),
	null,
	true
);


	// メインスクリプト（type="module" を付与）
	wp_enqueue_script(
		'craftjob-main',
		$theme_uri . '/js/main.js',
		array( 'splide-js' ),
		filemtime( $theme_path . '/js/main.js' ),
		true
	);

	// お気に入り用のスクリプト
	wp_localize_script( 'craftjob-main', 'craftjobAjax', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
	) );
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
 * タイトルタグ・アイキャッチ画像の設定
 */
add_theme_support( 'title-tag' );
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
      // 人気ランキング
			if ( 'popular' === get_query_var( 'craftjob_page' ) ) {
				$query->set( 'posts_per_page', 10 );
				$query->set( 'meta_key', 'craftjob_views_7days' );
				$query->set( 'orderby', 'meta_value_num' );
				$query->set( 'order', 'DESC' );
				return;
			}

			
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
 * パンくずの「求人」を「求人を探す」に変更
 */
function craftjob_breadcrumb_rename_recruit( $title, $type, $id ) {
	if ( $type[0] === 'archive' && $title === '求人' ) {
			$title = '求人を探す';
	}
	return $title;
}
add_filter( 'bcn_breadcrumb_title', 'craftjob_breadcrumb_rename_recruit', 10, 3 );


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
 * カスタムクエリ変数を登録
 */
function craftjob_custom_query_vars( $vars ) {
	$vars[] ='craftjob_page';
	return $vars;
}
add_filter( 'query_vars', 'craftjob_custom_query_vars' );


/**
 * リライトルールを追加(/recruit/popular/と/recruit/favorite/)
 */
function craftjob_custom_rewrite_rules() {
	add_rewrite_rule(
		'recruit/popular/?$',
		'index.php?post_type=recruit&craftjob_page=popular',
		'top'
	);
	add_rewrite_rule(
		'recruit/favorite/?$',
		'index.php?post_type=recruit&craftjob_page=favorite',
		'top'
	);
}
add_action( 'init', 'craftjob_custom_rewrite_rules' );


/**
 * 通常投稿(column)のパーマリンクに/column/プレフィクスを追加
 * */
function craftjob_column_permalink( $permalink, $post ) {
	if ( 'post' === $post->post_type ) {
		$permalink = home_url( '/column/' . $post->post_name . '/' );
	}
	return $permalink;
}
add_filter( 'post_link', 'craftjob_column_permalink', 10, 2 );

/**
 * /column/記事名/のリライトルールを追加
*/
function craftjob_column_rewrite_rules(){
	add_rewrite_rule(
		'column/([^/]+)/?$',
		'index.php?name=$matches[1]',
		'top'
	);
}
add_action( 'init', 'craftjob_column_rewrite_rules' );


/**
 * /recruit/記事ID/のリライトルールを追加
*/
function craftjob_recruit_permalink( $permalink, $post ) {
	if ( 'recruit' === $post->post_type ) {
		$permalink = home_url( '/recruit/' . $post->ID . '/');
	}
	return $permalink;
}
add_filter('post_type_link', 'craftjob_recruit_permalink', 10,2);

/**
 * /recruit/数字/のリライトルールを追加（記事IDを直接指定）
*/
function craftjob_recruit_id_rewrite_rules(){
	add_rewrite_rule(
		'recruit/([0-9]+)/?$',
		'index.php?post_type=recruit&p=$matches[1]',
		'top'
	);
}
add_action( 'init', 'craftjob_recruit_id_rewrite_rules' );

// 求人の編集画面からスラッグ欄を非表示にする_記事IDを直接指定するため管理画面slug欄を非表示にする
function craftjob_remove_slug_meta_box(){
	remove_meta_box( 'slugdiv', 'recruit', 'normal' );
}
add_action( 'admin_menu', 'craftjob_remove_slug_meta_box' );



/**
 * エディタスタイルの読み込み
 */
function craftjob_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'craftjob_editor_styles' );


/**
 * 求人詳細ページの閲覧数を日別にカウント + 7日間合計を更新
 */
 function craftjob_count_post_views() {
	// ガード１_求人詳細ページ以外は何もしない
	if ( ! is_singular( 'recruit' ) ) {
		return;
	}

	// ガード２_管理者（ログイン中）のアクセスは除外
	if ( current_user_can( 'manage_options' ) ) {
		return;
	}

	// ガード３_bot（クローラー）のアクセスは除外
	if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && preg_match( '/bot|crawler|spider|slurp/i', $_SERVER['HTTP_USER_AGENT'] ) ) {
		return;
	}

  // 現在の投稿IDを取得
  $post_id = get_the_ID();

  // 今日の日付キーを作る（例： craftjob_views_20260322）
  $today_key = 'craftjob_views_' . current_time( 'Ymd' );

  // 現在のカウントを取得
  $current_count = (int) get_post_meta( $post_id, $today_key, true );

  // +1して更新
  update_post_meta( $post_id, $today_key, $current_count + 1 );

  // 7日間合計を更新
  craftjob_update_7days_total( $post_id );

}

 add_action( 'wp_head', 'craftjob_count_post_views' );


/**
 * 直近７日間の閲覧数合計を計算し、post_metaに保存
 * ８日以上前の日別データを削除（掃除）
 */
function craftjob_update_7days_total( $post_id ) {
	$total = 0;

	// 直近７日分のキーを作って合算
	for ( $i = 0; $i < 7; $i++ ) {
		$date_key = 'craftjob_views_' . date( 'Ymd', strtotime( '-' . $i . ' days', current_time( 'timestamp' ) ) );
		$total += (int) get_post_meta( $post_id, $date_key, true );
	}

	// 合計値を保存（ランキングのソートに使用）
	update_post_meta( $post_id, 'craftjob_views_7days', $total );

	// 8日以上前のデータを削除（14日前まで遡って掃除）
	for ( $i = 8; $i <= 14; $i++ ) {
		$old_key = 'craftjob_views_' . date( 'Ymd', strtotime( '-' . $i . ' days', current_time( 'timestamp' )  ) );
	  delete_post_meta( $post_id, $old_key );
	}
}


/**
* 管理画面の求人一覧に「７日間PV」カラムを追加
*/
// 1_カラムの見出しを追加
function craftjob_add_views_column( $columns ) {
	$columns['views_7days'] = '7日間PV';
	return $columns;
}

add_filter( 'manage_recruit_posts_columns', 'craftjob_add_views_column' );

// カラムの中身を表示
function craftjob_display_views_column( $column, $post_id ) {
	if ( 'views_7days' === $column ) {
		$views = (int) get_post_meta( $post_id, 'craftjob_views_7days', true );
		echo esc_html( $views );
	}
}
add_action( 'manage_recruit_posts_custom_column', 'craftjob_display_views_column', 10, 2 );

// 3_ソート可能にする
function craftjob_sortable_views_column( $columns ) {
	$columns['views_7days'] = 'craftjob_views_7days';
	return $columns;
}
add_filter( 'manage_edit-recruit_sortable_columns', 'craftjob_sortable_views_column' );

// ソート時のクエリを制御
function craftjob_views_orderby( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() ) {
		return;
	}
  if ( 'craftjob_views_7days' === $query->get( 'orderby' ) ) {
	  $query->set( 'meta_key', 'craftjob_views_7days' );
	  $query->set( 'orderby', 'meta_value_num' );
  }
}
add_action( 'pre_get_posts', 'craftjob_views_orderby' );


/**
 * 求人を公開したときに閲覧数の初期値を設定
 */
function craftjob_set_initial_views( $post_id, $post ) {
	if ( 'recruit' !== $post->post_type ) {
			return;
	}
	if ( '' === get_post_meta( $post_id, 'craftjob_views_7days', true ) ) {
			update_post_meta( $post_id, 'craftjob_views_7days', 0 );
	}
}
add_action( 'wp_insert_post', 'craftjob_set_initial_views', 10, 2 );


/**
 * お気に入り求人をAjaxで取得
 */
function craftjob_get_favorites() {
	// JSから贈られたIDリストを受け取る
	$ids = isset( $_POST['ids'] ) ? array_map( 'intval', $_POST['ids'] ) : array();

	if ( empty( $ids ) ) {
		wp_send_json_error( 'IDがありません' );
	}

	// 受け取ったIDで求人を取得
	$query =new WP_Query( array(
		'post_type'    => 'recruit',
		'post__in'     => $ids,
		'posts_per_page' => -1,
		'orderby'      => 'post__in',
	) );

	// カードのHTMLを組み立てる
	ob_start();
	if ( $query->have_posts() ) :
		 while ( $query->have_posts() ) : $query->the_post();
			  get_template_part( 'template-parts/card-recruit' );
	   endwhile;
	   wp_reset_postdata();
     endif;
     $html = ob_get_clean();
	 wp_send_json_success( $html );
}

add_action( 'wp_ajax_get_favorites', 'craftjob_get_favorites' );
add_action( 'wp_ajax_nopriv_get_favorites', 'craftjob_get_favorites' );


/**
 * 検索結果・お気に入りページにnoindexを設定
 */
function craftjob_custom_noindex() {
	if ( ! is_post_type_archive( 'recruit' ) ) {
		return;
	}

	$is_favorite = 'favorite' === get_query_var( 'craftjob_page' );
	$has_search = ! empty( $_GET['area'] ) || ! empty( $_GET['employment_type'] ) || ! empty( $_GET['job_category']) || ! empty( $_GET['salary_min']) || ! empty( $_GET['salary_max']);

	if ( $is_favorite || $has_search ) {
		echo '<meta name="robots" content="noindex">' . "\n";
	}
}
add_action( 'wp_head', 'craftjob_custom_noindex' );


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