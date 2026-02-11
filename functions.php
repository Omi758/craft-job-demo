<?php
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