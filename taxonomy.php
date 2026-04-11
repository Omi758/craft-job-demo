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
    <!-- aside _サイドバー（SP版では上部に表示） -->
    <aside class="l-recruit-sidebar">
      <?php get_template_part('template-parts/search-form'); ?>
    </aside>
    <!-- aside _サイドバー end -->
    <!-- main _メインコンテンツ -->
    <main class="l-recruit-main">
      <!-- 求人一覧カード_ベース -->
      <div class="l-recruit-archive-cards">
        <?php if ( have_posts()) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/card-recruit'); ?>
        <?php endwhile; ?>
        <?php else : ?>
        <p>お探しの求人が見つかりませんでした。</p>
        <?php endif; ?>
      </div>

      <!-- ページネーション -->
      <?php the_posts_pagination(
        array(
          'mid_size' => 1,
          'prev_text' => '',
          'next_text' => '',
          'screen_reader_text' => 'ページネーション',
        )
      ); ?>
      <!-- ページネーション end -->
    </main>
    <!-- main _メインコンテンツ end -->
  </div>
</div>
<!-- single-recruit_body end -->
<?php get_footer(); ?>