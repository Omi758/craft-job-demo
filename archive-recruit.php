<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->
<!-- single-recruit_body -->
<div class="l-recruit l-container">
  <!-- 共通_タイトル -->
  <div class="c-archive-title-container">
    <h2 class="c-archive-title">求人を探す</h2>
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