<article>
	<?php 
	if (has_post_thumbnail()) {
	?>
		<div>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('image_thumbnail'); ?></a>
		</div>
	<?php
	}
	?>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p><?php the_time('F jS, Y g:i a'); ?> | By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in <?php getPostCategories() ?></p>
	<p>
		<?php echo get_the_excerpt(); ?>
	</p>
</article>