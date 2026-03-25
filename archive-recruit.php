<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->
<!-- single-recruit_body -->
<div class="l-recruit l-container">
  <!-- 共通_タイトル -->
  <div class="c-archive-title-container">
    <h2 class="c-archive-title">
      <?php
      // 検索パラメータが有るかチェック
      $has_search = ! empty($_GET['area']) || ! empty($_GET['employment_type'])  || ! empty($_GET['job_category']) || ! empty($_GET['salary_min']) || ! empty($_GET['salary_max']);

      // 1_popular チェック
      if ( 'popular' === get_query_var( 'craftjob_page' ) ) :
        echo '人気求人ランキング';

      // 2_favorite チェック
      elseif ( 'favorite' === get_query_var( 'craftjob_page' ) ) :
        echo 'お気に入り求人';

      // 3_検索チェック
      elseif ($has_search) :
        $title_parts = array();

        // 地域
        if (! empty($_GET['area'])) {
          $area_term = get_term_by('slug', sanitize_text_field(wp_unslash($_GET['area'])), 'area');
          if ($area_term) {
            $title_parts[] = esc_html($area_term->name);
          }
        }

        // 雇用形態
        if (! empty($_GET['employment_type'])) {
          $emp_term = get_term_by('slug', sanitize_text_field(wp_unslash($_GET['employment_type'])), 'employment_type');
          if ($emp_term) {
            $title_parts[] = esc_html($emp_term->name);
          }
        }

        // 職種
        if (! empty($_GET['job_category'])) {
          $job_term = get_term_by('slug', sanitize_text_field(wp_unslash($_GET['job_category'])), 'job_category');
          if ($job_term) {
            $title_parts[] = esc_html($job_term->name);
          }
        }

        // 年収
        $salary_min = ! empty($_GET['salary_min']) ? intval($_GET['salary_min']) : '';
        $salary_max = ! empty($_GET['salary_max']) ? intval($_GET['salary_max']) : '';
        if ($salary_min  !== '' && $salary_max !== '') {
          $title_parts[] = '年収：' . $salary_min . '万円～' . $salary_max . '万円';
        } elseif ($salary_min !== '') {
          $title_parts[] = '年収：' . $salary_min . '万円以上';
        } elseif ($salary_max !== '') {
          $title_parts[] = '年収：' . $salary_max . '万円以下';
        }

        // タイトル組み立て
        echo '『' . implode(' / ', $title_parts) . '』の求人一覧';
      else :
        echo '求人を探す';
      endif;
      ?>
    </h2>
  </div>

  <div class="l-recruit-2column">
    <!-- aside _サイドバー（SP版では上部に表示） -->
    <aside class="l-recruit-sidebar">
      <?php get_template_part('template-parts/search-form'); ?>
    </aside>
    <!-- aside _サイドバー end -->
    <!-- main _メインコンテンツ -->
    <main class="l-recruit-main">
      <!-- 求人一覧カード -->
      <?php 
      $is_popular = 'popular' === get_query_var( 'craftjob_page' );
      $is_favorite = 'favorite' === get_query_var( 'craftjob_page' );
      ?>

      <?php if ( $is_favorite ) : ?>
      <!-- お気に入り（Ajaxで取得） -->
      <div class="l-recruit-archive-cards js-favorite-list">
        <p class="js-favorite-loading">読み込み中...</p>
      </div>

      <?php else : ?>
      <!-- 通常・検索・ランキング -->
      <div class="l-recruit-archive-cards<?php if ( $is_popular ) echo ' ranking-counter-reset'; ?>">
        <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php if ( $is_popular ) : ?>
        <?php get_template_part('template-parts/card-recruit-ranking'); ?>
        <?php else : ?>
        <?php get_template_part('template-parts/card-recruit'); ?>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php else : ?>
        <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
      </div>

      <?php if ( ! $is_popular ) : ?>
      <?php craftjob_pagination(); ?>
      <?php endif; ?>
      <!-- ページネーション end -->
      <?php endif; ?>
    </main>
    <!-- main _メインコンテンツ end -->
  </div>
</div>
<!-- single-recruit_body end -->
<?php get_footer(); ?>