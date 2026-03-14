      <!-- 絞り込み検索 -->
      <form class="c-search-form" action="<?php echo esc_url( home_url( '/recruit/' ) ); ?>" method="get">
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
                  <option value="">選択してください</option>
                  <?php
                  $parent_areas = get_terms( array(
                    "taxonomy" => "area",
                    "parent" => 0, // 親がいない（=最上位）ものだけ取得
                    "hide_empty" => false,
                  ));
                  
                  if ( ! is_wp_error( $parent_areas ) && ! empty( $parent_areas )) {
                    $selected = isset( $_GET['area'] ) ? sanitize_text_field( wp_unslash( $_GET['area'] ) ) : '';
                    foreach ( $parent_areas as $parent_term ) :
                    // 親のoption(地方)を表示
                    $selected_attr =  ( $selected === $parent_term->slug ) ? 'selected' : '';
                    echo '<option value="' .esc_attr( $parent_term->slug ) .'" ' . $selected_attr . '>' . esc_html( $parent_term->name ) . '</option>';

                    // その親に紐づく「子（都道府県）」を取得
                    $child_areas = get_terms(array(
                      "taxonomy" => "area",
                      "parent" => $parent_term->term_id, // 現在の親のIDを指定
                      "hide_empty" => false,
                    ));
                    if ( ! is_wp_error( $child_areas ) && ! empty( $child_areas )) :
                      foreach ( $child_areas as $child_term ) :
                        // 子のoption(都道府県)を表示_親と子でインデントをずらす（全角スペース）ことで階層を表現
                        $selected_attr =  ( $selected === $child_term->slug ) ? 'selected' : '';
                        echo '<option value="' .esc_attr( $child_term->slug ) .'"' . $selected_attr . '>　' . esc_html( $child_term->name ) . '</option>';
                      endforeach;
                      endif;
                    
                    endforeach;
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- 雇用形態プルダウン -->
            <div class="c-search-form-item">
              <label class="c-search-form-label c-search-form-label--employment-type" for="employment_type">雇用形態</label>
              <div class="c-search-form-select-wrapper">
                <select class="c-search-form-input" name="employment_type" id="employment_type">
                  <option value="">選択してください</option>
                  <?php
                  $employment_terms = get_terms( array(
                    "taxonomy" => "employment_type",
                    "hide_empty" => false,
                  ));
                  if ( ! is_wp_error( $employment_terms ) && ! empty( $employment_terms )) {
                    $selected = isset( $_GET['employment_type'] ) ? sanitize_text_field( wp_unslash( $_GET['employment_type'] ) ) : '';
                    foreach ( $employment_terms as $term ) {
                      $is_selected = ( $selected === $term->slug ) ? ' selected ' : '';
                      ?>
                  <option value="<?php echo esc_attr( $term->slug ); ?>" <?php echo $is_selected; ?>>
                    <?php echo esc_html( $term->name ); ?></option>
                  <?php
                  }
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- 職種プルダウン -->
            <div class="c-search-form-item">
              <label class="c-search-form-label c-search-form-label--job-category" for="job_category">職種</label>
              <div class="c-search-form-select-wrapper">
                <select class="c-search-form-input" name="job_category" id="job_category">
                  <option value="">選択してください</option>
                  <?php
                  $job_categories = get_terms( array(
                    "taxonomy" => "job_category",
                    "hide_empty" => false, // 求人が0件のタームも含めて取得(表示)
                  ));
                  if ( ! is_wp_error( $job_categories ) && ! empty( $job_categories )) {
                    $selected = isset( $_GET['job_category'] ) ? sanitize_text_field( wp_unslash( $_GET['job_category'] ) ) : '';
                    foreach ( $job_categories as $term ) {
                      $is_selected = ( $selected === $term->slug ) ? ' selected ' : '';
                      ?>
                  <option value="<?php echo esc_attr( $term->slug ); ?>" <?php echo $is_selected; ?>>
                    <?php echo esc_html( $term->name ); ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- 年収入力欄 -->
            <div class="c-search-form-item">
              <span class="c-search-form-label c-search-form-label--salary"><span
                  class="c-search-form-label-salary-inner">年収<span>（単位：万円）</span></span></span>
              <div class="c-search-form-salary-wrapper">
                <input class="c-search-form-input c-search-form-salary--min" type="number" name="salary_min"
                  id="salary_min" placeholder="例：300" step="50" min="0"
                  value="<?php echo isset( $_GET['salary_min'] ) ? esc_attr( $_GET['salary_min'] ) : ''; ?>">
                <span class="c-search-form-label-separator">~</span>
                <input class="c-search-form-input c-search-form-salary--max" type="number" name="salary_max"
                  id="salary_max" placeholder="例：500" step="50" min="0"
                  value="<?php echo isset( $_GET['salary_max'] ) ? esc_attr( $_GET['salary_max'] ) : ''; ?>">
              </div>
            </div>
            <!-- ボタン -->
            <div class="c-search-form-button-container"><button class="c-search-form-button" type="submit">検索する</button>
            </div>
          </div>
        </details>
      </form>
      <!-- 絞り込み検索 end -->