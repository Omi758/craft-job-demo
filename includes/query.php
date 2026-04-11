<?php
/**
 * 表示件数の設定_コラム一覧・タクソノミー一覧・求人一覧
 * タクソノミー条件（tax_query）の組み立て_archive-recruit.php
 * 年収条件（meta_query）の組み立て_archive-recruit.php
 * 人気ランキングの表示件数_10件
 * 検索結果の表示件数_12件
 * 地域条件（tax_query）の組み立て_archive-recruit.php
 * 雇用形態条件（tax_query）の組み立て_archive-recruit.php
 * 職種条件（tax_query）の組み立て_archive-recruit.php
 * 年収条件（meta_query）の組み立て_archive-recruit.php
 */
function craftjob_posts_per_page( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	// コラム一覧_表示件数9件
	if ( $query->is_home() || get_query_var( 'column_category' )  ) {
		$query->set( 'posts_per_page', 9 );

		// カテゴリで記事を絞り込む
		$category_slug = get_query_var('column_category');
		if ( $category_slug ) {
			$query->set( 'post_type', 'post' );
			$category = get_category_by_slug($category_slug);
			if ( $category ) {
			    $query->set( 'category_name', $category_slug );
			}
		}
}

// タクソノミー一覧_表示件数12件
		if ( $query->is_tax() ) {
			$query->set( 'posts_per_page', 12 );
		}

		// 求人（検索対応）_表示件数12件
		if ( $query->is_post_type_archive( 'recruit' ) ) {
      // 人気ランキング
			if ( 'popular' === get_query_var( 'craftjob_page' ) ) {
				$query->set( 'posts_per_page', 10 );
				$query->set( 'meta_key', 'craftjob_views_7days' );
				$query->set( 'orderby', 'meta_value_num' );
				$query->set( 'order', 'DESC' );
				return;
			}

			
			$query->set( 'posts_per_page', 12 );

	// ========= 検索ロジック =========
	// 1. タクソノミー条件の組み立て
	$tax_query = array();

	// 地域
	if ( !empty( $_GET['area'] ) ) {
		$area_slug = sanitize_text_field( wp_unslash( $_GET['area'] ) );
		$tax_query[] = array(
			'taxonomy' => 'area',
			'field'    => 'slug',
			'terms'    => $area_slug,
			'include_children' => true,
		);
	}

	// 雇用形態
	if( !empty( $_GET['employment_type'] ) ) {
		$employment_slug = sanitize_text_field( wp_unslash( $_GET['employment_type'] ) );
		$tax_query[] = array(
			'taxonomy' => 'employment_type',
			'field'    => 'slug',
			'terms'    => $employment_slug,
		);
	}

	// 職種
	if ( ! empty( $_GET['job_category'] ) ) {
		$job_slug = sanitize_text_field( wp_unslash( $_GET['job_category']) );
		$tax_query[] = array(
			'taxonomy' => 'job_category',
			'field'    => 'slug',
			'terms'    => $job_slug,
		);
	}

	if ( ! empty( $tax_query ) ) {
		$tax_query['relation'] = 'AND';
		$query->set( 'tax_query', $tax_query );
	}

	// 2. 年収条件（meta_query）の組み立て
	$meta_query = array();

	if ( ! empty( $_GET['salary_min'] ) ) {
		$meta_query[] = array(
			'key'     => 'salary',
			'value'   => intval( $_GET['salary_min'] ),
			'compare' => '>=',
			'type'    => 'NUMERIC',
		);
	}

	if ( ! empty( $_GET['salary_max'] ) ) {
		$meta_query[] = array(
			'key'     => 'salary',
			'value'   => intval( $_GET[ 'salary_max' ] ),
			'compare' => '<=',
			'type'    => 'NUMERIC',
		);
	}

	if ( !empty( $meta_query ) ) {
		$meta_query['relation'] = 'AND';
		$query->set( 'meta_query', $meta_query );
	}
}
}
add_action( 'pre_get_posts', 'craftjob_posts_per_page' );