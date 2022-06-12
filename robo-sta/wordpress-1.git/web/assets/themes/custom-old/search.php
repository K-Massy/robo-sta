<?php
/**
 * wordpress templates
 *
 * 検索結果ページ
 *
 * @package Torapants default
 */

get_header();
?>
<style type="text/css">
<!--
.wp-pagenavi {
  clear: both;
  text-align: center;
}

.wp-pagenavi a, .wp-pagenavi span {
  text-decoration: none;
  border: 1px solid #BFBFBF;
  padding: 3px 5px;
  margin: 2px;
}

.wp-pagenavi a:hover, .wp-pagenavi span.current {
  border-color: #000;
}

.wp-pagenavi span.current {
  font-weight: bold;
}
-->
</style>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = $query_split[1];
} // foreach

$search = new WP_Query($search_query);
?>

    <div id="body">
        
        <?php get_breadcrumbs(); ?>

        <div id="contents">
            <!--p class="category cat_event">イベント</p-->
            <div class="section">
                <h1>検索結果</h1>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <div>
          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> [<?php print get_post_type_object(get_post_type())->label; ?>]</h3>
          <?php
          $content = get_the_content();
          print mb_strimwidth( strip_tags( str_replace( '　　', '', $content)), 0, 200, '...', 'UTF-8');
          ?>

        </div>

    <?php endwhile; ?>
        <br />
    <?php // wp_pagenavi(); ?>

<?php else : ?>

        <div class="entry-content">
          <p>入力されたキーワードでは見つかりませんでした。<br />
          別のキーワードをお試しください。</p>
          <?php get_search_form(); ?>
        </div><!-- .entry-content -->

<?php endif; ?>

            </div><!-- /.section -->
        </div> <!-- /#contents -->

        <?php get_sidebar(); ?>

    </div> <!-- /#body -->
  
<?php get_footer(); ?>
