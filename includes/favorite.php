<?php
/**
 * お気に入り求人をAjaxで取得
 */
function craftjob_get_favorites() {
	// JSから贈られたIDリストを受け取る
	$ids = isset( $_POST['ids'] ) ? array_map( 'intval', $_POST['ids'] ) : array();

	if ( empty( $ids ) ) {
		wp_send_json_error( 'IDがありません' );
	}

	// 受け取ったIDで求人を取得
	$query =new WP_Query( array(
		'post_type'    => 'recruit',
		'post__in'     => $ids,
		'posts_per_page' => -1,
		'orderby'      => 'post__in',
	) );

	// カードのHTMLを組み立てる
	ob_start();
	if ( $query->have_posts() ) :
		 while ( $query->have_posts() ) : $query->the_post();
			  get_template_part( 'template-parts/card-recruit' );
	   endwhile;
	   wp_reset_postdata();
     endif;
     $html = ob_get_clean();
	 wp_send_json_success( $html );
}

add_action( 'wp_ajax_get_favorites', 'craftjob_get_favorites' );
add_action( 'wp_ajax_nopriv_get_favorites', 'craftjob_get_favorites' );