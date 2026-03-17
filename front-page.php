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
    <section class="top-slider-popular">
      <div class="c-slider-title-container">
        <h2 class="c-slider-title">人気求人</h2>
        <a class="c-slider-link" href="<?php echo esc_url( home_url( '/recruit?orderby=popular' ) ); ?>">もっと見る</a>
      </div>
      <div class="c-slider-container">
        <div class="splide js-top-slider">
          <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev" type="button" aria-label="前のスライド"></button>
            <button class="splide__arrow splide__arrow--next" type="button" aria-label="次のスライド"></button>
          </div>
          <div class="splide__track">
            <div class="splide__list">
              <!-- 人気求人カード -->
              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>

              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>

              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>
              <!-- 人気求人カード end -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- カードスライダ― 人気求人 end -->
  <!-- カードスライダ―_リモート可の求人 -->
  <div class="l-container">
    <section class="top-slider-remote">
      <div class="c-slider-title-container">
        <h2 class="c-slider-title">リモート可の求人</h2>
        <a class="c-slider-link" href="<?php echo esc_url( home_url( '/recruit/job_tag/remote/' ) ); ?>">もっと見る</a>
      </div>
      <div class="c-slider-container">
        <div class="splide js-top-slider">
          <div class="splide__track">
            <div class="splide__list">
              <!-- リモート可の求人カード -->
              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>

              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>

              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>
              <!-- リモート可の求人カード end -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- カードスライダ― リモート可の求人 end -->
  <!-- カードスライダ―_副業OKの求人 -->
  <div class="l-container">
    <section class="top-slider-side-job">
      <div class="c-slider-title-container">
        <h2 class="c-slider-title">副業OKの求人</h2>
        <a class="c-slider-link" href="<?php echo esc_url( home_url( '/recruit/job_tag/side-job/' ) ); ?>">もっと見る</a>
      </div>
      <div class="c-slider-container">
        <div class="splide js-top-slider">
          <div class="splide__track">
            <div class="splide__list">
              <!-- 副業OKの求人カード -->
              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>

              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>

              <div class="splide__slide">
                <article class="c-card-top-container">
                  <div class="c-card-top-image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>"
                      width="767" height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </div>
                  <div class="c-card-top-content">
                    <div class="c-card-top-header">
                      <img class='c-card-top-company-logo'
                        src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
                        width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
                      <h3 class="c-card-top-company">合同会社LIBERA</h3>
                    </div>
                    <p class="c-card-top-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
                    <ul class="c-card-top-tags">
                      <li><a href="/">#未経験歓迎</a></li>
                      <li><a href="/">#リモート可</a></li>
                      <li><a href="/">#副業OK</a></li>
                      <li><a href="/">#フレックス勤務</a></li>
                      <li><a href="/">#経験者優遇</a></li>
                      <li><a href="/">#服装自由</a></li>
                      <li><a href="/">#土日休み</a></li>
                      <li><a href="/">#PC至急</a></li>
                    </ul>
                  </div>
                  <div class="c-card-link-container">
                    <a class="c-card-link c-card-link-view-more"
                      href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
                      aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
                  </div>
                </article>
              </div>
              <!-- 副業OKの求人カード end -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- カードスライダ― 副業OKの求人 end -->
  <!-- 2カラムセクション -->
  <div class="l-container">
    <section class="l-recruit-2column">
      <!-- aside _サイドバー（SP版では上部に表示） -->
      <aside class="l-recruit-sidebar">
        <?php get_template_part('template-parts/search-form'); ?>
      </aside>
      <!-- aside _サイドバー end -->
      <!-- main _メインコンテンツ -->
      <div class="l-recruit-main ">

        <div class="top-search-container">
          <div class="c-top-taxonomy-title-container">
            <h2 class="c-top-taxonomy-title">職種から探す</h2>
          </div>
          <nav class="top-search-job-category-nav" aria-label="職種から探す">
            <ul class="top-search-job-category-list">
              <li><a href="">Webライター</a></li>
              <li><a href="">フォトグラファー</a></li>
              <li><a href="">グラフィックデザイナー</a></li>
              <li><a href="">イラストレーター</a></li>
              <li><a href="">UI/UXデザイナー</a></li>
              <li><a href="">Webデザイナー</a></li>
              <li><a href="">コーダー・エンジニア</a></li>
              <li><a href="">ディレクター</a></li>
              <li><a href="">アートディレクター</a></li>
              <li><a href="">マーケター</a></li>
            </ul>
          </nav>
        </div>

        <div class="top-search-container">
          <div class="c-top-taxonomy-title-container">
            <h2 class="c-top-taxonomy-title">地域から探す</h2>
          </div>
          <nav class="top-search-area-nav" aria-label="地域から探す">
            <ul class="top-search-area-list">
              <li class="top-search-area-region">
                <a href="">北海道・東北</a>
                <ul class="top-search-area-prefectures">
                  <li><a href="">北海道</a></li>
                  <li><a href="">青森</a></li>
                  <li><a href="">岩手</a></li>
                  <li><a href="">宮城</a></li>
                  <li><a href="">秋田</a></li>
                  <li><a href="">山形</a></li>
                  <li><a href="">福島</a></li>
                </ul>
              </li>
              <li class="top-search-area-region">
                <a href="">関東</a>
                <ul class="top-search-area-prefectures">
                  <li><a href="">東京</a></li>
                  <li><a href="">神奈川</a></li>
                  <li><a href="">埼玉</a></li>
                  <li><a href="">千葉</a></li>
                  <li><a href="">茨城</a></li>
                  <li><a href="">栃木</a></li>
                  <li><a href="">群馬</a></li>
                </ul>
              </li>
              <li class="top-search-area-region">
                <a href="">中部</a>
                <ul class="top-search-area-prefectures">
                  <li><a href="">新潟</a></li>
                  <li><a href="">富山</a></li>
                  <li><a href="">石川</a></li>
                  <li><a href="">福井</a></li>
                  <li><a href="">山梨</a></li>
                  <li><a href="">長野</a></li>
                  <li><a href="">岐阜</a></li>
                  <li><a href="">静岡</a></li>
                  <li><a href="">愛知</a></li>
                </ul>
              </li>
              <li class="top-search-area-region">
                <a href="">近畿</a>
                <ul class="top-search-area-prefectures">
                  <li><a href="">三重</a></li>
                  <li><a href="">滋賀</a></li>
                  <li><a href="">京都</a></li>
                  <li><a href="">大阪</a></li>
                  <li><a href="">兵庫</a></li>
                  <li><a href="">奈良</a></li>
                  <li><a href="">和歌山</a></li>
                </ul>
              </li>
              <li class="top-search-area-region">
                <a href="">中国</a>
                <ul class="top-search-area-prefectures">
                  <li><a href="">鳥取</a></li>
                  <li><a href="">島根</a></li>
                  <li><a href="">岡山</a></li>
                  <li><a href="">広島</a></li>
                  <li><a href="">山口</a></li>
                </ul>
              </li>
              <li class="top-search-area-region">
                <a href="">四国</a>
                <ul class="top-search-area-prefectures">
                  <li><a href="">徳島</a></li>
                  <li><a href="">香川</a></li>
                  <li><a href="">愛媛</a></li>
                  <li><a href="">高知</a></li>
                </ul>
              </li>
              <li class="top-search-area-region">
                <a href="">九州・沖縄</a>
                <ul class="top-search-area-prefectures">
                  <li><a href="">福岡</a></li>
                  <li><a href="">佐賀</a></li>
                  <li><a href="">長崎</a></li>
                  <li><a href="">熊本</a></li>
                  <li><a href="">大分</a></li>
                  <li><a href="">宮崎</a></li>
                  <li><a href="">鹿児島</a></li>
                  <li><a href="">沖縄</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

        <div class="top-search-container">
          <div class="c-top-taxonomy-title-container">
            <h2 class="c-top-taxonomy-title">雇用形態/タグから探す</h2>
          </div>
          <h3 class="top-search-employment-tag-text">雇用形態から探す</h3>
          <nav class="top-search-employment-tag-nav" aria-label="雇用形態から探す">
            <ul class="top-search-employment-tag-list">
              <li><a href="">正社員</a></li>
              <li><a href="">契約社員</a></li>
              <li><a href="">派遣社員</a></li>
              <li><a href="">フリーランス</a></li>
              <li><a href="">副業OK</a></li>
              <li><a href="">アルバイト</a></li>
              <li><a href="">インターン</a></li>
            </ul>
          </nav>
          <h3 class="top-search-employment-tag-text">タグから探す</h3>
          <nav class="top-search-employment-tag-nav" aria-label="タグから探す">
            <ul class="top-search-employment-tag-list top-search-tag-list">
              <li><a href="">未経験歓迎</a></li>
              <li><a href="">リモート可</a></li>
              <li><a href="">副業OK</a></li>
              <li><a href="">フレックス勤務</a></li>
              <li><a href="">土日休み</a></li>
              <li><a href="">学歴不問</a></li>
              <li><a href="">服装自由</a></li>
              <li><a href="">経験者優遇</a></li>
              <li><a href="">PC支給</a></li>
            </ul>
          </nav>
        </div>
        <!-- 就活コラム -->
        <div class="top-column-container">
          <div class="c-top-column-title-container">
            <h2 class="c-top-column-title">就活コラム</h2>
          </div>

          <div class="top-column-cards-wrapper">
            <article class="c-card-top-column-container">
              <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
                <div class="c-card-top-column-image">
                  <picture>
                    <source media="(max-width: 767px)"
                      srcset="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-column-sp@2x.webp' ); ?>"
                      type="image/webp">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-column@2x.webp' ); ?>"
                      width="767" height="306" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </picture>
                </div>
                <div class="c-card-top-column-content">
                  <span class="c-card-column-badge">スキルアップ</span>
                  <h3 class="c-card-top-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h3>
                  <div class="c-card-column-date-container">
                    <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                    <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
                  </div>
                </div>
              </a>
            </article>
            <article class="c-card-top-column-container">
              <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
                <div class="c-card-top-column-image">
                  <picture>
                    <source media="(max-width: 767px)"
                      srcset="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-column-sp@2x.webp' ); ?>"
                      type="image/webp">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-column@2x.webp' ); ?>"
                      width="767" height="306" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </picture>
                </div>
                <div class="c-card-top-column-content">
                  <span class="c-card-column-badge">スキルアップ</span>
                  <h3 class="c-card-top-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h3>
                  <div class="c-card-column-date-container">
                    <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                    <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
                  </div>
                </div>
              </a>
            </article>
            <article class="c-card-top-column-container">
              <a href="<?php echo esc_url( home_url( '/column/001/' ) ); ?>">
                <div class="c-card-top-column-image">
                  <picture>
                    <source media="(max-width: 767px)"
                      srcset="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-column-sp@2x.webp' ); ?>"
                      type="image/webp">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-column@2x.webp' ); ?>"
                      width="767" height="306" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
                  </picture>
                </div>
                <div class="c-card-top-column-content">
                  <span class="c-card-column-badge">スキルアップ</span>
                  <h3 class="c-card-top-column-title">Web制作会社が面接で見るポイントを徹底解説！（スタイル確認用）</h3>
                  <div class="c-card-column-date-container">
                    <time class="c-card-column-date" datetime="2025-10-28">2025.10.28</time>
                    <time class="c-card-column-update" datetime="2026-02-17">2026.02.17</time>
                  </div>
                </div>
              </a>
            </article>
          </div>

          <!-- 就活コラム end -->
        </div>
      </div>
      <!-- main _メインコンテンツ end -->
    </section>
  </div>
  <!-- 2カラムセクション end -->




  <!-- コンポーネント仮作成 -->
  <div class="l-container">
    <!-- トップページ用コラムカード -->
    <!-- 求人一覧カード_ベース -->
    <article class="c-card-archive-container">
      <div class="c-card-archive-image">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/recruite-card-thumbnail@2x.webp' ); ?>"
          width="1548" height="602" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
      </div>
      <div class="c-card-archive-content">
        <div class="c-card-archive-header">
          <img class='c-card-archive-company-logo'
            src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
            width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
          <h3 class="c-card-archive-company">合同会社LIBERA</h3>
        </div>
        <p class="c-card-archive-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
        <ul class="c-card-archive-tags">
          <li><a href="/">#未経験歓迎</a></li>
          <li><a href="/">#リモート可</a></li>
          <li><a href="/">#副業OK</a></li>
          <li><a href="/">#フレックス勤務</a></li>
          <li><a href="/">#経験者優遇</a></li>
          <li><a href="/">#服装自由</a></li>
          <li><a href="/">#土日休み</a></li>
          <li><a href="/">#PC支給</a></li>
        </ul>
        <div class="c-card-archive-list-container">
          <dl class="c-card-archive-list">
            <dt class="c-card-archive-list-title">雇用形態</dt>
            <dd class="c-card-archive-list-value">正社員</dd>
            <dt class="c-card-archive-list-title">職種</dt>
            <dd class="c-card-archive-list-value">コーダー・エンジニア</dd>
            <dt class="c-card-archive-list-title">地域</dt>
            <dd class="c-card-archive-list-value">福岡</dd>
            <dt class="c-card-archive-list-title">年収</dt>
            <dd class="c-card-archive-list-value">300万円</dd>
          </dl>
        </div>
      </div>
      <div class="c-card-link-container c-card-link-recruit-container">
        <a class="c-card-link c-card-link-apply" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
          aria-label="求人に応募する">応募する</a>
        <a class="c-card-link c-card-link-view-more" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
          aria-label="求人の詳細を見る">詳しく見る</a>
        <a class="c-card-link c-card-link-favorite" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
          aria-label="求人募集記事をお気に入り登録する">お気に入り</a>

      </div>
    </article>
    <!-- 求人一覧カード_ベース end -->
    <!-- 求人一覧カード_人気ランキング -->
    <section class="popular-ranking-section ranking-counter-reset">
      <article class="c-card-archive-container ranking-counter-increment">
        <div class="c-card-archive-rank-view-container">
          <div class="c-card-archive-rank c-card-archive-rank--top"></div>
          <div class="c-card-archive-views"><span class="c-card-archive-views-number">X</span>Views</div>
          <div class="c-card-archive-image">
            <img
              src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/recruite-card-thumbnail@2x.webp' ); ?>"
              width="1548" height="602" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
          </div>
        </div>
        <div class="c-card-archive-content">
          <div class="c-card-archive-header">
            <img class='c-card-archive-company-logo'
              src='<?php echo esc_url( get_template_directory_uri() . '/img/common/company-logo@2x.webp' ); ?>'
              width='120' height='120' alt='合同会社LIBERAロゴ' decoding='async' />
            <h3 class="c-card-archive-company">合同会社LIBERA</h3>
          </div>
          <p class="c-card-archive-copy">【未経験OK】Web制作会社のコーダー募集｜デザインの意図を形にする仕事</p>
          <ul class="c-card-archive-tags">
            <li><a href="/">#未経験歓迎</a></li>
            <li><a href="/">#リモート可</a></li>
            <li><a href="/">#副業OK</a></li>
            <li><a href="/">#フレックス勤務</a></li>
            <li><a href="/">#経験者優遇</a></li>
            <li><a href="/">#服装自由</a></li>
            <li><a href="/">#土日休み</a></li>
            <li><a href="/">#PC支給</a></li>
          </ul>
          <div class="c-card-archive-list-container">
            <dl class="c-card-archive-list">
              <dt class="c-card-archive-list-title">雇用形態</dt>
              <dd class="c-card-archive-list-value">正社員</dd>
              <dt class="c-card-archive-list-title">職種</dt>
              <dd class="c-card-archive-list-value">コーダー・エンジニア</dd>
              <dt class="c-card-archive-list-title">地域</dt>
              <dd class="c-card-archive-list-value">福岡</dd>
              <dt class="c-card-archive-list-title">年収</dt>
              <dd class="c-card-archive-list-value">300万円</dd>
            </dl>
          </div>
        </div>
        <div class="c-card-link-container c-card-link-recruit-container">
          <a class="c-card-link c-card-link-apply" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
            aria-label="求人に応募する">応募する</a>
          <a class="c-card-link c-card-link-view-more" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
            aria-label="求人の詳細を見る">詳しく見る</a>
          <a class="c-card-link c-card-link-favorite" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
            aria-label="求人募集記事をお気に入り登録する">お気に入り</a>
        </div>
      </article>
    </section>
    <!-- 求人一覧カード_お気に入り登録 end -->
  </div>
  <!-- コンポーネント仮作成 終わり -->
</main>
<!-- main end -->
<?php get_footer(); ?>