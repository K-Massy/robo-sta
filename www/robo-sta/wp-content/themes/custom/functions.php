<?php
/**
 * wordpress functions and definitions
 *
 * @package Torapants default
 */


require_once( 'func/core.php' );
require_once( 'func/enqueue-scripts.php' );
require_once( 'acf-json/functions.php' );

/**
 * 基本設定
 */
function theme_initialize(){
    /**
     * テキストエディタスタイルシート設定
     */
    // $css_files = array('editor-style.css ','style.css');
    // add_editor_style($css_files);

    // 不要なhead内タグ除去
    add_action( 'init', 'theme_head_cleanup' );

    // ログイン画面でIPを表示させる。
    add_filter('login_message', 'custom_login_message');

    // 管理者ユーザー以外
    if (!current_user_can( 'administrator')) {
        // プラグインアップデート数値削除
        // add_action('admin_menu', 'remove_counts');
        // WordPressの自動アップグレードを非表示
        add_filter('pre_site_transient_update_core', 'remove_wp_upgrade');
        // 左メニューをある程度削除
        add_action( 'admin_menu', 'remove_wp_menu' );
        // 管理バーから項目を削除
        add_action( 'admin_bar_menu', 'remove_admin_bar_item', 1000 );
    }


    // ダッシュボードのウィジェット削除
    add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');

    // 管理画面下部のバージョン番号を削除
    add_action( 'admin_menu', 'remove_footer_version' );

    // 管理画面の「Wordpressのご利用ありがとうございます。」の文言を削除
    add_filter('admin_footer_text', '__return_empty_string');

    // tiny mceでiframe入力を可能にする
    add_filter('tiny_mce_before_init', 'tiny_mce_inputtable_iframe');
}
add_action( 'after_setup_theme', 'theme_initialize' );


/**
 * Title
 */
add_theme_support( 'title-tag' );


/**
 * 検索条件が未入力時にsearch.phpにリダイレクトする
 */
function set_redirect_template(){
    if (isset($_GET['s']) && empty($_GET['s'])) {
        include(TEMPLATEPATH . '/search.php');
        exit;
    }
}
add_action('template_redirect', 'set_redirect_template');


/**
 * アイキャッチ画像処理
 */
// 有効化
add_theme_support( 'post-thumbnails' );

// 基本サイズ変更、デフォルトは150,150
// set_post_thumbnail_size( 190, 190, true );

// 追加サイズ
// add_image_size( 'eventThumb', 320, '', true );
// add_image_size( 'eventList', 150, 100, true );


/**
 * 外観->メニュー
 */
register_nav_menu('global_nav', 'グローバルナビ');
