<?php
/**
 * wordpress functions core file
 *
 * @package Torapants default
 */

// テンプレート内関数群
require_once( 'template.php' );

// その他汎用関数群
require_once( 'common.php' );

// その他サンプル集
// require_once( 'sample.php' );

/**
 * 不要なhead内タグ除去
 */
function theme_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
}

/**
 * ログイン画面でIPを表示させる。
 */
function custom_login_message() {
	$ipAddress = $_SERVER["REMOTE_ADDR"];
	$message   = "<p class=\"message\"><strong>Your IP： {$ipAddress}</strong></p>";
	return $message;
}

/**
 * プラグインアップデート数値削除
 */
function remove_counts(){
    global $menu,$submenu;
    $menu[65][0] = 'プラグイン';
    $submenu['index.php'][10][0] = 'Updates';
}


/**
 * WordPressの自動アップグレードを非表示
 */
function remove_wp_upgrade($a){
	return null;
}

/**
 * WordPressの左メニューをある程度削除
 */
function remove_wp_menu(){
	//メインメニュー
	remove_menu_page('edit-comments.php');// コメント
	remove_menu_page('tools.php');// ツール
	remove_menu_page('profile.php');// プロフィール

	// サブメニュー
	// remove_submenu_page('themes.php','theme-editor.php');
}

/**
 * 管理バーから項目を削除する
 */
function remove_admin_bar_item( $wp_admin_bar ) {
	// 左側
	$wp_admin_bar->remove_node('wp-logo');// WPロゴ
	$wp_admin_bar->remove_node('comments');// コメント

	// 右側
	// $wp_admin_bar->remove_menu( 'my-account' );// マイアカウント
	$wp_admin_bar->remove_menu( 'user-info' );// マイアカウント -> プロフィール
	$wp_admin_bar->remove_menu( 'edit-profile' );// マイアカウント -> プロフィール編集

	// ログアウトを追加
	// @todo スマホサイズだと消えてしまうので要検証
	// $wp_admin_bar->add_menu( array(
	// 	'id'    => 'mylogout',
	// 	'title' => __( 'Log Out' ),
	// 	'href'  => wp_logout_url(),
	// 	'meta'   => array(
	// 		// ab-top-secondary = 右側表示。何も指定しない場合は左側
	// 		'class' => 'ab-top-secondary',
	// 	),
	// ) );


}


/**
 * ダッシュボードのウィジェット削除
 */
function example_remove_dashboard_widgets() {
    global $wp_meta_boxes;

    remove_action( 'welcome_panel', 'wp_welcome_panel' );// ようこそ
//    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
}

// 管理画面下部のバージョン番号を削除
function remove_footer_version() {
	remove_filter( 'update_footer', 'core_update_footer' );
}

/**
 * tiny mceでiframe入力を可能にする
 */

function tiny_mce_inputtable_iframe($a){
	$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
	return $a;
}


/**
 * 投稿時にASCII制御文字を削除（XML feedの時にエラーとなるため）
 */
function remove_ascii( $data ) {
    $ascii = '/[\x08]/';
    $data['post_content'] = preg_replace($ascii, '', $data['post_content']);
    return $data;
}
add_filter( 'wp_insert_post_data' , 'remove_ascii' , 10, 1);
