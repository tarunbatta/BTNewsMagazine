<article>
	<?php if (has_post_thumbnail()) { ?>
		<div class="row">
			<div class="col-sm-4">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('image_thumbnail'); ?></a>
			</div>
			<div class="col-sm-8">
				<h4>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h4>
				<?php get_template_part('postMeta'); ?>
				<div style="text-align: justify;">
					<?php echo get_the_excerpt(); ?>
				</div>
				<?php echo sharing_display(); ?>
			</div>
		</div>
	<?php } else { 
		get_template_part('postNoImage');
	} ?>
</article>