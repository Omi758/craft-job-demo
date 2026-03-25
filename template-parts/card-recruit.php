<!-- 求人カード_ベース -->
<article class="c-card-archive-container">
  <div class="c-card-archive-image">
    <?php if ( has_post_thumbnail() ) : ?>
    <?php the_post_thumbnail( 'medium_large', array(
        'decoding' => 'async',
      ) ); ?>
    <?php endif; ?>
  </div>
  <div class="c-card-archive-content">
    <div class="c-card-archive-header">
      <?php $company_logo = get_field( 'company_logo' ); ?>
      <?php if ( $company_logo ) : ?>
      <img class="c-card-archive-company-logo" src='<?php echo esc_url( $company_logo['url'] ); ?>' width='120'
        height='120' alt='<?php echo esc_attr( $company_logo['alt'] ); ?>' decoding='async' />
      <?php endif; ?>
      <h3 class="c-card-archive-company"><?php the_field('company_name'); ?></h3>
    </div>

    <p class="c-card-archive-copy"><?php the_title(); ?></p>

    <ul class="c-card-archive-tags">
      <?php $tags = get_the_terms( get_the_ID(), 'job_tag' ); ?>
      <?php if( $tags ) : ?>
      <?php foreach( $tags as $tag ) : ?>
      <li><a href="<?php echo esc_url( get_term_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
      </li>
      <?php endforeach; ?>
      <?php endif; ?>
    </ul>

    <?php
    $post_id = get_the_ID();

    // 雇用形態（タクソノミー  employment_type 1件目を表示）
    $employment_terms = get_the_terms( $post_id, 'employment_type' );
    $employment_label = ( $employment_terms && ! is_wp_error( $employment_terms ) && ! empty( $employment_terms ) )
      ? esc_html( $employment_terms[0]->name )
      : '—';
    
      // 職種（タクソノミー job_category）
      $job_terms = get_the_terms( $post_id, 'job_category' );
      $job_label = ($job_terms && ! is_wp_error( $job_terms ) && ! empty( $job_terms ) )
        ? esc_html( $job_terms[0]->name )
        : '—';

      // 地域（タクソノミー areaを優先、無ければACF work_locationを表示）
      $area_terms = get_the_terms( $post_id, 'area' );
      if ( $area_terms && ! is_wp_error( $area_terms ) && !empty( $area_terms ) ) {
        $area_label = esc_html( $area_terms[0]->name );
      } else {
        $work_location = get_field( 'work_location', $post_id );
        $area_label = $work_location ? esc_html( $work_location ) : '—';
      }

      // 年収（ACF salary、単位は万円）
      $salary_value = get_field( 'salary', $post_id );
      $salary_label = ( $salary_value !== '' && $salary_value !== null ) ? esc_html( $salary_value ) . '万円' : '—';
    ?>

    <div class="c-card-archive-list-container">
      <dl class="c-card-archive-list">
        <dt class="c-card-archive-list-title">雇用形態</dt>
        <dd class="c-card-archive-list-value"><?php echo $employment_label; ?></dd>
        <dt class="c-card-archive-list-title">職種</dt>
        <dd class="c-card-archive-list-value"><?php echo $job_label; ?></dd>
        <dt class="c-card-archive-list-title">地域</dt>
        <dd class="c-card-archive-list-value"><?php echo $area_label; ?></dd>
        <dt class="c-card-archive-list-title">年収</dt>
        <dd class="c-card-archive-list-value"><?php echo $salary_label; ?></dd>
      </dl>
    </div>
  </div>
  <div class="c-card-link-container c-card-link-recruit-container">
    <a class="c-card-link c-card-link-apply" href="<?php the_permalink(); ?>#recruit-single-entry-form"
      aria-label="求人に応募する">応募する</a>
    <a class="c-card-link c-card-link-view-more" href="<?php the_permalink(); ?>" aria-label="求人の詳細を見る">詳しく見る</a>
    <button class="c-card-link c-card-link-favorite js-favorite-button" type="button"
      data-post-id="<?php echo esc_attr( get_the_ID() ); ?>" aria-label="求人募集記事をお気に入り登録する">お気に入り</button>

  </div>
</article>
<!-- 求人カード_ベース end -->