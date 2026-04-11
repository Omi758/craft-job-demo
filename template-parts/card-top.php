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
          $company = get_field( 'company' );
          $company_name = $company ? get_field( 'company_name', $company->ID ) : '';
          $company_logo = $company ? get_field( 'company_logo', $company->ID ) : '';
          ?>

          <?php if ($company_logo) : ?>
          <img class='c-card-top-company-logo' src='<?php echo esc_url( $company_logo['url'] ); ?>' width='120'
            height='120' alt='<?php echo esc_attr( $company_name ); ?>ロゴ' decoding='async' />
          <?php endif; ?>
          <h3 class="c-card-top-company"><?php echo esc_html( $company_name ); ?></h3>
        </div>
        <p class="c-card-top-copy">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </p>
        <?php
        $tags = get_the_terms( get_the_ID(), 'job_tag' );
        if ( ! is_wp_error( $tags ) && ! empty( $tags ) ) :
        ?>
        <ul class="c-card-top-tags">
          <?php foreach ( $tags as $tag ) : ?>
          <li>
            <a href="<?php echo esc_url( get_term_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
      <div class="c-card-link-container">
        <span class="c-card-link c-card-link-view-more">詳しく見る</span>
      </div>
    </article>
    <!-- カード（トップページ用） end -->