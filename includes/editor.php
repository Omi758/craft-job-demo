<?php
/**
 * エディタスタイルの読み込み
 */
function craftjob_editor_styles() {
	add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', 'craftjob_editor_styles' );

/**
 * コラム（投稿）専用エディタスタイルの読み込み
 */
function craftjob_column_editor_style( $editor_settings, $block_editor_context ) {
	if ( isset( $block_editor_context->post ) && $block_editor_context->post->post_type === 'post' ) {
		$css = file_get_contents( get_theme_file_path( 'editor-style.css' ) );
		$css = str_replace(
			'url("img/',
			'url("' . get_theme_file_uri( 'img/' ),
			$css
		);
		$editor_settings['styles'][] = array(
			'css' => $css,
		);
	}
	return $editor_settings;
}
add_filter( 'block_editor_settings_all', 'craftjob_column_editor_style', 10, 2 );

/**
* ブロックエディタ_カスタムブロックスタイル（もくじ）
*/
function craftjob_register_block_styles() {
 register_block_style(
   'snow-monkey-blocks/box', // ブロック名
   array(
     'name' => 'toc',
     'label' => 'もくじ',
   )
 );
}
add_action( 'init', 'craftjob_register_block_styles' );

/** ブロックエディタ：使用可能ブロックの制限 */
function craftjob_allowed_blocks( $allowed_blocks, $editor_context ) {
	if ( ! empty( $editor_context->post ) && $editor_context->post->post_type === 'post' ) {
			return array(
					'core/paragraph',
					'core/heading',
					'core/image',
					'core/list',
					'core/list-item',
					'core/table',
					'core/buttons',
					'core/button',
					'core/quote',
					'core/embed',
					'core/details',
					'snow-monkey-blocks/balloon',
					'snow-monkey-blocks/box',
			);
	}
	return $allowed_blocks;
}
add_filter( 'allowed_block_types_all', 'craftjob_allowed_blocks', 10, 2 );

/**
 * ACF_Wysiwyg_カスタムツールバーの設定（不要なメニューを表示しないため）
 * functions.phpでツールバーを定義後→ACF管理画面で各フィールドに「CraftJob用」を割り当てる
 * （該当のWysiwygフィールド設定の中に「ツールバー」欄があるので、そこで「CraftJob用」を選択）
 */
function craftjob_customize_acf_wysiwyg_toolbar( $toolbars ) {
	// 「CraftJob用」という新しいツールバーを追加
	$toolbars['CraftJob用'] = array();
	$toolbars['CraftJob用'][1] = array(
		'bold',
		'bullist',
		'numlist',
		'link',
		'unlink',
		'undo',
		'redo',
	);
	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars', 'craftjob_customize_acf_wysiwyg_toolbar' );