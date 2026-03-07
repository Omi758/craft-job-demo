<?php get_header(); ?>
<!-- パンくず -->
<?php get_template_part('template-parts/breadcrumb'); ?>
<!-- パンくず end -->
<!-- single-recruit_body -->
<div class="recruit-single l-container u-mtb-page">
  <div class="recruit-single-2column">
    <!-- main _メインコンテンツ -->
    <main>
      <div>
        <div class="recruit-single-title">
          <h1 class="c-page-title"><?php the_title(); ?></h1>
        </div>
      </div>
      <section class="recruit-single-detail"></section>
      <section class="recruit-single-company-info"></section>
      <section class="recruit-single-entry-form"></section>
    </main>
    <!-- main _メインコンテンツ end -->
    <!-- aside _サイドバー -->
    <aside>
      <!-- 絞り込み検索 -->
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
      <!-- 絞り込み検索 end -->

    </aside>
    <!-- aside _サイドバー end -->
  </div>
</div>
<!-- single-recruit_body end -->
<?php get_footer(); ?>