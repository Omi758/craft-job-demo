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
      <div class="c-pagination-container">
        <nav class="c-pagination-nav" aria-label="コラム一覧ページネーション">
          <ul class="c-pagination-list">
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link c-pagination-link--prev"><span
                  class="u-visually-hidden">前のページ</span></a>
            </li>

            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link">1<span class="u-visually-hidden">ページ目</span></a>
            </li>
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link is-active" aria-current="page"><span
                  class="u-visually-hidden">現在のページ：</span>2<span class="u-visually-hidden">ページ目</span></a>
            </li>
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link">3<span class="u-visually-hidden">ページ目</span></a>
            </li>
            <li class="c-pagination-item">
              <span class="c-pagination-dots" aria-hidden="true">
                <span class="c-pagination-dots-icon"></span>
              </span>
            </li>
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link">10<span class="u-visually-hidden">ページ目</span></a>
            </li>
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link c-pagination-link--next"><span
                  class="u-visually-hidden">次のページ</span></a>
            </li>
          </ul>
        </nav>
      </div>

    </div>
  </div>
</main>
<!-- main end -->
<?php get_footer(); ?>