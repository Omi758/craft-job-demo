<?php
/**
 * Craft Jobのテーマ用の関数
 */
// アセット読み込み
require_once get_template_directory() . '/includes/assets.php';

// テーマ基本設定・カスタマイザー
require_once get_template_directory() . '/includes/theme-setup.php';

// パンくずリスト
require_once get_template_directory() . '/includes/breadcrumb.php';

// メインクエリ制御
require_once get_template_directory() . '/includes/query.php';

// リライトルール・パーマリンク
require_once get_template_directory() . '/includes/rewrite.php';

// SEO対策(タイトル・description・noindex)
require_once get_template_directory() . '/includes/seo.php';

// 閲覧数カウント・ランキング
require_once get_template_directory() . '/includes/pageviews.php';

// お気に入り求人(Ajax)
require_once get_template_directory() . '/includes/favorite.php';

// Contact Form 7
require_once get_template_directory() . '/includes/cf7.php';

// エディタ・カスタムブロック設定
require_once get_template_directory() . '/includes/editor.php';

// 管理画面カスタマイズ
require_once get_template_directory() . '/includes/admin.php';

// セキュリティ対策
require_once get_template_directory() . '/includes/security.php';