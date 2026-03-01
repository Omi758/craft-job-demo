<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->

<!-- main -->
<main class="column-archive u-mtb-page">
  <div class="l-container">
    <div class="c-page-title-container">
      <h1 class="c-page-title"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
    </div>
  </div>
  <!-- カテゴリ絞り込みボタン -->
  <nav class="column-category-nav" aria-label="コラムカテゴリ絞り込み">
    <ul class="column-category-list">
      <li class="column-category-btn is-active"><a href="<?php echo esc_url( home_url( '/column/' ) ); ?>">すべて</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=career-change' ) ); ?>">転職ノウハウ</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=skill-up' ) ); ?>">スキルアップ</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=job-guide' ) ); ?>">職種ガイド</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=industry-trend' ) ); ?>">業界トレンド</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=side-job-freelance' ) ); ?>">副業・フリーランス</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=lifestyle' ) ); ?>">ライフスタイル</a></li>
    </ul>
  </nav>
  <!-- カテゴリ絞り込みボタン end -->

  <div class="l-container">
    <div class="column-archive-container">
      <!-- 下層ページ用コラム一覧カード -->
      <div class="column-archive-cards">
        <?php if ( have_posts()) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/card-column'); ?>
        <?php endwhile; ?>
        <?php else : ?>
        <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
      </div>

      <!-- ページネーション -->
      <?php craftjob_pagination(); ?>
    </div>
  </div>
</main>
<!-- main end -->
<?php get_footer(); ?>