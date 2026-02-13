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
    <!-- パンくず -->
    <div class="c-breadcrumb-container">
      <nav class="c-breadcrumb-nav l-container" aria-label="パンくずリスト">
        <ul class="c-breadcrumb-list">
          <li class="c-breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Web制作業界特化の求人サイトCraftJob</a>
          </li>
          <li class="c-breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">プライバシーポリシー</a></li>
        </ul>
      </nav>
    </div>
    <!-- パンくず end -->
    <!-- カード（トップページ用） -->
    <article class="c-card-top-container">
      <div class="c-card-top-image">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>" width="767"
          height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
      </div>
      <div class="c-card-top-content">
        <div class="c-card-top-header">
          <img class='c-card-top-company-logo'
            src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
            width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
          <h3 class="c-card-top-company">合同会社LIBERA</h3>
        </div>
        <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
        <ul class="c-card-top-tags">
          <li><a href="/">#未経験歓迎</a></li>
          <li><a href="/">#リモート可</a></li>
          <li><a href="/">#副業OK</a></li>
          <li><a href="/">#フレックス勤務</a></li>
          <li><a href="/">#経験者優遇</a></li>
          <li><a href="/">#服装自由</a></li>
          <li><a href="/">#土日休み</a></li>
          <li><a href="/">#PC至急</a></li>
        </ul>
      </div>
      <div class="c-card-top-link-container">
        <a class="c-card-top-link" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>">詳しく見る</a>
      </div>
    </article>
  </div>
  <!-- コンポーネント仮作成 終わり -->

</main>
<!-- main end -->
<?php get_footer(); ?>