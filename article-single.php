<article>
	<div>
		<?php if (has_post_thumbnail()) { ?>
			<div>
				<?php the_post_thumbnail('image_post'); ?>
			</div>
		<?php } ?>
		<div>
			<h3>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php get_template_part('postMeta'); ?>
			<?php echo sharing_display(); ?>
			<div style="text-align: justify;">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</article>