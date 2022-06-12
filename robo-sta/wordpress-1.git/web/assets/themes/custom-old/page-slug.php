<?php
/**
 * wordpress templates
 *
 * 固定ページ
 * $custom.php
 * page-$slug.php > page-$id.php > page.php
 *
 * @package Torapants default
 */

get_header();
?>

  <div id="body">

    <div id="contents">

      <ul class="topic_path">
        <li><a href="<a href=<?php bloginfo('url'); ?>">ホーム</a></li>
        <li class="selected">title</li>
      </ul>

      <div class="section">
        <h1>H1</h1>

<?php
$args = array(
    'numberposts' => -1, // 無制限
    'offset'      => 0,
    'orderby'     => 'menu_order',
    'order'       => 'ASC',
    'post_type'   => '***',
    'post_parent' => 0, //最上位のみ
    'post_status' => 'publish'
);
$array= get_posts( $args );
?>
<?php if( $array) : ?>

  <?php foreach( $array as $key => $val) : ?>

        <div class="section">
          <h2 id="<?php print $val->ID; ?>"><?php print $val->post_title; ?></h2>
          <dl class="">
    <?php
    $argsChild = array(
        'numberposts' => -1,
        'offset'      => 0,
        'orderby'     => 'menu_order',
        'order'       => 'ASC',
        'post_type'   => '***',
        'post_parent' => $v->ID,
        'post_status' => 'publish'
    );
    $arrayChild= get_posts( $argsChild );
    ?>
    <?php if( $arrayChild) : ?>
    
        <?php foreach( $arrayChild as $k => $v) : ?>

            <dt><?php print $v->post_title; ?></dt>
            <dd><?php print $v->post_content; ?></dd>

        <?php endforeach; ?>

     <?php endif; ?>

          </dl>
        </div>
   <?php endforeach; ?>

<?php endif; ?>
     
      </div> <!-- /.section-->

    </div> <!-- /#contents -->

  </div> <!-- /#body -->

<?php get_footer(); ?>
