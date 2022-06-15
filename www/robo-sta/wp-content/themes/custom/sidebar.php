<?php
/**
 * wordpress templates
 *
 * サイドバー
 * <?php get_sidebar(); ?>
 * で呼び出し
 *
 * @package Torapants default
 */

?>

<div class="l_sidebar">

  <div class="aside">
    <h2>検索</h2>
    <?php get_search_form(); ?>
  </div>

  <div class="aside">
    <h2>ARCHIVE</h2>
    <ul>
      <?php wp_get_archives('type=monthly&limit=12'); ?>
    </ul>
  </div>

  <div class="aside">
    <h2>CATEGORY</h2>
    <ul>
      <?php wp_list_categories('orderby=name&title_li=&show_count=1'); ?>
    </ul>
  </div>

  <div class="aside">
    <?php if(is_category(1)): ?>
      <h2>お知らせ</h2>
    <?php else: ?>
      <h2><?php the_title(); ?></h2>
    <?php endif; ?>
  </div>

  <div class="aside">
    <div class="banner">
      <ul>
        <li><a href="#"><img src="http://placehold.jp/200x40.png" alt=""></a></li>
        <li><a href="#"><img src="http://placehold.jp/200x40.png" alt=""></a></li>
        <li><a href="#"><img src="http://placehold.jp/200x40.png" alt=""></a></li>
      </ul>
    </div>
  </div>

</div>
