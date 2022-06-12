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

<?php
  global $query_string;

  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $query_args = explode("&", $query_string);
  $search_query = array(
    'paged' => $paged,
    'posts_per_page' => 10,
    'post_status' => 'publish'
  );


  foreach($query_args as $key => $string) {
      $query_split = explode("=", $string);
      $search_query[$query_split[0]] = urldecode($query_split[1]);
  } // foreach

  $the_query = new WP_Query($search_query);
?>

    <div id="body">

        <?php get_breadcrumbs(); ?>

        <div id="contents">
            <!--p class="category cat_event">イベント</p-->
            <div class="section">
                <h1>検索結果</h1>
<?php if (isset($_GET['s']) && empty($_GET['s'])): ?>
  <p>検索条件が入力されていません。<br />別のキーワードをお試しください。</p>
<?php else: ?>
  <?php if($the_query->have_posts()): ?>
      <?php while($the_query->have_posts()): $the_query->the_post(); ?>

          <div>
            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> [<?php print get_post_type_object(get_post_type())->label; ?>]</h3>
            <?php
              $content = get_the_content();
              print mb_strimwidth( strip_tags( str_replace( '　　', '', $content)), 0, 200, '...', 'UTF-8');
            ?>
          </div>

      <?php endwhile; ?>
      <?php
        if(function_exists("pagination")){
          pagination($the_query->max_num_pages);
        }
      ?>
          <br />
      <?php // wp_pagenavi(); ?>

  <?php else : ?>

          <div class="entry-content">
            <p>入力されたキーワードでは見つかりませんでした。<br />
            別のキーワードをお試しください。</p>
            <?php get_search_form(); ?>
          </div><!-- .entry-content -->

  <?php endif; ?>
<?php endif; ?>
            </div><!-- /.section -->
        </div> <!-- /#contents -->

        <?php get_sidebar(); ?>

    </div> <!-- /#body -->

<?php get_footer(); ?>
