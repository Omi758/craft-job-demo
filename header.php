<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />

  <!-- favicon/webclipicon -->
  <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/favicon.png' ); ?>" />
  <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/favicon.svg' ); ?>"
    type="image/svg+xml" />
  <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/ogp.png' ); ?>" />

  <!-- noindex_実案件では削除のこと！！ -->
  <meta name="robots" content="noindex" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- ハッシュ付き遷移のちらつき防止(求人カード→エントリーフォームへの遷移時) -->
  <script>
  if (window.location.hash) {
    document.body.classList.add("is-hash-loading");
  }
  </script>
  <!-- header -->
  <header class="l-header">
    <div class="l-header-inner l-container">
      <?php if ( is_front_page() ) : ?>
      <h1 class="l-header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/common/logo.svg' ); ?>" width="122"
            height="25" alt="Craft Job" decoding="async" />
        </a></h1>
      <?php else : ?>
      <div class="l-header-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/common/logo.svg' ); ?>" width="122"
            height="25" alt="Craft Job" decoding="async" />
        </a>
      </div>
      <?php endif; ?>

      <nav class="l-header-nav">
        <ul class="l-header-nav-list">
          <li class="l-header-nav-item l-header-nav-item--recruit"><a
              href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>"><span>求人を探す</span></a>
          </li>
          <li class="l-header-nav-item l-header-nav-item--popular"><a
              href="<?php echo esc_url( home_url( '/recruit/popular/' )  ); ?>"><span>人気求人</span></a>
          </li>
          <li class="l-header-nav-item l-header-nav-item--favorite"><a
              href="<?php echo esc_url( home_url( '/recruit/favorite/' ) ); ?>"><span>お気に入り</span><span
                class="l-header-nav-item-badge js-favorite-badge">0</span></a>
          </li>
          <li class="l-header-nav-item l-header-nav-item--column"><a
              href="<?php echo esc_url( home_url( '/column/' ) ); ?>"><span>就活コラム</span></a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- header end -->