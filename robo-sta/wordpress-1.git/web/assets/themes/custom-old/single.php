<?php
/**
 * wordpress templates
 *
 * 投稿個別ページ
 * single-$posttype.php ┐
 *                      ├ single.php
 * single-post.php  ──┘
 *
 * @package Torapants default
 */

get_header();
?>

    <div id="body">

        <?php get_breadcrumbs(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $metas = get_meta_values($post->ID); ?>
        <div id="contents">
            <article>
                <section class="section">
                <div class="section">
                    <h1><?php the_title(); ?></h1>
                        <p class="date"><?php the_time('Y年n月j日'); ?></p>
                    <?php the_content(); ?>
                </div><!-- /.section -->

                <ul class="navigation pager short">
                    <li class="prev"><a href="javascript:history.back()">一覧へ戻る</a></li>
                </ul>
                </section>
            </article>
        </div> <!-- /#contents -->

<?php endwhile; endif; ?>

        <?php get_sidebar(); ?>

    </div> <!-- /#body -->

<?php get_footer(); ?>
