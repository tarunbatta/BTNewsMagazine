<article class="well">
	<p>
		<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> @ <?php the_time('F jS, Y g:i a'); ?> 
	</p>
	<?php the_content(); ?>
</article>