<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part( 'template-parts/breadcrumb' ); ?>
<!-- パンくず end -->

<!-- main -->
<main class="page-privacy u-mtb-page">
  <div class="l-container-s">
    <div class="c-page-title-container">
      <h1 class="c-page-title"><?php the_title(); ?></h1>
    </div>

    <div class="page-privacy-content">
      <?php the_content(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>