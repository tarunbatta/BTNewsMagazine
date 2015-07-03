<div>
	<h3>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
	<?php get_template_part('postMeta'); ?>
	<p>
		<?php echo get_the_excerpt(); ?>
	</p>
</div>