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
    <div id="body">
        <div id="contents">
            <h2>top page</h2>
<div class="seciton">
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
$array= get_posts( $args );
global $post;
?>
<?php if( $array) : ?>
<dl>
    <?php
    foreach( $array as $key => $post) :
    setup_postdata( $post );
        $cat = get_the_category( $post->ID );
        $link = get_link_url( $post->ID, $post->post_title, '');
    ?>
        <dt><?php print date('Y年n月j日',strtotime( $post->post_date)); ?></dt>
        <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
   <?php endforeach; wp_reset_postdata(); ?>
</dl>
<?php endif; ?>
</div>

        </div>

    </div>


<?php get_footer(); ?>
