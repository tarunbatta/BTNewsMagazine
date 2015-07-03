<?php get_header(); ?>

<div class="row">
	<div class="col-sm-9 blog-main">
		<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					get_template_part('article', 'single');
				}
			}
			else {
				get_template_part('noData');
			}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>