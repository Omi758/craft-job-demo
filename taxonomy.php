<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->
<!-- single-recruit_body -->
<div class="l-recruit l-container">
  <!-- 共通_タイトル -->
  <div class="c-archive-title-container">
    <h2 class="c-archive-title">『<?php echo single_term_title('', false); ?>』の求人一覧</h2>
  </div>

  <div class="l-recruit-2column">
    <!-- main _メインコンテンツ -->
    <!-- ヘッダー -->
    <main class="l-recruit-main">
      <!-- 求人一覧カード_ベース -->
      <div class="recruit-archive-cards">
        <?php if ( have_posts()) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/card-recruit'); ?>
        <?php endwhile; ?>
        <?php else : ?>
        <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
      </div>
      <!-- <article class="c-card-archive-container">
        <div class="c-card-archive-image">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/recruite-card-thumbnail@2x.webp' ); ?>"
            width="1548" height="602" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
        </div>
        <div class="c-card-archive-content">
          <div class="c-card-archive-header">
            <img class='c-card-archive-company-logo'
              src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
              width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
            <h3 class="c-card-archive-company">合同会社LIBERA</h3>
          </div>
          <p class="c-card-archive-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
          <ul class="c-card-archive-tags">
            <li><a href="/">#未経験歓迎</a></li>
            <li><a href="/">#リモート可</a></li>
            <li><a href="/">#副業OK</a></li>
            <li><a href="/">#フレックス勤務</a></li>
            <li><a href="/">#経験者優遇</a></li>
            <li><a href="/">#服装自由</a></li>
            <li><a href="/">#土日休み</a></li>
            <li><a href="/">#PC支給</a></li>
          </ul>
          <div class="c-card-archive-list-container">
            <dl class="c-card-archive-list">
              <dt class="c-card-archive-list-title">雇用形態</dt>
              <dd class="c-card-archive-list-value">正社員</dd>
              <dt class="c-card-archive-list-title">職種</dt>
              <dd class="c-card-archive-list-value">コーダー・エンジニア</dd>
              <dt class="c-card-archive-list-title">地域</dt>
              <dd class="c-card-archive-list-value">福岡</dd>
              <dt class="c-card-archive-list-title">年収</dt>
              <dd class="c-card-archive-list-value">300万円</dd>
            </dl>
          </div>
        </div>
        <div class="c-card-link-container c-card-link-recruit-container">
          <a class="c-card-link c-card-link-apply" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
            aria-label="求人に応募する">応募する</a>
          <a class="c-card-link c-card-link-view-more" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
            aria-label="求人の詳細を見る">詳しく見る</a>
          <a class="c-card-link c-card-link-favorite" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
            aria-label="求人募集記事をお気に入り登録する">お気に入り</a>

        </div>
      </article> -->
      <!-- 求人一覧カード_ベース end -->
      <!-- ページネーション -->
      <?php craftjob_pagination(); ?>
      <!-- ページネーション end -->
    </main>
    <!-- main _メインコンテンツ end -->
    <!-- aside _サイドバー -->
    <aside class="l-recruit-sidebar">
      <?php get_template_part('template-parts/search-form'); ?>
    </aside>
    <!-- aside _サイドバー end -->
  </div>
</div>
<!-- single-recruit_body end -->
<?php get_footer(); ?>