<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
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

    <div class="c-button-link-container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="c-button-link c-button-link--home">トップページへ戻る</a>
    </div>
  </div>
</main>
<!-- main end -->
<?php get_footer(); ?>