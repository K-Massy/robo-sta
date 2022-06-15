<?php
/**
 * wordpress templates
 *
 * カテゴリーアーカイブ
 * category-$slug.php > category-$id.php > category.php > archive.php
 *
 * @package Torapants default
 */

get_header();

$itemNum = 10;
$categoryID = 1;
$postType = 'post';
$page = ( $paged != 0) ? ( $paged-1) * $itemNum : 0;
$pages = ceil(count(get_posts( 'post_type='.$postType.'&category='.$categoryID.'&numberposts=-1' )) / $itemNum);
$args = array(
    'numberposts' => $itemNum,
    'offset'      => $page,
    'category'    => $categoryID,
    'orderby'     => 'post_date',
    'order'       => 'DESC',
    'post_type'   => $postType,
    'post_parent' => 0, //最上位のみ
    'post_status' => 'publish'
);
$array= get_posts( $args );
?>

<div role="main" class="l_main">
  <div class="l_contents">

      <div class="section">

        <ul class="topic_path">
          <li><a href="/index/">Home</a></li>
        </ul>

        <h1>H1</h1>

<?php if( $array) : ?>
                <dl>
  <?php foreach( $array as $key => $val) : ?>
      <?php $link = get_link_url( $val->ID, $val->post_title, ''); ?>

                    <dt><span class="time"><?php print date('Y/m/d',strtotime($val->post_date)); ?></span></dt>
                    <dd><?php print $link[1]; ?></dd>

   <?php endforeach; ?>

                </dl>

                <?php pagination($pages); ?>

<?php else : ?>

                <p>記事はありません</p>

<?php endif; ?>

      </div> <!-- /.section -->

    </div> <!-- /#contents -->

  </div> <!-- /#body -->

<?php get_footer(); ?>
