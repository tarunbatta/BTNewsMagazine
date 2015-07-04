<div>
	<h3>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
	<?php get_template_part('postMeta'); ?>
	<div style="text-align: justify;">
		<?php echo get_the_excerpt(); ?>
	</div>
</div>