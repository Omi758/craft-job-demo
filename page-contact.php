<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part( 'template-parts/breadcrumb' ); ?>
<!-- パンくず end -->

<!-- main -->
<main class="page-contact">
  <div class="l-container-s">
    <div class="c-page-title-container">
      <h1 class="c-page-title"><?php the_title(); ?></h1>
    </div>

    <div class="page-contact-content c-cf7-form">
      <?php the_content(); ?>
    </div>

    <p class="recaptcha-credit">
      <span>このサイトはreCAPTCHAによって保護されており、</span>Googleの<a href="https://policies.google.com/privacy" target="_blank"
        rel="noopener noreferrer">プライバシーポリシー</a>と
      <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer">利用規約</a>が適用されます。
    </p>
  </div>
</main>
<!-- main end -->
<?php get_footer(); ?>