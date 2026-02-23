<?php get_header(); ?>
<!-- パンくず -->
<div class="c-breadcrumb-container">
  <nav class="c-breadcrumb-nav l-container" aria-label="パンくずリスト">
    <ul class="c-breadcrumb-list">
      <li class="c-breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Web制作業界特化の求人サイトCraftJob</a></li>
      <li class="c-breadcrumb-item">404</li>
    </ul>
  </nav>
</div>
<!-- パンくず end -->

<!-- main -->
<main class="page-404 u-mtb-page">
  <div class="l-container-s">
    <div class="c-page-title-container">
      <h1 class="c-page-title" lang="en">404 Not Found</h1>
    </div>

    <div class="page-404-text-container">
      <p class="page-404-text">お探しのページは見つかりませんでした。</p>
      <p class="page-404-subtext">
        <span>申し訳ございません。</span>
        <span>入力したアドレスが間違っているか、ページが移動・削除された可能性があります。</span>
        <span>トップページに戻って目的の情報をお探し下さい。</span>
      </p>
    </div>

    <div class="page-404-button">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="page-404-button-link">トップページへ戻る</a>
    </div>
  </div>
</main>
<!-- main end -->
<?php get_footer(); ?>