<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->
<!-- single-recruit_body -->
<div class="l-recruit l-container">
  <div class="l-recruit-2column">
    <!-- main _メインコンテンツ -->
    <!-- ヘッダー -->
    <main class="l-recruit-main">
      <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post();?>
      <div class="recruit-single-header">
        <h1 class="recruit-single-title"><?php the_title(); ?></h1>

        <div class="recruit-single-header-nav-container">
          <nav class="recruit-single-header-nav" aria-label="求人詳細ナビゲーション">
            <ul class="recruit-single-header-nav-list">
              <li class="c-pill-link c-pill-link--green"><a href="#recruit-single-detail">募集要項</a></li>
              <li class="c-pill-link c-pill-link--green"><a href="#recruit-single-company-info">会社概要</a></li>
              <li class="c-pill-link c-pill-link--orange"><a href="#recruit-single-entry-form">エントリーフォーム</a></li>
            </ul>
          </nav>

          <?php
          $is_favorited = true;
          $aria_label = $is_favorited ? "お気に入りを解除" : "お気に入りに登録";
          $aria_pressed = $is_favorited ? "true" : "false";
          ?>
          <button type="button" class="c-favorite-button-icon js-favorite-button"
            data-post-id="<?php echo esc_attr( get_the_ID() ); ?>" aria-label="お気に入りに登録する" aria-pressed="false">
          </button>
        </div>
      </div>
      <!-- ヘッダー end -->

      <!-- 募集要項 -->
      <section id="recruit-single-detail" class="recruit-single-section">
        <div class="recruit-single-section-container">
          <h2 class="recruit-single-section-title">募集要項</h2>
          <dl class="recruit-single-contents">
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">業務内容</dt>
              <dd class="recruit-single-content-value">
                <?php echo nl2br( esc_html( get_field('job_description') ) ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">リモート</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field( 'remote_status' ) ? 'リモート可' : 'リモート不可' ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">リモート補足</dt>
              <dd class="recruit-single-content-value">
                <?php echo nl2br( esc_html( get_field('remote_note') ) ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">応募条件（必須）</dt>
              <dd class="recruit-single-content-value">
                <?php
                $skills = get_field( "required_skills" );
                if ($skills) :
                  $items = explode("\n", $skills);
                ?>
                <ul>
                  <?php foreach ($items as $item) : ?>
                  <?php if (trim($item) !== "") : ?>
                  <li><?php echo esc_html( trim($item) ); ?></li>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">応募条件（歓迎）</dt>
              <dd class="recruit-single-content-value">
                <?php
                $preferred_skills = get_field( "preferred_skills" );
                if ( $preferred_skills ) :
                  $preferred_items = explode( "\n", $preferred_skills );
                ?>
                <ul>
                  <?php foreach ( $preferred_items as $preferred_item ) : ?>
                  <?php if ( trim( $preferred_item ) !== '' ) : ?>
                  <li><?php echo esc_html( trim( $preferred_item ) ); ?></li>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">勤務地</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field('work_location') ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">勤務時間</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field('work_hours') ); ?>
              </dd>
            </div>

            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">給与</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field('salary') ); ?>万円
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">給与形態</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field('salary_type') ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">給与補足</dt>
              <dd class="recruit-single-content-value">
                <?php echo nl2br( esc_html( get_field('salary_note') ) ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">休日</dt>
              <dd class="recruit-single-content-value">
                <?php
                $holidays = get_field( "holidays" );
                if ( $holidays ) :
                  $holidays_items = explode( "\n", $holidays );
                ?>
                <ul>
                  <?php foreach ( $holidays_items as $holidays_item ) : ?>
                  <?php if ( trim( $holidays_item ) !== '' ) : ?>
                  <li><?php echo esc_html( trim( $holidays_item ) ); ?></li>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">福利厚生</dt>
              <dd class="recruit-single-content-value">
                <?php
                $welfares = get_field( "welfare" );
                if ( $welfares ) :
                  $welfares_items = explode( "\n", $welfares );
                ?>
                <ul>
                  <?php foreach ( $welfares_items as $welfare_item ) : ?>
                  <?php if ( trim( $welfare_item ) !== '' ) : ?>
                  <li><?php echo esc_html( trim( $welfare_item ) ); ?></li>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </dd>
            </div>

          </dl>
        </div>
      </section>
      <!-- 募集要項 end -->
      <!-- 会社概要 -->
      <section id="recruit-single-company-info" class="recruit-single-section">
        <div class="recruit-single-section-container">
          <h2 class="recruit-single-section-title">会社概要</h2>
          <dl class="recruit-single-contents">
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">会社名</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field('company_name') ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">事業内容</dt>
              <dd class="recruit-single-content-value">
                <?php
                $business_contents = get_field( "business_content" );
                if ( $business_contents ) :
                  $business_contents_items = explode( "\n", $business_contents );
                ?>
                <ul>
                  <?php foreach ( $business_contents_items as $business_content_item ) : ?>
                  <?php if ( trim( $business_content_item ) !== '' ) : ?>
                  <li><?php echo esc_html( trim( $business_content_item ) ); ?></li>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">所在地</dt>
              <dd class="recruit-single-content-value">
                <?php
                $company_zip     = get_field( 'company_zip' );
                $company_address = get_field( 'company_address' );
                if ( $company_zip || $company_address ) :
                  $parts = array();
                  if ( $company_zip ) {
                    $parts[] = '〒' . esc_html( $company_zip );
                  }
                  if ( $company_address ) {
                    $parts[] = esc_html( $company_address );
                  }
                  ?>
                <p><?php echo implode( '<br>', $parts ); ?></p>
                <?php endif; ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">設立</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field('established') ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">従業員数</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field('employee_count') ); ?>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">資本金</dt>
              <dd class="recruit-single-content-value">
                <?php echo esc_html( get_field('capital') ); ?>万円
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">URL</dt>
              <dd class="recruit-single-content-value">
                <?php
                $company_url = get_field( 'company_url' );
                if ( $company_url ) :
                  ?>
                <a href="<?php echo esc_url( $company_url ); ?>" target="_blank"
                  rel="noopener noreferrer"><?php echo esc_html( $company_url ); ?></a>
                <?php endif; ?>
              </dd>
            </div>
          </dl>
        </div>

      </section>
      <!-- 会社概要 end -->
      <!-- エントリーフォーム -->
      <section id="recruit-single-entry-form" class="recruit-single-section">
        <div class="recruit-single-section-container">
          <h2 class="recruit-single-section-title">エントリーする</h2>
          <div class="c-cf7-form">
            <?php echo do_shortcode('[contact-form-7 id="a0bb085" title="エントリーフォーム"]'); ?>
          </div>
        </div>
      </section>
      <!-- エントリーフォーム end -->
      <?php endwhile; ?>
      <?php else : ?>
      <p>求人データが見つかりませんでした。</p>
      <?php endif; ?>
    </main>
    <!-- main _メインコンテンツ end -->
    <!-- aside _サイドバー -->
    <aside class="l-recruit-sidebar">
      <?php get_template_part('template-parts/search-form'); ?>
    </aside>
    <!-- aside _サイドバー end -->
  </div>
</div>
<!-- single-recruit_body end -->
<?php get_footer(); ?>