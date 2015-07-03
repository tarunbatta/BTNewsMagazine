<em>
	<div class="row">
		<div class="col-sm-6 ">
			<?php getPostCategories() ?> 
			<br/>
			<?php getPostTags(); ?>
		</div>
		<div class="col-sm-6 text-right">
			Article By: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
			<br/>
			Date: <?php the_time('F jS, Y g:i a'); ?>
		</div>
	</div>
</em>
<br/>