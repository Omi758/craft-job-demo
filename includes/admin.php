<?php
// 求人の編集画面からスラッグ欄を非表示にする_記事IDを直接指定するため管理画面slug欄を非表示にする
function craftjob_remove_slug_meta_box(){
	remove_meta_box( 'slugdiv', 'recruit', 'normal' );
}
add_action( 'admin_menu', 'craftjob_remove_slug_meta_box' );
/**
 * 管理画面の求人一覧に「会社名」列を追加（会社 CPT へ紐づく ACF company → company_name）
 */
function craftjob_add_recruit_related_company_column( $columns ) {
	$key   = 'craftjob_related_company_name';
	$label = '会社名';
	$out   = array();
	$done  = false;
	foreach ( $columns as $col_key => $col_label ) {
		$out[ $col_key ] = $col_label;
		if ( 'title' === $col_key ) {
			$out[ $key ] = $label;
			$done        = true;
		}
	}
	if ( ! $done ) {
		$out[ $key ] = $label;
	}
	return $out;
}

/*
 * Admin Columns は manage_edit-{post_type}_columns を優先度 200 で、登録列だけに完全差し替えする。
 * manage_recruit_posts_columns より後に実行されるため、そちらに足しても一覧から消える。
 * → manage_edit-recruit_columns を優先度 999 で登録し、Admin Columns（既定 200）の後に差し込む。
 */
add_filter( 'manage_edit-recruit_columns', 'craftjob_add_recruit_related_company_column', 999 );

function craftjob_display_recruit_related_company_column( $column, $post_id ) {
	if ( 'craftjob_related_company_name' !== $column ) {
		return;
	}
	if ( ! function_exists( 'get_field' ) ) {
		echo '&mdash;';
		return;
	}
	$company = get_field( 'company', $post_id );
	if ( empty( $company ) ) {
		echo '&mdash;';
		return;
	}
	if ( is_array( $company ) ) {
		$company = reset( $company );
	}
	$company_id = is_object( $company ) ? (int) $company->ID : (int) $company;
	if ( $company_id <= 0 ) {
		echo '&mdash;';
		return;
	}
	$name = get_field( 'company_name', $company_id );
	echo $name ? esc_html( $name ) : '&mdash;';
}
add_action( 'manage_recruit_posts_custom_column', 'craftjob_display_recruit_related_company_column', 10, 2 );