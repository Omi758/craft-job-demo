# 🧩 Craft Job – WordPress Original Theme（架空サイト）

![craft job demo-site](img/craftjob_git-screenshot.webp "craft job demo-site")

## 🔗 Demo

（Demo Site URL）
https://craftjob.omiportfolio.com/

## 📝 Overview（概要）

制作期間：約 2 ヶ月（2026 年 2月〜4月）

HelloMentor 課題として制作した **Web制作業界に特化した求人検索サイト** です。  
**WordPress オリジナルテーマ**として構築し、求人の検索・閲覧・お気に入り登録といった求人サイトに必要な機能を実装しています。

- 複数条件の掛け合わせ絞り込み検索（地域 × 雇用形態 × 職種 × 年収）
- お気に入り機能（localStorage + Ajax）
- 閲覧数ベースの人気ランキング（直近7日間集計）
- レスポンシブ対応（SP / PC）
- SEO / セキュリティ / アクセシビリティを考慮した設計
- WordPress オリジナルテーマ（PHP / テンプレート階層に沿って構築）
- カスタム投稿タイプ：求人（recruit）・会社（company）
- 4つのカスタムタクソノミー：職種・地域（階層あり）・雇用形態・タグ

## 🛠️ Tech Stack（使用技術）

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" width="40" height="40" /> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" width="40" height="40" /> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg" alt="SCSS" width="40" height="40" /> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JavaScript" width="40" height="40" /> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/wordpress/wordpress-original.svg" alt="WordPress" width="40" height="40" /> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg" alt="PHP" width="40" height="40" /> <img src="https://img.shields.io/badge/Splide-005BBB?style=for-the-badge" alt="Splide" />

## ✨ Features（制作ポイント）

### 1. 複数条件の掛け合わせ絞り込み検索

地域・雇用形態・職種・年収の4条件を組み合わせた検索機能。`pre_get_posts` で `tax_query` + `meta_query` をメインクエリに差し込み、検索条件を反映。地域は親子階層（7地方 / 47都道府県）を持ち、親ターム選択時に子タームも含めて検索。

### 2. お気に入り機能（localStorage + Ajax）

localStorage の求人IDリストを Ajax でサーバーに送信し、`WP_Query` でカードHTMLを返却する設計。ログイン不要で利用可能、ヘッダーバッジに件数をリアルタイム反映。

### 3. 閲覧数ベースの人気ランキング

閲覧数を日別に `post_meta` で記録し、直近7日間の合計値で自動ランキング。管理者・ボットは除外、古いデータは自動削除。管理画面にもPVカラムを追加しソート可能。

### 4. 求人と会社情報の分離設計

会社データを別カスタム投稿タイプとして管理し、ACF 投稿オブジェクトで参照。1社から複数の求人を投稿する場合でもデータの重複がなく、会社情報の更新が1箇所で完結。

### 5. URL設計とリライトルール

求人詳細 `/recruit/{ID}/`、コラム `/column/{スラッグ}/`、人気ランキング `/recruit/popular/`、コラムカテゴリー `/column/category/{スラッグ}/` など、すべてリライトルールできれいなURLを実現。

### 6. 運用性とセキュリティ

ACF Wysiwyg にカスタムツールバーを定義し不要な入力メニューを非表示。コラム記事の使用可能ブロックを制限して表示崩れを防止。エディタスタイルでフロントと管理画面の見た目を統一。CF7 エントリーフォームは特殊メールタグでサーバー側から求人情報を取得し、改ざんリスクを排除。reCAPTCHA v3 とハニーポットの二重構成によるスパム対策。

### 7. SEO・アクセシビリティ

ページ種別ごとの title / description 自動生成、検索結果・お気に入りページへの noindex 設定、OGP / Twitterカード / XMLサイトマップの設定。aria 属性・visually-hidden・セマンティック HTML によるアクセシビリティ対応。

### 8. 保守性を意識したコード設計

functions.php を機能別に12ファイルへ分割。SCSS はコンポーネント単位のファイル分割。JavaScript は ES Modules でモジュール化。

