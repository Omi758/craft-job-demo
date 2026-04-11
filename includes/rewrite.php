<?php
/**
 * カスタムクエリ変数を登録
 */
function craftjob_custom_query_vars( $vars ) {
	$vars[] ='craftjob_page';
	$vars[] ='column_category';
	return $vars;
}
add_filter( 'query_vars', 'craftjob_custom_query_vars' );

/**
 * リライトルールを追加(/recruit/popular/と/recruit/favorite/)
 */
function craftjob_custom_rewrite_rules() {
	add_rewrite_rule(
		'recruit/popular/?$',
		'index.php?post_type=recruit&craftjob_page=popular',
		'top'
	);
	add_rewrite_rule(
		'recruit/favorite/?$',
		'index.php?post_type=recruit&craftjob_page=favorite',
		'top'
	);
}
add_action( 'init', 'craftjob_custom_rewrite_rules' );

/**
 * /column/記事名/のリライトルールを追加
*/
function craftjob_column_rewrite_rules(){
  // カテゴリー別（ページネーションあり）
  add_rewrite_rule(
    'column/category/([^/]+)/page/([0-9]+)/?$',
    'index.php?column_category=$matches[1]&paged=$matches[2]',
    'top'
  );
  
  // カテゴリ―別（１ページ目）
  add_rewrite_rule(
    'column/category/([^/]+)/?$',
    'index.php?column_category=$matches[1]',
    'top'
  );
  
    // コラム個別記事
    add_rewrite_rule(
      'column/([^/]+)/?$',
      'index.php?name=$matches[1]',
      'top'
    );
  }
  add_action( 'init', 'craftjob_column_rewrite_rules' );

/**
 * 通常投稿(column)のパーマリンクに/column/プレフィクスを追加
 * */
function craftjob_column_permalink( $permalink, $post, $leavename = false ) {
	if ( 'post' === $post->post_type ) {
		$slug = $leavename ? '%postname%' : $post->post_name;
		$permalink = home_url( '/column/' . $slug . '/' );
	}
	return $permalink;
}
add_filter( 'post_link', 'craftjob_column_permalink', 10, 3 );

/**
 * /recruit/記事ID/のリライトルールを追加
*/
function craftjob_recruit_permalink( $permalink, $post ) {
	if ( 'recruit' === $post->post_type ) {
		$permalink = home_url( '/recruit/' . $post->ID . '/');
	}
	return $permalink;
}
add_filter('post_type_link', 'craftjob_recruit_permalink', 10,2);

/**
 * /recruit/数字/のリライトルールを追加（記事IDを直接指定）
*/
function craftjob_recruit_id_rewrite_rules(){
	add_rewrite_rule(
		'recruit/([0-9]+)/?$',
		'index.php?post_type=recruit&p=$matches[1]',
		'top'
	);
}
add_action( 'init', 'craftjob_recruit_id_rewrite_rules' );

/**
 * コラム一覧_カード表示件数：9件/1P
 * タクソノミー（taxonomy.php）_カード表示件数12件/1P
 * カード表示件数12件/1P_archive-recruit.php
 * タクソノミー条件（tax_query）の組み立て_archive-recruit.php
 * 年収条件（meta_query）の組み立て_archive-recruit.php
 */
function craftjob_column_category_template( $template ) {
	if ( get_query_var( 'column_category' ) ) {
		$new_template = locate_template( 'home.php' );
		if ( $new_template ) {
			return $new_template;
		}
	}
	return $template;
}
add_filter( 'template_include', 'craftjob_column_category_template' );