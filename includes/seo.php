<?php
/**
 * カスタムページのタイトルタグを変更
 */
function craftjob_custom_title( $title ) {
	// 求人アーカイブ
	if ( is_post_type_archive( 'recruit' ) ) {
			$craftjob_page = get_query_var( 'craftjob_page' );
			$sep = ' | ';
			$site_name = get_bloginfo( 'name' );

			if ( 'popular' === $craftjob_page ) {
					return '人気求人ランキング' . $sep . $site_name;
			} elseif ( 'favorite' === $craftjob_page ) {
					return 'お気に入り求人' . $sep . $site_name;
			} else {
					$has_search = ! empty( $_GET['area'] ) || ! empty( $_GET['employment_type'] ) || ! empty( $_GET['job_category'] ) || ! empty( $_GET['salary_min'] ) || ! empty( $_GET['salary_max'] );
					if ( $has_search ) {
							return '検索結果' . $sep . $site_name;
					}
					return '求人を探す' . $sep . $site_name;
			}
	}

	// コラムカテゴリー
	if ( get_query_var( 'column_category' ) ) {
			$category = get_category_by_slug( get_query_var( 'column_category' ) );
			if ( $category ) {
					return esc_html( $category->name ) . ' | ' . get_bloginfo( 'name' );
			}
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'craftjob_custom_title', 30 );

/**
 * カスタムページのdescriptionを変更
 */
function craftjob_custom_description( $description ) {
	// 求人アーカイブ
	if ( is_post_type_archive( 'recruit' ) ) {
	  $craftjob_page = get_query_var( 'craftjob_page' );

	if ( 'popular' === $craftjob_page ) {
			return 'Web制作業界で注目の人気求人をランキング形式でご紹介。今話題の求人情報をお届けします。';
  	} elseif ( ! $craftjob_page ) {
	  		return 'Web制作業界に特化した求人をご紹介。地域・職種・雇用形態・年収で絞り込み検索も可能です。';
    }
  }

// タクソノミーアーカイブ
if (is_tax() && empty( $description )) {
	$term = get_queried_object();
	if ( $term ) {
		return esc_html( $term->name ) . 'のWeb制作求人一覧。条件に合った求人情報を掲載しています。';
	  }
  }
return $description;
}
add_filter( 'ssp_output_description', 'craftjob_custom_description', 30 );

/**
 * 検索結果・お気に入りページにnoindexを設定
 */
function craftjob_custom_noindex() {
	if ( ! is_post_type_archive( 'recruit' ) ) {
		return;
	}

	$is_favorite = 'favorite' === get_query_var( 'craftjob_page' );
	$has_search = ! empty( $_GET['area'] ) || ! empty( $_GET['employment_type'] ) || ! empty( $_GET['job_category']) || ! empty( $_GET['salary_min']) || ! empty( $_GET['salary_max']);

	if ( $is_favorite || $has_search ) {
		echo '<meta name="robots" content="noindex">' . "\n";
	}
}
add_action( 'wp_head', 'craftjob_custom_noindex' );