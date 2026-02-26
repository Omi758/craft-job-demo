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