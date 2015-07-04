<?php get_header(); ?>

<div class="row">
	<div class="col-sm-9 blog-main">
		<?php if (have_posts()) { ?> 
			<h2>Search results for: <?php the_search_query(); ?></h2>
			<br/>
			<?php while (have_posts()) {
					the_post();
					get_template_part('article');
					?> <hr/> <?php
				}
			}
			else {
				get_template_part('article', 'none');
			} ?>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>