<!-- パンくず -->
<div class="c-breadcrumb-container">
  <nav class="c-breadcrumb-nav l-container" aria-label="パンくずリスト">
    <?php
    if ( is_post_type_archive( 'recruit' ) ) :
      $craftjob_page= get_query_var( 'craftjob_page' );
      $has_search = ! empty( $_GET['area']) || ! empty( $_GET['employment_type'] ) || ! empty( $_GET['job_category']) || ! empty( $_GET['salary_min']) || ! empty( $_GET['salary_max']);
    
      if ( $craftjob_page || $has_search ) :
        // パンくずタイトルを決定
        if ( 'popular' === $craftjob_page ) :
          $bc_title = '人気求人ランキング';
          elseif ( 'favorite' === $craftjob_page ) :
            $bc_title = 'お気に入り求人';
            else :
              $title_parts = array();

              if ( ! empty( $_GET['area'] ) ) {
                $term = get_term_by( 'slug', sanitize_text_field(wp_unslash( $_GET['area'] )), 'area' );
                if ( $term ) { $title_parts[] =esc_html( $term->name ); }
              }
              if ( ! empty( $_GET['employment_type'] ) ) {
                $term = get_term_by( 'slug', sanitize_text_field(wp_unslash( $_GET['employment_type'] )), 'employment_type' );
                if ( $term ) { $title_parts[] =esc_html( $term->name ); }
              }
              if ( ! empty( $_GET['job_category'] ) ) {
                $term = get_term_by( 'slug', sanitize_text_field(wp_unslash( $_GET['job_category'] )), 'job_category' );
                if ( $term ) { $title_parts[] =esc_html( $term->name ); }
              }

              $salary_min = ! empty( $_GET['salary_min'] ) ? intval( $_GET['salary_min'] ) : '';
              $salary_max = ! empty( $_GET['salary_max'] ) ? intval( $_GET['salary_max'] ) : '';
              if ( $salary_min !== ''  && $salary_max !== '' ) {
                $title_parts[] = '年収：' . $salary_min . '万円～' . $salary_max . '万円';
              } elseif ( $salary_min !== '' ) {
                $title_parts[] = '年収：' . $salary_min . '万円以上';
              } elseif ( $salary_max !== '' ) {
                $title_parts[] = '年収：' . $salary_max . '万円以下';
              }

              $bc_title = '『' . implode( ' / ', $title_parts ) . '』の求人一覧';
            endif;
            ?>
    <a href="<?php echo esc_url( home_url( '/' ) );  ?>">Web制作業界特化の求人サイトCraft Job</a>
    &gt;
    <a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">求人を探す</a>
    &gt;
    <span><?php echo $bc_title; ?></span>
    <?php else : ?>
    <?php if ( function_exists( 'bcn_display' ) ) { bcn_display(); } ?>
    <?php endif; ?>

    <?php else : ?>
    <?php if ( function_exists( 'bcn_display' ) ) { bcn_display(); } ?>
    <?php endif; ?>
  </nav>
</div>
<!-- パンくず end -->