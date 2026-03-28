<?php get_header(); ?>
<!-- main -->
<main class="top">
  <!-- top-kv -->
  <section class="top-kv">
    <div class="top-kv-container l-container">
      <div class="top-kv-text-content">
        <img class="top-kv-emblem"
          src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-kv-emblem.svg' ); ?>" width="465"
          height="151" alt="制作会社の掲載数ナンバーワン" decoding="async" />
        <h2 class="top-kv-title">
          <strong class="u-text--green"><span class="top-kv-title-accent">Web</span>制作会社</strong>への転職<span
            class="top-kv-title-sp-hidden">を、</span>
          <span class="top-kv-title-sub">最短ルートで。</span>
        </h2>
        <div class="top-kv-text-items">
          <div class="top-kv-text-item top-kv-text-item--remote">
            <p><strong class="u-text--green">リモート</strong>求人多数</p>
          </div>
          <div class="top-kv-text-item top-kv-text-item--beginner">
            <p><strong class="u-text--green">未経験可</strong>の<span>求人あり</span></p>
          </div>
        </div>
      </div>

      <div class="top-kv-image-container">
        <picture class="top-kv-image">
          <source media="(max-width: 767px)"
            srcset="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-kv-peason-sp@2x.webp' ); ?>"
            type="image/webp">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-kv-peason@2x.webp' ); ?>"
            width="916" height="911" alt="人差し指で1番を示す若い女性" decoding="async" />
        </picture>
      </div>
    </div>
  </section>
  <!-- top-kv end -->
  <!-- top-search-form-top -->
  <div class="top-kv-search-bar l-container">
    <?php get_template_part('template-parts/search-form-top'); ?>
  </div>
  <!-- top-search-bar end -->
  <!-- カードスライダ―_人気求人 -->
  <div class="l-container">
    <section class="top-slider-section top-slider-popular">
      <div class="top-slider-title-container c-slider-title-container">
        <h2 class="c-slider-title">人気求人</h2>
        <a class="c-slider-link" href="<?php echo esc_url( home_url( '/recruit/popular/' ) ); ?>">もっと見る</a>
      </div>
      <div class="top-slider-container">

        <?php
      $popular_query =new WP_Query( array(
        'post_type'     => 'recruit',
        'posts_per_page' => 10,
        'meta_key'      => 'craftjob_views_7days', // 7日間アクセス数
        'orderby'       => 'meta_value_num', // 7日間アクセス数で並び替え
        'order'         => 'DESC', // 新しい順
      ) );
      ?>

        <?php if ( $popular_query->have_posts() ) : ?>
        <div class="splide c-slider-container js-top-slider">
          <div class="c-slider-arrows splide__arrows">
            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="前のスライド"></button>
            <button class="splide__arrow splide__arrow--next" type="button" aria-label="次のスライド"></button>
          </div>
          <div class="splide__track">
            <div class="splide__list">
              <!-- 人気求人カード -->
              <?php while ( $popular_query->have_posts() ) : $popular_query->the_post(); ?>
              <div class="splide__slide">
                <?php get_template_part('template-parts/card-top'); ?>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
        <?php else : ?>
        <p>現在、人気求人はありません。</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
      </div>
    </section>
  </div>
  <!-- カードスライダ― 人気求人 end -->
  <!-- カードスライダ―_リモート可の求人 -->
  <div class="l-container">
    <section class="top-slider-section top-slider-remote">
      <div class="c-slider-title-container">
        <h2 class="c-slider-title">リモート可の求人</h2>
        <a class="c-slider-link" href="<?php echo esc_url( home_url( '/recruit/job_tag/remote/' ) ); ?>">もっと見る</a>
      </div>
      <div class="top-slider-container">

        <?php
        $remote_query = new WP_Query( array(
          'post_type' => 'recruit',
          'posts_per_page' => 10,
          'tax_query'      => array(
            array(
              'taxonomy' => 'job_tag',
              'field' => 'slug',
              'terms' => 'remote',
            ),
          ),
        ) );
        ?>

        <?php if ( $remote_query->have_posts() ) : ?>
        <div class="splide c-slider-container js-top-slider">
          <div class="c-slider-arrows splide__arrows">
            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="前のスライド"></button>
            <button class="splide__arrow splide__arrow--next" type="button" aria-label="次のスライド"></button>
          </div>
          <div class="splide__track">
            <div class="splide__list">
              <!-- リモート可の求人カード -->
              <?php while ( $remote_query->have_posts() ) : $remote_query->the_post(); ?>
              <div class="splide__slide">
                <?php get_template_part( 'template-parts/card-top' ); ?>
              </div>
              <!-- リモート可の求人カード end -->
              <?php endwhile; ?>
            </div>
          </div>
        </div>
        <?php else : ?>
        <p>現在、リモート可の求人はありません。</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>
  </div>
  <!-- カードスライダ― リモート可の求人 end -->
  <!-- カードスライダ―_副業OKの求人 -->
  <div class="l-container">
    <section class="top-slider-section top-slider-side-job">
      <div class="c-slider-title-container">
        <h2 class="c-slider-title">副業OKの求人</h2>
        <a class="c-slider-link" href="<?php echo esc_url( home_url( '/recruit/job_tag/side-job/' ) ); ?>">もっと見る</a>
      </div>
      <div class="top-slider-container">
        <?php
        $side_job_query = new WP_Query( array(
          'post_type' => 'recruit',
          'posts_per_page' => 10,
          'tax_query'      => array(
            array(
              'taxonomy' => 'job_tag',
              'field' => 'slug',
              'terms' => 'side-job',
            ),
          ),
        ) );
        ?>

        <?php if ( $side_job_query->have_posts() ) : ?>
        <div class="splide c-slider-container js-top-slider">
          <div class="c-slider-arrows splide__arrows">
            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="前のスライド"></button>
            <button class="splide__arrow splide__arrow--next" type="button" aria-label="次のスライド"></button>
          </div>
          <div class="splide__track">
            <div class="splide__list">
              <!-- 副業OKの求人カード -->
              <?php while ( $side_job_query->have_posts() ) : $side_job_query->the_post(); ?>
              <div class="splide__slide">
                <?php get_template_part( 'template-parts/card-top' ); ?>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
        <?php else : ?>
        <p>現在、副業OKの求人はありません。</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
      </div>
    </section>
  </div>
  <!-- カードスライダ― 副業OKの求人 end -->
  <!-- 2カラムセクション -->
  <div class="l-container">
    <section class="top-2column-section l-recruit-2column">
      <!-- aside _サイドバー（SP版では上部に表示） -->
      <aside class="l-recruit-sidebar">
        <?php get_template_part('template-parts/search-form'); ?>
      </aside>
      <!-- aside _サイドバー end -->
      <!-- main _メインコンテンツ -->
      <div class="l-recruit-main ">
        <!-- 職種から探す -->
        <div class="top-search-container">
          <div class="c-top-taxonomy-title-container">
            <h2 class="c-top-taxonomy-title">職種から探す</h2>
          </div>
          <nav class="top-search-job-category-nav" aria-label="職種から探す">
            <ul class="top-search-job-category-list">
              <?php
              $job_categories = get_terms( array(
                'taxonomy'   => 'job_category',
                'hide_empty' => false,
              ) );
              if ( ! is_wp_error( $job_categories ) && ! empty( $job_categories )) :
                foreach ( $job_categories as $term ) :
              ?>
              <li>
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                  <?php echo esc_html( $term->name ); ?>
                </a>
              </li>
              <?php endforeach;
            endif;
             ?>
            </ul>
          </nav>
        </div>

        <!-- 地域から探す -->
        <div class="top-search-container">
          <div class="c-top-taxonomy-title-container">
            <h2 class="c-top-taxonomy-title">地域から探す</h2>
          </div>
          <nav class="top-search-area-nav" aria-label="地域から探す">
            <ul class="top-search-area-list">
              <?php
              $parent_areas = get_terms( array(
                'taxonomy'   => 'area',
                'parent'     => 0,
                'hide_empty' => false,
              ) );
              if  ( ! is_wp_error( $parent_areas ) && ! empty( $parent_areas ) ) :
                foreach ( $parent_areas as $parent_term ) :
              ?>
              <li class="top-search-area-region">
                <a href="<?php echo esc_url( get_term_link( $parent_term ) ); ?>">
                  <?php echo esc_html( $parent_term->name ); ?>
                </a>
                <?php
                $child_areas = get_terms(array(
                  'taxonomy'   => 'area',
                  'parent'     => $parent_term->term_id,
                  'hide_empty' => false,
                ) );
                if ( ! is_wp_error( $child_areas ) && ! empty( $child_areas )) :
                ?>
                <ul class="top-search-area-prefectures">
                  <?php foreach ( $child_areas as $child_term ) : ?>
                  <li>
                    <a href="<?php echo esc_url( get_term_link( $child_term ) ); ?>">
                      <?php echo esc_html( $child_term->name ); ?>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </li>
              <?php endforeach;
              endif; ?>
            </ul>
          </nav>
        </div>

        <!-- 雇用形態/タグから探す -->
        <div class="top-search-container">
          <div class="c-top-taxonomy-title-container">
            <h2 class="c-top-taxonomy-title">雇用形態/タグから探す</h2>
          </div>
          <h3 class="top-search-employment-tag-text">雇用形態から探す</h3>
          <nav class="top-search-employment-tag-nav" aria-label="雇用形態から探す">
            <ul class="top-search-employment-tag-list">
              <?php
              $employment_terms = get_terms( array(
                'taxonomy'   => 'employment_type',
                'hide_empty' => false,
              ) );
              if ( ! is_wp_error( $employment_terms ) && ! empty( $employment_terms ) ) :
                foreach ( $employment_terms as $term ) :
              ?>
              <li>
                <a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
                  <?php echo esc_html( $term->name ); ?>
                </a>
              </li>
              <?php
                  endforeach;
                endif;
                ?>
            </ul>
          </nav>
          <h3 class="top-search-employment-tag-text">タグから探す</h3>
          <nav class="top-search-employment-tag-nav" aria-label="タグから探す">
            <ul class="top-search-employment-tag-list top-search-tag-list">
              <?php
              $job_tags = get_terms( array(
                'taxonomy'   => 'job_tag',
                'hide_empty' => false,
              ) );
              if (! is_wp_error( $job_tags ) && ! empty( $job_tags )) :
                foreach ( $job_tags as $term ) :
              ?>
              <li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                  <?php echo esc_html( $term->name ); ?>
                </a>
              </li>
              <?php
               endforeach;
                endif;
                ?>
            </ul>
          </nav>
        </div>
        <!-- 就活コラム -->
        <div class="top-column-container">
          <div class="c-top-column-title-container">
            <h2 class="c-top-column-title">就活コラム</h2>
          </div>

          <?php
          $column_query = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
          ) );
          ?>

          <?php if ( $column_query->have_posts() ) : ?>
          <div class="top-column-cards-wrapper">
            <?php while ( $column_query->have_posts() ): $column_query->the_post(); ?>
            <article class="c-card-top-column-container">
              <a href="<?php the_permalink(); ?>">
                <div class="c-card-top-column-image">
                  <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'medium_large', array(
                    'decoding' => 'async',
                  ) ); ?>
                  <?php endif; ?>
                </div>
                <div class="c-card-top-column-content">
                  <?php
                  $categories = get_the_category();
                  if ( ! empty( $categories ) ) :
                  ?>
                  <span class="c-card-column-badge">
                    <?php echo esc_html( $categories[0]->name ); ?>
                  </span>
                  <?php endif; ?>
                  <h3 class="c-card-top-column-title"><?php the_title(); ?></h3>
                  <div class="c-card-column-date-container">
                    <time class="c-card-column-date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                      <?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?>
                    </time>
                    <time class="c-card-column-update"
                      datetime="<?php echo esc_attr( get_the_modified_date( 'Y-m-d' ) ); ?>">
                      <?php echo esc_html( get_the_modified_date( 'Y.m.d' ) ); ?>
                    </time>
                  </div>
                </div>
              </a>
            </article>
            <?php endwhile; ?>
          </div>
          <?php else : ?>
          <p>現在、就活コラムはありません。</p>
          <?php endif; ?>

          <?php wp_reset_postdata(); ?>
          <!-- 就活コラム end -->
        </div>
        <!-- main _メインコンテンツ end -->
    </section>
  </div>
  <!-- 2カラムセクション end -->
</main>
<!-- main end -->
<?php get_footer(); ?>