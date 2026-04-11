<?php
/**
 *  * Craft Jobのテーマ用の関数
 * テーマのスタイルとスクリプトを読み込む
 */
/**
 * Google Fonts用のpreconnect（早期接続で読み込み最適化）
 */
function craftjob_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.googleapis.com',
			'crossorigin' => false,
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => true,
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'craftjob_resource_hints', 10, 2 );

function craftjob_enqueue_assets() {
	$theme_uri = get_template_directory_uri();
	$theme_path = get_template_directory();

	// Google Fonts（外部URLのためバージョンは固定）
	wp_enqueue_style(
		'craftjob-google-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap',
		array(),
		null
	);

	// Splide CSS
	wp_enqueue_style(
		'splide-css',
		$theme_uri . '/css/vendor/splide-core.min.css',
		array(),
		null
	);

	// メインスタイルシート（キャッシュ対策のため filemtime でバージョン指定）
	wp_enqueue_style(
		'craftjob-style',
		$theme_uri . '/css/style.css',
		array( 'craftjob-google-fonts', 'splide-css' ),
		filemtime( $theme_path . '/css/style.css' )
	);

// Splide JS
wp_enqueue_script(
	'splide-js',
	$theme_uri . '/js/vendor/splide.min.js',
	array(),
	null,
	true
);


	// メインスクリプト（type="module" を付与）
	wp_enqueue_script(
		'craftjob-main',
		$theme_uri . '/js/main.js',
		array( 'splide-js' ),
		filemtime( $theme_path . '/js/main.js' ),
		true
	);

	// お気に入り用のスクリプト
	wp_localize_script( 'craftjob-main', 'craftjobAjax', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'craftjob_enqueue_assets' );

// メインスクリプトにtype="module"を追加_ESModule専用
function craftjob_add_module_to_script( $tag, $handle, $src ) {
	if ( 'craftjob-main' === $handle ) {
		$tag = str_replace( '<script ', '<script type="module" ', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'craftjob_add_module_to_script', 10, 3 );