<?php
/**
 * wordpress functions core file
 *
 * @package Torapants default
 */


/**
 * 不要な入力項目を削除
 */
/*
// 投稿
function remove_default_post_screen_metaboxes() {
    remove_meta_box( 'postexcerpt','post','normal' );       // 抜粋
    remove_meta_box( 'trackbacksdiv','post','normal' );     // トラックバック送信
    remove_meta_box( 'postcustom','post','normal' );        // カスタムフィールド
    remove_meta_box( 'postcustom','topics','normal' );        // カスタムフィールド
    remove_meta_box( 'commentstatusdiv','post','normal' );  // ディスカッション
    remove_meta_box( 'commentsdiv','post','normal' );       // コメント
    remove_meta_box( 'slugdiv','post','normal' );           // スラッグ
    remove_meta_box( 'authordiv','post','normal' );         // 作成者
    remove_meta_box( 'revisionsdiv','post','normal' );      // リビジョン
    remove_meta_box( 'formatdiv','post','normal' );         // フォーマット
    remove_meta_box( 'categorydiv','post','normal' );       // カテゴリー
    remove_meta_box( 'tagsdiv-post_tag','post','normal' );  // タグ
}
add_action('admin_menu','remove_default_post_screen_metaboxes');

// 固定ページ
function remove_default_page_screen_metaboxes() {
    remove_meta_box( 'postcustom','page','normal' );        // カスタムフィールド
    remove_meta_box( 'commentstatusdiv','page','normal' );  // ディスカッション
    remove_meta_box( 'commentsdiv','page','normal' );       // コメント
    remove_meta_box( 'slugdiv','page','normal' );           // スラッグ
    remove_meta_box( 'authordiv','page','normal' );         // 作成者
    remove_meta_box( 'revisionsdiv','page','normal' );      // リビジョン
}
add_action('admin_menu','remove_default_page_screen_metaboxes');

// その他
function remove_default_other_screen_metaboxes() {
    remove_meta_box( 'postcustom','topics','normal' );        // カスタムフィールド
    remove_meta_box( 'postcustom','news','normal' );        // カスタムフィールド
}
add_action('admin_menu','remove_default_other_screen_metaboxes');
*/




/**
 * サイドメニュー追加
 */
// add_action('admin_menu', 'custom_admin_menu');
/*
function custom_admin_menu() {
//	add_menu_page( メニューページのタイトル, メニュー名, メニューの権限（レベル数または権限名）, メニューのスラッグ , メニューページのコールバック関数 , メニュー横に表示されるアイコンファイルのURL（省略時は''）, メニューの追加位置（省略時はNULL ));

	add_menu_page( 'メニューページのタイトル', 'メニュー名', 'edit_posts', 'slug', 'admin_callback_method', '', 50);

}
function admin_callback_method() {
	require_once('xxx.php');
}
*/

/**
 * ショートコードsample
 *
 * 記述方法：[shortCode item="*"]
 */
/*
function shortCodeFunc($atts) {
	extract(
		shortcode_atts(
			array(
				'item' => '0'
			)
		,$atts)
	);
	if($item != 0){
		$ret = '';
	}else{
		$ret = '';
	}

	return $ret;
}
add_shortcode('shortCode', 'shortCodeFunc');
*/

/**
 * DBアクセスsample
 */
/*
function db_func( $tbl, $array){

    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . '';
    try{
        $dbh = new PDO( $dsn, DB_USER, DB_PASSWORD);
        $dbh->query('SET NAMES utf8');
        $dbh->beginTransaction();

        // select
        $sql = 'SELECT * FROM `' . $tbl . '`
                    WHERE
                        `field1`=\'' . $field1 . '\' AND `field1`=\'' . $field2 . '\' AND
                        `field1`=\'' . $field2 . '\'';
        $stmt = $dbh->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // insert
        $sql = 'INSERT INTO `' . $tbl . '` (
                        `field1`  ,
                        `field2`  ,
                        `field3`)
                    VALUES ( \'' . $field1 . '\', \'' . $field2 . '\', \'' . $field3 . '\')';

        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        // delete
        $sql = 'DELETE FROM `' . $tbl . '`
                WHERE `category` = '.$category.' AND `date` >= \'' . str_replace( '#', '', $value[1]) . '\'';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh->commit();

    }catch (PDOException $e){
        $dbh->rollBack();
        print('Error:'.$e->getMessage());
        die();
    }

    return;

}
*/


/**
 * 記事内URLを相対パスにする
 */
// class relative_URI {
//     function relative_URI() {
//         add_action('get_header', array(&$this, 'get_header'), 1);
//         add_action('wp_footer', array(&$this, 'wp_footer'), 99999);
//     }
//     function replace_relative_URI($content) {
//         $home_url = trailingslashit(get_home_url('/'));
//         //サブディレクトリに置いている場合は./等と変更する
//         return str_replace($home_url, '/', $content);
//     }
//     function get_header(){
//         ob_start(array(&$this, 'replace_relative_URI'));
//     }
//     function wp_footer(){
//         ob_end_flush();
//     }
// }
// new relative_URI();
