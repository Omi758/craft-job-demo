    <!-- カード（トップページ用） -->
    <article class="c-card-top-container">
      <div class="c-card-top-image">
        <?php if ( has_post_thumbnail() ): ?>
        <?php the_post_thumbnail('medium_large', array(
            'decoding' => 'async',
          )); ?>
        <?php endif; ?>
      </div>
      <div class="c-card-top-content">
        <div class="c-card-top-header">
          <?php
          $company_name = get_field( 'company_name' );
          $company_logo = get_field( 'company_logo' );
          ?>
          <?php if ($company_logo) : ?>
          <img class='c-card-top-company-logo' src='<?php echo esc_url( $company_logo['url'] ); ?>' width='120'
            height='120' alt='<?php echo esc_attr( $company_name ); ?>ロゴ' decoding='async' />
          <?php endif; ?>
          <h3 class="c-card-top-company"><?php echo esc_html( $company_name ); ?></h3>
        </div>
        <p class="c-card-top-copy"><?php the_title(); ?></p>
        <?php
        $tags = get_the_terms( get_the_ID(), 'job_tag' );
        if ( ! is_wp_error( $tags ) && ! empty( $tags ) ) :
        ?>
        <ul class="c-card-top-tags">
          <?php foreach ( $tags as $tag ) : ?>
          <li>
            <a href="<?php echo esc_url( get_term_link( $tag ) ); ?>">
              #<?php echo esc_html( $tag->name ); ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
      <div class="c-card-link-container">
        <a class="c-card-link c-card-link-view-more" href="<?php the_permalink(); ?>"
          aria-label="<?php echo esc_attr( get_the_title() . 'の詳細を見る' ); ?>"></a>
      </div>
    </article>
    <!-- カード（トップページ用） end -->