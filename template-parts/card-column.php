<!-- コラムカード -->
<article class="c-card-column-container">
  <a href="<?php the_permalink(); ?>">
    <div class="c-card-column-image">
      <?php if( has_post_thumbnail() ): ?>
      <?php the_post_thumbnail('large', [
  'loading' => 'lazy',
  'decoding' => 'async',
] ); ?>
      <?php endif; ?>
    </div>
    <div class="c-card-column-content">
      <!-- カテゴリ名を動的に取得 -->
      <?php $categories = get_the_category(); ?>
      <?php if( $categories ) : ?>
      <span class="c-card-column-badge"><?php echo esc_html( $categories[0]->name ); ?></span>
      <?php endif; ?>
      <h2 class="c-card-column-title"><?php the_title(); ?></h2>
      <div class="c-card-column-date-container">
        <time class="c-card-column-date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
          <?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?>
        </time>
        <?php if( get_the_date() !== get_the_modified_date() ) : ?>
        <time class="c-card-column-update"
          datetime="<?php echo esc_attr( get_the_modified_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_modified_date( 'Y.m.d' ) ); ?>
        </time>
        <?php endif; ?>
      </div>
    </div>
  </a>
</article>