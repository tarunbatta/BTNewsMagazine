<?php get_header(); ?>

<div class="row">
	<div class="col-sm-9 blog-main">
		<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					get_template_part('article', get_post_format());
					?> <hr/> <?php
				}
			}
			else {
				get_template_part('article', 'none');
			}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php pagination(); ?>
<?php get_footer(); ?>