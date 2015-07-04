<article>
	<h3>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
	<?php get_template_part('postMeta'); ?>
	<div style="text-align: justify;">
		<?php the_content(); ?>
	</div>
</article>