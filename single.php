<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->
<!-- main -->
<main class="column-single u-mtb-page">
  <div class="l-container-s">
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();?>
    <article class="column-single-container">
      <?php $categories = get_the_category(); ?>
      <?php if( $categories ) : ?>
      <span class="c-card-column-badge"><?php echo esc_html( $categories[0]->name ); ?></span>
      <?php endif; ?>
      <h1 class="c-card-column-title"><?php the_title(); ?></h1>

      <?php if( has_post_thumbnail() ): ?>
      <div class="column-single-image">

        <?php the_post_thumbnail('large', [
          'loading' => 'lazy',
          'decoding' => 'async',
        ] ); ?>
      </div>
      <?php endif; ?>

      <div class="c-card-column-date-container">
        <time class="c-card-column-date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
          <?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?>
        </time>
        <?php if ( get_the_date() !== get_the_modified_date() ) : ?>
        <time class="c-card-column-update" datetime="<?php echo esc_attr( get_the_modified_date( 'Y-m-d' ) ); ?>">
          <?php echo esc_html( get_the_modified_date( 'Y.m.d' ) ); ?>
        </time>
        <?php endif; ?>
      </div>

      <div class="column-single-content entry-content">
        <?php the_content(); ?>
      </div>
    </article>

    <?php endwhile; ?>
    <?php else : ?>
    <p>記事が見つかりませんでした。</p>

    <?php endif; ?>
  </div>
</main>

<!-- main end -->
<?php get_footer(); ?>