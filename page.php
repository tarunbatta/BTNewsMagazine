<?php get_header(); ?>

<?php 
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			get_template_part('article', 'page');
		}
	}
	else {
		get_template_part('article', 'none');
	}
?>

<?php get_footer(); ?>