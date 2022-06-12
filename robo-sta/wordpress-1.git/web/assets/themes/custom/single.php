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
<main class="main" role="main">
	<?php get_breadcrumbs(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="page">
		<div class="page-header">
			<div class="container">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="page-contents">
			<div class="container">
				<p class="date"><?php the_time('Y年n月j日'); ?></p>
				<?php the_content(); ?>
				<ul class="navigation pager short">
                    <li class="prev"><a href="javascript:history.back()">一覧へ戻る</a></li>
                </ul>
			</div>
		</div>
	</article>
	<?php endwhile; endif; ?>
	<?php //get_sidebar(); ?>
</main>
<?php get_footer(); ?>
