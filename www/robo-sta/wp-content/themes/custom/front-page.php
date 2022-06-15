<?php
/**
 * wordpress templates
 *
 * トップページ
 * front-page.php
 *
 * 案件によって固定ページかfront-page.phpを使うか決める
 *
 * @package Torapants default
 */

get_header();
?>

<div role="main" class="l_main">
  <div class="l_contents">

    <div class="seciton">
      <h2 class="h2">投稿</h2>
      <?php
        $args = array(
          'numberposts' => 4, // 無制限
          'offset'      => 0,
          'orderby'     => 'post_date',
          'order'       => 'DESC',
          'post_type'   => 'post',
          'post_parent' => 0, //最上位のみ
          'post_status' => 'publish'
        );
        $array = get_posts( $args );
        global $post;
      ?>
      <?php if($array) : ?>
        <dl>
          <?php
            foreach( $array as $key => $post) :
              setup_postdata( $post );
              $category = get_the_category( $post->ID );
              $link = get_link_url( $post->ID, $post->post_title, '');
          ?>
            <dt><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日') ?></time></dt>
            <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
          <?php endforeach; wp_reset_postdata(); ?>
        </dl>
      <?php endif; ?>
    </div> <!-- /.section -->

  </div><!-- /.l_contents -->
</div><!-- /.l_main -->

<?php get_footer(); ?>
