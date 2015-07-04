<article>
	<?php 
	if (has_children() OR $post->post_parent > 0) {
	?>
	<nav class='site-nav children-links clearfix'>
		<ul class="nav nav-pills">
			<li class="disabled"><a href="<?php get_the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></li>
			<?php
				$args = array(
					'child_of' => get_top_ancestor_id(),
					'title_li' => ''
				);
			?>

			<?php wp_list_pages($args); ?>
		</ul>			
	</nav>
	<?php
	}
	?>

	<h1><?php the_title(); ?></h1>
	<div style="text-align: justify;">
		<?php the_content(); ?>
	</div>
</article>