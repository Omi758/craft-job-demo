  <!-- top-search-bar -->
  <form class="c-search-form-top" action="<?php echo esc_url( home_url( '/recruit/' ) ); ?>" method="get">
    <p class="c-search-form-top-form-title">絞り込み検索</p>
    <div class="c-search-form-top-body">
      <!-- 地域プルダウン -->
      <div class="c-search-form-top-item">
        <div class="c-search-form-select-wrapper">
          <select class="c-search-form-input" name="area" id="kv-area" aria-label="地域">
            <option value="">地域を選択</option>
            <?php
              $parent_areas = get_terms( array(
                "taxonomy" => "area",
                "parent" => 0,
                "hide_empty" => false,
              ) );
              if ( ! is_wp_error( $parent_areas ) && ! empty( $parent_areas ) ) :
                foreach ( $parent_areas as $parent_term ) :
                  echo '<option value="' . esc_attr( $parent_term->slug ) . '">' .esc_html( $parent_term->name ) . '</option>';
              
                  $child_areas = get_terms( array(
                    "taxonomy" => "area",
                    "parent" => $parent_term->term_id,
                    "hide_empty" => false,
                  ) );
                  if ( ! is_wp_error( $child_areas ) && ! empty( $child_areas )) :
                    foreach ( $child_areas as $child_term ) :
                      echo '<option value="' . esc_attr( $child_term->slug ) . '">　' .esc_html( $child_term->name ) . '</option>';
                    endforeach;
                  endif;
                endforeach;
              endif;
              ?>
          </select>
        </div>
      </div>
      <!-- 雇用形態プルダウン -->
      <div class="c-search-form-top-item">
        <div class="c-search-form-select-wrapper">
          <select class="c-search-form-input" name="employment_type" id="kv-employment_type" aria-label="雇用形態">
            <option value="">雇用形態を選択</option>
            <?php
              $employment_terms = get_terms( array(
                'taxonomy' => 'employment_type',
                'hide_empty' => false,
              ) );
              if ( ! is_wp_error( $employment_terms ) && ! empty( $employment_terms ) ) :
                foreach ( $employment_terms as $term ) :
              ?>
            <option value="<?php echo esc_attr( $term->slug ); ?>">
              <?php echo esc_html( $term->name ); ?></option>
            <?php
                endforeach;
              endif;
              ?>
          </select>
        </div>
      </div>
      <!-- 職種プルダウン -->
      <div class="c-search-form-top-item">
        <div class="c-search-form-select-wrapper">
          <select class="c-search-form-input" name="job_category" id="kv-job_category" aria-label="職種">
            <option value="">職種を選択</option>
            <?php
              $job_categories = get_terms( array(
                'taxonomy' => 'job_category',
                'hide_empty' => false,
              ) );
              if (! is_wp_error( $job_categories ) && ! empty( $job_categories )) :
                foreach ( $job_categories as $term ) :
              ?>
            <option value="<?php echo esc_attr( $term->slug ); ?>">
              <?php echo esc_html( $term->name ); ?></option>
            <?php
                endforeach;
              endif;
              ?>
          </select>
        </div>
      </div>
      <!-- ボタン -->
      <button class="c-search-form-top-button" type="submit">検索する</button>
    </div>
  </form>
  <!-- top-search-form-top end -->