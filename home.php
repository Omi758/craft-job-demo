<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->

<!-- main -->
<main class="column-archive u-mtb-page">
  <div class="l-container">
    <div class="c-page-title-container">
      <h1 class="c-page-title"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
    </div>
  </div>
  <!-- カテゴリ絞り込みボタン -->
  <nav class="column-category-nav" aria-label="コラムカテゴリ絞り込み">
    <ul class="column-category-list">
      <li class="column-category-btn is-active"><a href="<?php echo esc_url( home_url( '/column/' ) ); ?>">すべて</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=career-change' ) ); ?>">転職ノウハウ</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=skill-up' ) ); ?>">スキルアップ</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=job-guide' ) ); ?>">職種ガイド</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=industry-trend' ) ); ?>">業界トレンド</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=side-job-freelance' ) ); ?>">副業・フリーランス</a></li>
      <li class="column-category-btn"><a
          href="<?php echo esc_url( home_url( '/column/?category=lifestyle' ) ); ?>">ライフスタイル</a></li>
    </ul>
  </nav>
  <!-- カテゴリ絞り込みボタン end -->

  <div class="l-container">
    <div class="column-archive-container">
      <!-- 下層ページ用コラム一覧カード -->
      <div class="column-archive-cards">
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
        <article class="c-card-column-container">
          <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
            <div class="c-card-column-image">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/column-single-thumbnail@2x.webp' ); ?>"
                width="1600" height="900" alt="Web制作会社が面接で見るポイントを徹底解説の記事サムネイル" loading="lazy" decoding="async" />
            </div>
            <div class="c-card-column-content">
              <span class="c-card-column-badge">スキルアップ</span>
              <h2 class="c-card-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h2>
              <div class="c-card-column-date-container">
                <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
              </div>
            </div>
          </a>
        </article>
      </div>

      <!-- ページネーション -->
      <div class="c-pagination-container">
        <nav class="c-pagination-nav" aria-label="コラム一覧ページネーション">
          <ul class="c-pagination-list">
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link c-pagination-link--prev"><span
                  class="u-visually-hidden">前のページ</span></a>
            </li>

            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link">1<span class="u-visually-hidden">ページ目</span></a>
            </li>
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link is-active" aria-current="page"><span
                  class="u-visually-hidden">現在のページ：</span>2<span class="u-visually-hidden">ページ目</span></a>
            </li>
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link">3<span class="u-visually-hidden">ページ目</span></a>
            </li>
            <li class="c-pagination-item">
              <span class="c-pagination-dots" aria-hidden="true">
                <span class="c-pagination-dots-icon"></span>
              </span>
            </li>
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link">10<span class="u-visually-hidden">ページ目</span></a>
            </li>
            <li class="c-pagination-item">
              <a href="#" class="c-pagination-link c-pagination-link--next"><span
                  class="u-visually-hidden">次のページ</span></a>
            </li>
          </ul>
        </nav>
      </div>

    </div>
  </div>
</main>
<!-- main end -->
<?php get_footer(); ?>