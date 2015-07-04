<article>
	<h3>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
	<?php get_template_part('postMeta'); ?>
	<?php the_content(); ?>
</article>