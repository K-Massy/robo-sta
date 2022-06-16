<?php
/**
 * wordpress templates
 *
 * アーカイブページ
 * category-$slug.php > category-$id.php > category.php > archive.php
 *
 *
 *
 * @package Torapants default
 */

get_header();
?>
<main class="main" role="main">
	<?php get_breadcrumbs(); ?>
	<article class="page">
		<div class="page-header">
			<div class="container">
				<h1><?php single_cat_title(); ?></h1>
			</div>
		</div>
		<div class="page-contents">
			<div class="container">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<dl>
              <dt><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日') ?></time></dt>
              <dd><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></dd>
						</dl>
					<?php endwhile; ?>
					<?php if (function_exists("pagination")): ?>
						<?php pagination($wp_query->max_num_pages); ?>
				<?php endif; ?>
				<?php else: ?>
					<p>記事はありません。</p>
				<?php endif; ?>
			</div>
		</div>
	</article>
  <?php //get_sidebar(); ?>
</main>
<?php get_footer(); ?>