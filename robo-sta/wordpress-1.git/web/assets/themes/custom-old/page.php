<?php
/**
 * wordpress templates
 *
 * 固定ページ
 * $custom.php
 * page-$slug.php > page-$id.php > page.php
 *
 * 通常未使用
 *
 * @package Torapants default
 */

get_header();
?>

    <div id="body">

        <?php get_breadcrumbs(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div id="contents">
            <!--p class="category cat_event">イベント</p-->
            <article>
                <section class="section info">
                <?php
                    $slug = '';
                    if(is_page(4)):
                        $slug = "info";
                    elseif(is_page(6)):
                        $slug = "director";
                    elseif(is_page(8)):
                        $slug = "diagnosis";
                    elseif(is_page(11)):
                        $slug = "schedule";
                    elseif(is_page(13)):
                        $slug = "contact";
                    endif;
                ?>
                <?php if($slug): ?>
                    <h1><img src="<?php bloginfo('template_directory'); ?>/img/h1_<?php echo $slug; ?>.png" alt="<?php the_title(); ?>"></h1>
                <?php else: ?>
                    <h1><?php the_title(); ?></h1>
                <?php endif; ?>
                <?php the_content(); ?>

                </section>
            </article>
        </div> <!-- /#contents -->

<?php endwhile; endif; ?>

        <?php get_sidebar(); ?>

    </div> <!-- /#body -->

<?php get_footer(); ?>
