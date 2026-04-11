<?php
/**
 * Contact Form 7の整形機能を無効化
 */
add_filter( 'wpcf7_autop_or_not', 'my_wpcf7_autop' );
	function my_wpcf7_autop() {
		return false;
	}
  
  /**
 * Contact Form 7のふりがな欄にひらがなバリデーションを追加
 * ひらがな・長音符（ー）・スペースのみ許可
 */
add_filter( 'wpcf7_validate_text*', 'craftjob_validate_kana', 20, 2 );
function craftjob_validate_kana( $result, $tag ) {
    if ( 'your-kana' === $tag->name ) {
        $value = isset( $_POST['your-kana'] ) ? trim( $_POST['your-kana'] ) : '';
        if ( ! empty( $value ) && ! preg_match( '/^[ぁ-んー\s]+$/u', $value ) ) {
            $result->invalidate( $tag, 'ひらがなで入力してください。' );
        }
    }
    return $result;
}