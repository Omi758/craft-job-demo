<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->
<!-- single-recruit_body -->
<div class="recruit-single l-container u-mtb-page">
  <div class="recruit-single-2column">
    <!-- main _メインコンテンツ -->
    <!-- ヘッダー -->
    <main class="recruit-single-main">
      <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post();?>
      <div class="recruit-single-header">
        <h1 class="recruit-single-title"><?php the_title(); ?></h1>

        <div class="recruit-single-header-nav-container">
          <nav class="recruit-single-header-nav" aria-label="求人詳細ナビゲーション">
            <ul class="recruit-single-header-nav-list">
              <li><a class="c-scroll-link" href="#recruit-single-detail">募集要項</a></li>
              <li><a class="c-scroll-link" href="#recruit-single-company-info">会社概要</a></li>
              <li><a class="c-scroll-link" href="#recruit-single-entry-form">エントリーフォーム</a></li>
            </ul>
          </nav>

          <?php
          $is_favorited = true;
          $aria_label = $is_favorited ? "お気に入りを解除" : "お気に入りに登録";
          $aria_pressed = $is_favorited ? "true" : "false";
          ?>
          <button type="button" class="c-favorite-button-icon<?php echo $is_favorited ? " is-active" : ""; ?>"
            aria-label="<?php echo esc_attr( $aria_label ); ?>" aria-pressed="<?php echo esc_attr( $aria_pressed ); ?>">
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
                WebサイトのHTML/CSS/JavaScriptによるコーディングを中心に、CMS実装やパフォーマンス最適化などの業務を担当していただきます。<br>
                デザイナーやディレクターと連携しながら、UI/UXを意識した実装を行っていただきます。
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">リモート</dt>
              <dd class="recruit-single-content-value">リモート可</dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">リモート補足</dt>
              <dd class="recruit-single-content-value">基本はリモート勤務ですが、出社を希望される方はオフィス勤務も可能です。業務内容やチーム体制に応じて柔軟に対応しています。
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">応募条件（必須）</dt>
              <dd class="recruit-single-content-value">
                <ul>
                  <li>HTML/CSSの基礎知識</li>
                  <li>レスポンシブ対応の経験</li>
                  <li>コミュニケーションを取りながら作業できる方</li>
                </ul>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">給与</dt>
              <dd class="recruit-single-content-value">350万円</dd>
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
              <dd class="recruit-single-content-value">合同会社LIBERA</dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">所在地</dt>
              <dd class="recruit-single-content-value">
                <p>〒812-0011<br>
                  福岡県福岡市博多区博多駅前3-7-35</p>
              </dd>
            </div>
            <div class="recruit-single-content-item">
              <dt class="recruit-single-content-title">URL</dt>
              <dd class="recruit-single-content-value">
                <a href="https://libera-inc.co.jp" target="_blank"
                  rel="noopener noreferrer">https://libera-inc.co.jp</a>
              </dd>
            </div>
          </dl>
        </div>

      </section>
      <!-- 会社概要 end -->
      <!-- エントリーフォーム -->
      <section id="recruit-single-entry-form" class="recruit-single-entry-form">
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
    <aside class="recruit-single-sidebar">
      <?php get_template_part('template-parts/search-form'); ?>
    </aside>
    <!-- aside _サイドバー end -->
  </div>
</div>
<!-- single-recruit_body end -->
<?php get_footer(); ?>