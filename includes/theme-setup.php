<?php
/**
 * タイトルタグ・アイキャッチ画像の設定
 */
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

/**
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