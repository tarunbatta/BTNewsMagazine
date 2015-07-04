<?php get_header(); ?>

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

<div class="row">
	<div class="col-sm-9 blog-main">
		<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					get_template_part('article', get_post_format());
					?> <hr/> <?php
				}
			}
			else {
				get_template_part('article', 'none');
			}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php pagination(); ?>
<?php get_footer(); ?>