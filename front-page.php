<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?php bloginfo("name"); ?> | <?php bloginfo("description"); ?></title>
  <meta name="description" content="制作会社のNo.1掲載数!Web制作会社への転職を、最短ルートで。CraftJobはリモート求人多数、未経験可の求人あり。今旬の求人検索サイトです。" />
  <meta name="format-detection" content="telephone=no" />

  <!-- favicon/webclipicon -->
  <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/favicon.png' ); ?>" />
  <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/favicon.svg' ); ?>"
    type="image/svg+xml" />
  <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/ogp.png' ); ?>" />

  <!-- ogp -->
  <meta property="og:site_name" content="Craft Job | Web制作会社への転職を最短ルートで" />
  <meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>" />
  <meta property="og:type" content="website or article" />
  <meta property="og:title" content="Craft Job | Web制作会社への転職を最短ルートで" />
  <meta property="og:description"
    content="制作会社のNo.1掲載数!Web制作会社への転職を、最短ルートで。CraftJobはリモート求人多数、未経験可の求人あり。今旬の求人検索サイトです。" />
  <meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() . '/img/ogp.png' ); ?>" />
  <meta property="og:locale" content="ja_JP" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description"
    content="制作会社のNo.1掲載数!Web制作会社への転職を、最短ルートで。CraftJobはリモート求人多数、未経験可の求人あり。今旬の求人検索サイトです。" />
  <meta name="twitter:image:src" content="<?php echo esc_url( get_template_directory_uri() . '/img/ogp.png' ); ?>" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

  <!-- css -->
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/css/style.css' ); ?>" />

  <!-- noindex_実案件では削除のこと！！ -->
  <meta name="robots" content="noindex" />

  <!-- js -->
  <script type="module" src="<?php echo esc_url( get_template_directory_uri() . '/js/main.js' ); ?>"></script>
</head>

<body <?php body_class(); ?>>
  <!-- header -->
  <header class="l-header">
    <div class="l-header-inner l-container">
      <h1 class="l-header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/common/logo.svg' ); ?>" width="122"
            height="25" alt="Craft Job" decoding="async" />
        </a></h1>
      <nav class="l-header-nav">
        <ul class="l-header-nav-list">
          <li class="l-header-nav-item l-header-nav-item--recruit"><a
              href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">求人を探す</a>
          </li>
          <li class="l-header-nav-item l-header-nav-item--popular"><a
              href="<?php echo esc_url( add_query_arg( 'orderby', 'popular', home_url( '/recruit/' ) ) ); ?>">人気求人</a>
          </li>
          <li class="l-header-nav-item l-header-nav-item--favorite"><a
              href="<?php echo esc_url( add_query_arg( 'view', 'favorite', home_url( '/recruit/' ) ) ); ?>">お気に入り
              <span class="l-header-nav-item-badge">6</span></a>
          </li>
          <li class="l-header-nav-item l-header-nav-item--column"><a
              href="<?php echo esc_url( home_url( '/column/' ) ); ?>">就活コラム</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- /header -->
  <!-- main -->
  <main class="l-main">
    <div>コーディングテンプレート</div>
  </main>
  <!-- /main -->
  <!-- footer -->
  <footer class="l-footer">
    <div class="l-footer-inner l-container">
      <nav class="l-footer-nav">
        <ul class="l-footer-nav-list">
          <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">ホーム</a></li>
          <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">求人を探す</a></li>
          <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">人気求人</a></li>
          <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">お気に入り</a></li>
          <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">就活コラム</a></li>
          <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">お問い合わせ</a></li>
          <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">プライバシーポリシー</a></li>
          <li class="l-footer-nav-item l-footer-nav-item--company"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">運営会社</a></li>
        </ul>
      </nav>

      <small class="l-footer-copyright">
        &copy; <?php echo date( 'Y' ); ?> LIBERA inc.
      </small>
    </div>
  </footer>
  <!-- /footer -->
</body>

</html>