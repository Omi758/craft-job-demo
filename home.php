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
  <?php
   $current_category = get_query_var('column_category', '');
   $categories = get_categories( array(
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'hide_empty' => true,
    'parent' => 0,
   ));
   ?>
  <nav class="column-category-nav" aria-label="コラムカテゴリ絞り込み">
    <ul class="column-category-list">
      <li class="c-pill-link<?php echo ('' === $current_category) ? ' is-active' : ''; ?>">
        <a href="<?php echo esc_url( home_url( '/column/' ) ); ?>">すべて</a>
      </li>
      <?php foreach ( $categories as $term ) : ?>
      <li class="c-pill-link<?php echo ($current_category === $term->slug ) ? ' is-active ' : '';?>">
        <a href="<?php echo esc_url( home_url( '/column/category/' . $term->slug . '/' ) ); ?>">
          <?php echo esc_html( $term->name ); ?>
        </a>
      </li>
      <?php endforeach; ?>
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
      <?php the_posts_pagination(
        array(
          'mid_size' => 1,
          'prev_text' => '',
          'next_text' => '',
          'screen_reader_text' => 'ページネーション',
        )
      ); ?>
    </div>
  </div>
</main>
<!-- main end -->
<?php get_footer(); ?>