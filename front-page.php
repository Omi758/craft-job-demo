<?php get_header(); ?>
<!-- main -->
<main class="top">
  <!-- top-kv -->
  <section class="top-kv">
    <div class="top-kv-container">
      <div class="top-kv-text-content">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-kv-emblem.webp' ); ?>" width="465"
          height="151" alt="制作会社の掲載数ナンバーワン" decoding="async" />
        <h2 class="top-kv-title">
          <span class="top-kv-title-main">Web制作会社への転職を、</span>
          <span>最短ルートで。</span>
        </h2>
        <div class="top-kv-text-item">
          <p>リモート</p>
          <p>求人多数</p>
        </div>
        <div class="top-kv-text-item">
          <p>未経験可</p>
          <p>の求人あり</p>
        </div>
      </div>

      <div class="top-kv-image">
        <picture>
          <source media="(max-width: 767px)"
            srcset="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-kv-peason-sp@2x.webp' ); ?>"
            type="image/webp">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-kv-peason@2x.webp' ); ?>"
            width="916" height="911" alt="人差し指で1番を示す若い女性" decoding="async" />
        </picture>
      </div>
    </div>
  </section>
  <!-- top-kv end -->
  <!-- top-search -->
  <section class="top-search">
    <div class="top-search-container l-container">
      <input type="text" placeholder="キーワードで探す">
      <button>検索する</button>
    </div>
  </section>
  <!-- top-search end -->

  <!-- 以下、コンポーネントを仮作成_先頭は仮レイアウト用div -->
  <div class="l-container">
    <!-- 共通_タイトル -->
    <div class="c-page-title-container">
      <h2 class="c-page-title">求人を探す</h2>
    </div>
    <!-- 共通_タイトル end -->
    <!-- コラム一覧タイトル  -->
    <div class="c-column-title-container">
      <h2 class="c-column-title">就活コラム</h2>
    </div>
    <!-- コラム一覧タイトル end -->
  </div>
  <!-- コンポーネント仮作成 終わり -->

</main>
<!-- main end -->
<?php get_footer(); ?>