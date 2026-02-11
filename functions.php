<?php
/**
 * テーマのスタイルとスクリプトを読み込む
 */
function craftjob_enqueue_assets() {
	$theme_uri = get_template_directory_uri();
	$theme_path = get_template_directory();

	// メインスタイルシート（キャッシュ対策のため filemtime でバージョン指定）
	wp_enqueue_style(
		'craftjob-style',
		$theme_uri . '/css/style.css',
		array(),
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
add_filter( 'script_loader_tag', 'craftjob_add_module_to_script', 10, 3 );
function craftjob_add_module_to_script( $tag, $handle, $src ) {
	if ( 'craftjob-main' === $handle ) {
		$tag = str_replace( '<script ', '<script type="module" ', $tag );
	}
	return $tag;
}
add_action( 'wp_enqueue_scripts', 'craftjob_enqueue_assets' );


/**
 * Craft Jobのテーマ用の関数
 * カスタマイザーで運営会社のリンクを追加(変更を見据えて)
 * 管理画面→外観→カスタマイズ→連絡先・会社情報→運営会社URL
 * 運営会社URLを入力しない場合は、デフォルトのURLになります。
 * 運営会社URLを入力すると、フッターの運営会社リンクがそのURLになります。
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
}
add_action( 'customize_register', 'craftjob_customize_register' );