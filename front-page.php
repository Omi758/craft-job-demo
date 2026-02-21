<?php get_header(); ?>
<!-- main -->
<main class="top">
  <!-- top-kv -->
  <section class="top-kv">
    <div class="top-kv-container">
      <div class="top-kv-text-content">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-kv-emblem.webp' ); ?>" width="465"
          height="151" alt="制作会社の掲載数ナンバーワン" decoding="async" />
        <h2 class="top-kv-title">
          <span class="top-kv-title-main">Web制作会社への転職を、</span>
          <span>最短ルートで。</span>
        </h2>
        <div class="top-kv-text-item">
          <p>リモート</p>
          <p>求人多数</p>
        </div>
        <div class="top-kv-text-item">
          <p>未経験可</p>
          <p>の求人あり</p>
        </div>
      </div>

      <div class="top-kv-image">
        <picture>
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
  <!-- top-search -->
  <section class="top-search">
    <div class="top-search-container l-container">
      <input type="text" placeholder="キーワードで探す">
      <button>検索する</button>
    </div>
  </section>
  <!-- top-search end -->

  <!-- 以下、コンポーネントを仮作成_先頭は仮レイアウト用div -->
  <div class="l-container">
    <!-- 共通_タイトル -->
    <div class="c-page-title-container">
      <h2 class="c-page-title">求人を探す</h2>
    </div>
    <!-- 共通_タイトル end -->
    <!-- コラム一覧タイトル  -->
    <div class="c-column-title-container">
      <h2 class="c-column-title">就活コラム</h2>
    </div>
    <!-- コラム一覧タイトル end -->
    <!-- パンくず -->
    <div class="c-breadcrumb-container">
      <nav class="c-breadcrumb-nav l-container" aria-label="パンくずリスト">
        <ul class="c-breadcrumb-list">
          <li class="c-breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Web制作業界特化の求人サイトCraftJob</a>
          </li>
          <li class="c-breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">プライバシーポリシー</a></li>
        </ul>
      </nav>
    </div>
    <!-- パンくず end -->
    <!-- カード（トップページ用） -->
    <article class="c-card-top-container">
      <div class="c-card-top-image">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-thumbnail@2x.webp' ); ?>" width="767"
          height="414" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
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
        <a class="c-card-link c-card-link-view-more" href="<?php echo esc_url( home_url( '/recruit/1/' ) ); ?>"
          aria-label="【未経験OK】Web制作会社のコーダー募集の詳細を見る">詳しく見る</a>
      </div>
    </article>
    <!-- カード（トップページ用） end -->
    <!-- 絞り込み検索_サイドバー用 -->
    <form class="c-search-form" action="<?php echo esc_url( home_url( '/recruit/search/' ) ); ?>" method="get">
      <details class="c-search-form-details js-search-form-details">
        <summary class="c-search-form-summary js-search-form-summary">
          絞り込み検索
          <span class="c-search-form-summary-icon">
            <span></span>
            <span></span>
          </span>
        </summary>
        <div class="c-search-form-body">
          <!-- 地域プルダウン -->
          <div class="c-search-form-item">
            <label class="c-search-form-label c-search-form-label--area" for="area">地域</label>
            <div class="c-search-form-select-wrapper">
              <select class="c-search-form-input" name="area" id="area">
                <option value="" disabled selected>選択してください</option>
                <optgroup label="北海道・東北">
                  <option value="hokkaido">北海道</option>
                  <option value="aomori">青森</option>
                  <option value="iwate">岩手</option>
                  <option value="miyagi">宮城</option>
                  <option value="akita">秋田</option>
                  <option value="yamagata">山形</option>
                  <option value="fukushima">福島</option>
                </optgroup>
                <optgroup label="関東">
                  <option value="tokyo">東京</option>
                  <option value="kanagawa">神奈川</option>
                  <option value="saitama">埼玉</option>
                  <option value="chiba">千葉</option>
                  <option value="ibaraki">茨城</option>
                  <option value="gunma">群馬</option>
                  <option value="tochigi">栃木</option>
                </optgroup>
                <optgroup label="中部">
                  <option value="niigata">新潟</option>
                  <option value="toyama">富山</option>
                  <option value="ishikawa">石川</option>
                  <option value="fukui">福井</option>
                  <option value="yamanashi">山梨</option>
                  <option value="nagano">長野</option>
                  <option value="gifu">岐阜</option>
                  <option value="shizuoka">静岡</option>
                  <option value="aichi">愛知</option>
                </optgroup>
                <optgroup label="近畿">
                  <option value="mie">三重</option>
                  <option value="shiga">滋賀</option>
                  <option value="kyoto">京都</option>
                  <option value="osaka">大阪</option>
                  <option value="hyogo">兵庫</option>
                  <option value="nara">奈良</option>
                  <option value="wakayama">和歌山</option>
                </optgroup>
                <optgroup label="中国">
                  <option value="tottori">鳥取</option>
                  <option value="shimane">島根</option>
                  <option value="okayama">岡山</option>
                  <option value="hiroshima">広島</option>
                  <option value="yamaguchi">山口</option>
                </optgroup>
                <optgroup label="四国">
                  <option value="tokushima">徳島</option>
                  <option value="kagawa">香川</option>
                  <option value="ehime">愛媛</option>
                  <option value="kochi">高知</option>
                </optgroup>
                <optgroup label="九州・沖縄">
                  <option value="fukuoka">福岡</option>
                  <option value="saga">佐賀</option>
                  <option value="nagasaki">長崎</option>
                  <option value="kumamoto">熊本</option>
                  <option value="oita">大分</option>
                  <option value="miyazaki">宮崎</option>
                  <option value="kagoshima">鹿児島</option>
                  <option value="okinawa">沖縄</option>
                </optgroup>
              </select>
            </div>
          </div>
          <!-- 雇用形態プルダウン -->
          <div class="c-search-form-item">
            <label class="c-search-form-label c-search-form-label--employment-type" for="employment_type">雇用形態</label>
            <div class="c-search-form-select-wrapper">
              <select class="c-search-form-input" name="employment_type" id="employment_type">
                <option value="" disabled selected>選択してください</option>
                <option value="full-time">正社員</option>
                <option value="contract">契約社員</option>
                <option value="temporary">派遣社員</option>
                <option value="freelance">フリーランス</option>
                <option value="side-job">副業</option>
                <option value="part-time">アルバイト</option>
                <option value="intern">インターン</option>
              </select>
            </div>
          </div>
          <!-- 職種プルダウン -->
          <div class="c-search-form-item">
            <label class="c-search-form-label c-search-form-label--job-category" for="job_category">職種</label>
            <div class="c-search-form-select-wrapper">
              <select class="c-search-form-input" name="job_category" id="job_category">
                <option value="" disabled selected>選択してください</option>
                <option value="web-writer">Webライター</option>
                <option value="photographer">フォトグラファー</option>
                <option value="graphic-designer">グラフィックデザイナー</option>
                <option value="illustrator">イラストレーター</option>
                <option value="ui-ux-designer">UI/UXデザイナー</option>
                <option value="web-designer">Webデザイナー</option>
                <option value="coder-engineer">コーダー・エンジニア</option>
                <option value="director">ディレクター</option>
                <option value="art-director">アートディレクター</option>
                <option value="marketer">マーケター</option>
              </select>
            </div>
          </div>
          <!-- 年収入力欄 -->
          <div class="c-search-form-item">
            <span class="c-search-form-label c-search-form-label--salary"><span
                class="c-search-form-label-salary-inner">年収<span>（単位：万円）</span></span></span>
            <div class="c-search-form-salary-wrapper">
              <input class="c-search-form-input c-search-form-salary--min" type="number" name="salary_min"
                id="salary_min" placeholder="例：300">
              <span class="c-search-form-label-separator">~</span>
              <input class="c-search-form-input c-search-form-salary--max" type="number" name="salary_max"
                id="salary_max" placeholder="例：500">
            </div>
          </div>
          <!-- ボタン -->
          <div class="c-search-form-button-container"><button class="c-search-form-button" type="submit">検索する</button>
          </div>
        </div>
      </details>
    </form>
    <!-- 絞り込み検索_サイドバー用 end -->
    <!-- トップページ用コラムカード -->
    <article class="c-card-top-column-container">
      <div class="c-card-top-column-image">
        <picture>
          <source media="(max-width: 767px)"
            srcset="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-column-sp@2x.webp' ); ?>"
            type="image/webp">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top/top-column@2x.webp' ); ?>" width="767"
            height="306" alt="合同会社LIBERA_求人用サムネイル" decoding="async" />
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
    </article>
    <!-- トップページ用コラムカード end -->
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
    <article class="c-card-archive-container">
      <div class="c-card-archive-rank-view-container">
        <div class="c-card-archive-rank c-card-archive-rank--top">1位</div>
        <div class="c-card-archive-views"><span class="c-card-archive-views-number">X</span>Views</div>
        <div class="c-card-archive-image">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/sub/recruite-card-thumbnail@2x.webp' ); ?>"
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

    <!-- 求人一覧カード_お気に入り登録 end -->
  </div>
  <!-- コンポーネント仮作成 終わり -->

</main>
<!-- main end -->
<?php get_footer(); ?>