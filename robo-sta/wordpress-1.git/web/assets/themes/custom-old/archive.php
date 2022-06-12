<?php
/**
 * wordpress templates
 *
 * アーカイブページ
 * category-$slug.php > category-$id.php > category.php > archive.php
 *
 * 通常未使用
 *
 * @package Torapants default
 */

get_header();
?>

    <div id="body">

        <?php get_breadcrumbs(); ?>

        <div id="contents">
            <article>
                <section class="section">
            <div class="section">
                <h1><?php single_cat_title(); ?></h1>

<?php if (have_posts()) : ?>

    <dl>

    <?php while (have_posts()) : the_post(); ?>

        <dt><?php the_time('Y年n月j日') ?></dt>
        <dd><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></dd>

    <?php endwhile; ?>

    </dl>

    <?php if (function_exists("pagination")) pagination($wp_query->max_num_pages); ?>
<?php else: ?>
    <p>記事はありません。</p>
<?php endif; ?>

            </div><!-- /.section -->
                </section>
            </article>
        </div> <!-- /#contents -->


        <?php get_sidebar(); ?>

    </div> <!-- /#body -->

<?php get_footer(); ?>
