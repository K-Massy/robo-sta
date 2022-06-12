<?php
/**
 * wordpress templates
 *
 * ヘッダー
 *
 * @package Torapants default
 */
?><!DOCTYPE html>
<?php if(is_home() || is_front_page()): ?>
<html lang="ja" itemscope="itemscope" itemtype="http://schema.org/WebSite">
<?php else: ?>
<html lang="ja" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php endif; ?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">

<?php get_template_part( 'parts/header', 'meta' ); ?>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">

<?php wp_head(); ?>

</head>
<?php if ( is_page('slug')): ?>
<body <?php body_class('slug'); ?>>
<?php else: ?>
<body <?php body_class(); ?>>
<?php endif; ?>
<noscript>
    <div>このページは JavaScript を使用しています。ご使用中のブラウザは JavaScript が無効になっているか、JavaScript に対応していません。<br />
    JavaScript を有効にするか、JavaScript が使用可能なブラウザでアクセスして下さい。</div>
</noscript>
<?php if(is_home() || is_front_page()): ?>
<!-- top page only -->
<?php endif; ?>
<div class="l_wrapper">
  <div class="l_header" role="banner">
<?php if(is_home() || is_front_page()): ?>
    <h1 class="site_title"><a href="<?php echo esc_url(get_home_url()); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
<?php else: ?>
    <p class="site_title"><a href="<?php echo esc_url(get_home_url()); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
<?php endif; ?>
    <div class="gnav" role="navigation" aria-label="メインメニュー">
		<a href="/register/"><span>会員登録</span></a>
		<a href="/login/"><span>ログイン</span></a>
		<a href="/profile/"><span>プロフィール</span></a>
		<a href="/post/"><span>作品投稿</span></a>
		<a href="/edit/"><span>作品投稿編集</span></a>
		<a href="/dashbord/"><span>投稿管理</span></a>
<!--      <ul class="gnav_list">-->
<!--        <li class="gnav_item gnav_item_3"><a href="#"><span>テスト3</span></a>-->
<!--          <ul class="gnav_sub_list">-->
<!--            <li class="gnav_sub_item"><a href="#"><span>サブ・テスト1</span></a></li>-->
<!--            <li class="gnav_sub_item"><a href="#"><span>サブ・テスト2</span></a></li>-->
<!--            <li class="gnav_sub_item"><a href="#"><span>サブ・テスト3</span></a></li>-->
<!--            <li class="gnav_sub_item"><a href="#"><span>サブ・テスト4</span></a></li>-->
<!--          </ul>-->
<!--        </li>-->
<!--        <li class="gnav_item gnav_item_4"><a href="#"><span>テスト4</span></a>-->
<!--          <ul class="gnav_sub_list">-->
<!--            <li class="gnav_sub_item"><a href="#"><span>サブ・テスト1</span></a></li>-->
<!--            <li class="gnav_sub_item"><a href="#"><span>サブ・テスト2</span></a></li>-->
<!--            <li class="gnav_sub_item"><a href="#"><span>サブ・テスト3</span></a></li>-->
<!--            <li class="gnav_sub_item"><a href="#"><span>サブ・テスト4</span></a></li>-->
<!--          </ul>-->
<!--        </li>-->
<!--      </ul>-->
    </div>
    <div class="l_header_search">
      <form>
        <div class="inline_form">
          <div class="inline_form_text">
            <input type="text">
          </div>
          <div class="inline_form_btn">
            <input type="submit" value="検索">
          </div>
        </div>
      </form>
    </div>
  </div>
