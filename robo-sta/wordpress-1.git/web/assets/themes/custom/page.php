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
				<?php the_content(); ?>
			</div>
		</div>
	</article>
	<?php endwhile; endif; ?>
	<?php //get_sidebar(); ?>
</main>
<?php get_footer(); ?>
