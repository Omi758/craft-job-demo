<?php
	/**
 * パンくずリストのカテゴリーURLを/column/category/{slug}に変更
 */
function craftjob_breadcrumb_category_url( $url, $type, $id ) {
	if ($type[0] === 'taxonomy' && $type[1] === 'category') {
		$term = get_term( $id, 'category' );
		if ($term && ! is_wp_error( $term )) {
			$url = home_url( '/column/category/' . $term->slug . '/' );
		}
	}
	return $url;
}
add_filter( 'bcn_breadcrumb_url', 'craftjob_breadcrumb_category_url', 10, 3 );

/**
 * パンくずの「求人」を「求人を探す」に変更
 */
function craftjob_breadcrumb_rename_recruit( $title, $type, $id ) {
	if ( $type[0] === 'archive' && $title === '求人' ) {
			$title = '求人を探す';
	}
	return $title;
}
add_filter( 'bcn_breadcrumb_title', 'craftjob_breadcrumb_rename_recruit', 10, 3 );