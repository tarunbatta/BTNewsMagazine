<?php

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		get_template_part('article', 'page');
	}
}
else {
	get_template_part('noData');
}

get_footer();

?>