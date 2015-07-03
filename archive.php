<?php

get_header();

if (have_posts()) {
?>
	<h2><?php 
	if (is_category()) {
		single_cat_title();
	}
	else if (is_tag()) {
		single_tag_title();
	}
	else if (is_author()) {
		the_post();
		echo 'Articles By: ' . get_the_author();
		rewind_posts();
	}
	else if (is_day()) {
		echo 'Articles on Day: ' . get_the_date();
	}
	else if (is_month()) {
		echo 'Articles in Month: ' . get_the_date('F Y');
	}
	else if (is_year()) {
		echo 'Articles in Year: ' . get_the_date('Y');
	}
	else {
		echo 'Archives:';
	}
	?></h2>
<?php
	while (have_posts()) {
		the_post();
		get_template_part('article', get_post_format());
	}
}
else {
	echo '<p>No content found.</p>';
}

get_footer();

?>