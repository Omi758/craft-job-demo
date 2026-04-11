<?php
/**
 * 求人詳細ページの閲覧数を日別にカウント + 7日間合計を更新
 */
 function craftjob_count_post_views() {
	// ガード１_求人詳細ページ以外は何もしない
	if ( ! is_singular( 'recruit' ) ) {
		return;
	}

	// ガード２_管理者（ログイン中）のアクセスは除外
	if ( current_user_can( 'manage_options' ) ) {
		return;
	}

	// ガード３_bot（クローラー）のアクセスは除外
	if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && preg_match( '/bot|crawler|spider|slurp/i', $_SERVER['HTTP_USER_AGENT'] ) ) {
		return;
	}

  // 現在の投稿IDを取得
  $post_id = get_the_ID();

  // 今日の日付キーを作る（例： craftjob_views_20260322）
  $today_key = 'craftjob_views_' . current_time( 'Ymd' );

  // 現在のカウントを取得
  $current_count = (int) get_post_meta( $post_id, $today_key, true );

  // +1して更新
  update_post_meta( $post_id, $today_key, $current_count + 1 );

  // 7日間合計を更新
  craftjob_update_7days_total( $post_id );

}

 add_action( 'wp_head', 'craftjob_count_post_views' );


/**
 * 直近７日間の閲覧数合計を計算し、post_metaに保存
 * ８日以上前の日別データを削除（掃除）
 */
function craftjob_update_7days_total( $post_id ) {
	$total = 0;

	// 直近７日分のキーを作って合算
	for ( $i = 0; $i < 7; $i++ ) {
		$date_key = 'craftjob_views_' . date( 'Ymd', strtotime( '-' . $i . ' days', current_time( 'timestamp' ) ) );
		$total += (int) get_post_meta( $post_id, $date_key, true );
	}

	// 合計値を保存（ランキングのソートに使用）
	update_post_meta( $post_id, 'craftjob_views_7days', $total );

	// 8日以上前のデータを削除（14日前まで遡って掃除）
	for ( $i = 8; $i <= 14; $i++ ) {
		$old_key = 'craftjob_views_' . date( 'Ymd', strtotime( '-' . $i . ' days', current_time( 'timestamp' )  ) );
	  delete_post_meta( $post_id, $old_key );
	}
}

/**
 * 求人を公開したときに閲覧数の初期値を設定
 */
function craftjob_set_initial_views( $post_id, $post ) {
	if ( 'recruit' !== $post->post_type ) {
			return;
	}
	if ( '' === get_post_meta( $post_id, 'craftjob_views_7days', true ) ) {
			update_post_meta( $post_id, 'craftjob_views_7days', 0 );
	}
}
add_action( 'wp_insert_post', 'craftjob_set_initial_views', 10, 2 );


/**
* 管理画面の求人一覧に「７日間PV」カラムを追加
*/
// カラムの見出しを追加
function craftjob_add_views_column( $columns ) {
	$columns['views_7days'] = '7日間PV';
	return $columns;
}

add_filter( 'manage_recruit_posts_columns', 'craftjob_add_views_column' );

// カラムの中身を表示
function craftjob_display_views_column( $column, $post_id ) {
	if ( 'views_7days' === $column ) {
		$views = (int) get_post_meta( $post_id, 'craftjob_views_7days', true );
		echo esc_html( $views );
	}
}
add_action( 'manage_recruit_posts_custom_column', 'craftjob_display_views_column', 10, 2 );

// ソート可能にする
function craftjob_sortable_views_column( $columns ) {
	$columns['views_7days'] = 'craftjob_views_7days';
	return $columns;
}
add_filter( 'manage_edit-recruit_sortable_columns', 'craftjob_sortable_views_column' );

// ソート時のクエリを制御
function craftjob_views_orderby( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() ) {
		return;
	}
  if ( 'craftjob_views_7days' === $query->get( 'orderby' ) ) {
	  $query->set( 'meta_key', 'craftjob_views_7days' );
	  $query->set( 'orderby', 'meta_value_num' );
  }
}
add_action( 'pre_get_posts', 'craftjob_views_orderby' );