## 📂 Directory（主な構成）

```
.
├── front-page.php
├── home.php
├── archive-recruit.php
├── single-recruit.php
├── single.php
├── taxonomy.php
├── page-contact.php
├── page-privacy.php
├── 404.php
├── index.php
├── header.php
├── footer.php
├── functions.php
├── editor-style.css
├── style.css
├── includes
│   ├── admin.php
│   ├── assets.php
│   ├── breadcrumb.php
│   ├── cf7.php
│   ├── editor.php
│   ├── favorite.php
│   ├── pageviews.php
│   ├── query.php
│   ├── rewrite.php
│   ├── security.php
│   ├── seo.php
│   └── theme-setup.php
├── template-parts
│   ├── breadcrumb.php
│   ├── card-column.php
│   ├── card-recruit.php
│   ├── card-recruit-ranking.php
│   ├── card-recruit-simple.php
│   ├── search-form.php
│   └── search-form-top.php
├── js
│   ├── main.js
│   ├── component
│   │   ├── favorite.js
│   │   ├── kana-validation.js
│   │   ├── search-form-accordion.js
│   │   ├── smooth-scroll.js
│   │   ├── switch-viewport.js
│   │   └── top-slider.js
│   └── vendor
│       └── splide.min.js
├── scss
│   ├── style.scss
│   ├── component
│   │   ├── _breadcrumb.scss
│   │   ├── _button.scss
│   │   ├── _card.scss
│   │   ├── _cf7-form.scss
│   │   ├── _pagination.scss
│   │   ├── _pill-link.scss
│   │   ├── _search-form.scss
│   │   ├── _slider.scss
│   │   └── _title.scss
│   ├── foundation
│   │   ├── _base.scss
│   │   └── _reset.scss
│   ├── global
│   │   ├── _breakpoints.scss
│   │   ├── _color.scss
│   │   ├── _content-width.scss
│   │   ├── _font.scss
│   │   ├── _mixin.scss
│   │   └── _z-index.scss
│   ├── layout
│   │   ├── _container.scss
│   │   ├── _footer.scss
│   │   ├── _header.scss
│   │   └── _recruit-container.scss
│   ├── page
│   │   ├── _contact.scss
│   │   ├── _page-404.scss
│   │   ├── _privacy.scss
│   │   ├── column
│   │   │   ├── _column-archive.scss
│   │   │   └── _column-single.scss
│   │   ├── recruit-single
│   │   │   └── _recruit-single.scss
│   │   └── top
│   │       ├── _top-column.scss
│   │       ├── _top-kv.scss
│   │       ├── _top-search.scss
│   │       └── _top-slider.scss
│   └── utility
│       ├── _hover.scss
│       └── _utility.scss
├── css
│   ├── style.css
│   └── vendor
│       └── splide-core.min.css
└── img
    ├── common
    │   └── header
    └── top
```

## 💻 Development Environment（開発環境）

- Local by Flywheel（WordPress）
- Cursor
- Live Sass Compiler
- ホットリロード環境（node_modules / BrowserSync）

## 📦 Plugins（主な使用プラグイン）

| プラグイン                       | 用途                                        |
| -------------------------------- | ------------------------------------------- |
| Custom Post Type UI              | カスタム投稿タイプ・タクソノミーの登録      |
| Advanced Custom Fields           | カスタムフィールドの設定                    |
| SEO SIMPLE PACK                  | SEO関連（title・description・OGP・noindex） |
| Contact Form 7                   | お問い合わせ・エントリーフォーム            |
| Breadcrumb NavXT                 | パンくずリスト                              |
| Easy Table of Contents           | 目次自動生成                                |
| Snow Monkey Blocks               | 追加ブロック（吹き出し・ボックス）          |
| CloudSecure WP Security          | セキュリティ                                |
| EWWW Image Optimizer             | 画像の最適化                                |
| XML Sitemap Generator for Google | XMLサイトマップ                             |

## ⚠️ Notes（注意事項）

- 本テーマは学習用に制作しています。
- 求人データ・会社情報はすべて架空のものです。
