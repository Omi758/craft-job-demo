<!-- パンくず -->
<div class="c-breadcrumb-container">
  <nav class="c-breadcrumb-nav l-container" aria-label="パンくずリスト">
    <?php if ( function_exists( 'bcn_display' ) ) : ?>
    <?php bcn_display(); ?>
    <?php endif; ?>
  </nav>
</div>
<!-- パンくず end -->