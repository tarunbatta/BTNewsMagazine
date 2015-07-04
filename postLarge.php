<?php if (has_post_thumbnail()) { ?>
	<div>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('image_post'); ?></a>
		<div>
			<h3>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
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