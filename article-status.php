<article>
	<h3>
		<?php the_title(); ?>
	</h3>
	<p>
		<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | <?php the_time('F jS, Y g:i a'); ?> 
	</p>
	<div style="text-align: justify;">
		<?php the_content(); ?>
	</div>
</article>