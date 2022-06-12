<?php
/**
 * wordpress templates
 *
 * ヘッダー
 *
 * @package Torapants default
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( 'ページ %s', max( $paged, $page ));

?></title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/import.css" media="screen,tv,print" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/index.css" media="screen,tv,print" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox.css" media="screen,tv,print" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/print.css" media="print">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.flatheights.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cssswitch.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.page-scroller-308.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>

<?php wp_head(); ?>

</head>
<?php if ( is_home() || is_front_page() ): ?>
<body class="index">
<?php else: ?>
<body>
<?php endif; ?>
<noscript>
    <div>このページは JavaScript を使用しています。ご使用中のブラウザは JavaScript が無効になっているか、JavaScript に対応していません。<br />
    JavaScript を有効にするか、JavaScript が使用可能なブラウザでアクセスして下さい。</div>
</noscript>
<div id="wrapper">
    <div id="header">
        <p class="title">
            <a href="index.html">サイト名</a>
        </p>
        <p class="description">サイトの説明</p>
        <dl class="fontsize">
            <dt>文字の大きさ</dt>
            <dd>
                <ul>
                    <li>
                        <a href="#" onclick="fsc('larger');return false;" onkeypress="fsc('larger');return false;" >大</a>
                    </li>
                    <li>
                        <a href="#" onclick="fsc('default');return false;" onkeypress="fsc('default');return false;" >標準</a>
                    </li>
                    <li>
                        <a href="#" onclick="fsc('smaller');return false;" onkeypress="fsc('smaller');return false;" >小</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <ul class="sub_navigation">
            <li>サブナビ1</li>
            <li>サブナビ2</li>
            <li>サブナビ3</li>
            <li>サブナビ4</li>
        </ul>
        <ul class="navigation">
            <li>ナビ1</li>
            <li>ナビ2</li>
            <li>ナビ3</li>
            <li>ナビ4</li>
            <li>ナビ5</li>
            <li>ナビ6</li>
        </ul>
    </div>


