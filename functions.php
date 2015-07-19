<?php 

// Theme Setup
function themeSetup() {
	// Registering Navigation Menus
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'btnewsmag')
	));
	
	// Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('image_thumbnail', 240, 180, true);
	add_image_size('image_post', 840, 630, array('left', 'top'));

	// Add post format support
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
}
add_action('after_setup_theme', 'themeSetup');

function GetCategories() {
	$categories = get_categories(array(
		'type' => 'post',
		'child_of' => 0,
		'parent' => '',
		'orderby' => 'name',
		'order' => 'ASC',
		'hide_empty'=> 1,
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'number' => '',
		'taxonomy' => 'category',
		'pad_counts' => false 
	));

	return $categories;
}

function GetPageTitle() {
	$result = "";

	if (is_single()) {
		$result = the_title();
	}
	else {
		$result = bloginfo('name');
	}

	return $result;
}

function GetPageDescription() {
	$result = "";

	if (is_single()) {
		$result = the_title();
	}
	else {
		$result = bloginfo('description');
	}

	return $result;
}

function GetPageKeywords() {
	global $post;

	$categories = GetCategories();
	$tags = wp_get_post_tags( $post->ID );
	$seperator = ", ";
	$result = get_bloginfo('name') . $seperator;

	if ($categories) {
		foreach ($categories as $category) {
			$result .= $category->cat_name . $seperator;
		}
	}

	if ($tags) {
		foreach ($tags as $tag) {
			$result .= $tag->name . $seperator;
		}
	}

	echo trim($result, $seperator);
}

function GetDomain() {
	echo $_SERVER['SERVER_NAME'];
}

function GetCurrentPageUrl() {
	global $wp;
	$current_url = home_url( $wp->request );
	echo $current_url;
}

function GetIconUrl() {
	echo esc_url( get_template_directory_uri() ) . "/favicon.ico";
}

function GetImageUrl() {
	if (is_single()) {
		global $post;
		echo wp_get_attachment_url(get_post_thumbnail_id($post->ID));
	}
	else {
		echo esc_url( get_template_directory_uri() ) . "/logo.png";
	}
}

function GetFacebookAppId() {
	return "";
}

function GetFacebookUrl() {
	return "http://www.facebook.com/" . get_bloginfo('name') . "/";
}

function GetGooglePlusUrl() {
	return "https://plus.google.com/+" . get_bloginfo('name') . "/";
}

function GetAuthorName() {
	global $post;
	$data = $post;
	$user = get_user_by( 'id', $data->post_author);

	return $user->first_name . " " . $user->last_name;
}

function GetArticleMetaTags() {
	$result = "";
	
	global $post;
	
	if (is_single()) {
		$result .= '<meta name="author" content="' . GetAuthorName() .'" />
		';
		$result .= '<meta name="article:publisher" content="' . GetFacebookUrl() .'" />
		';
		$result .= '<meta name="article:published_time" content="' . date('c') .'" />
		';

		$categories = get_the_category(); 
		if ($categories) {
			foreach ($categories as $category) {
				$result .= '<meta name="article:section" content="' . $category->cat_name  .'" />
		';
			}
		}

		$tags = wp_get_post_tags( $post->ID );
		if ($tags) {
			foreach ($tags as $tag) {
				$result .= '<meta name="article:tag" content="' . $tag->name .'" />
		';
			}
		}
	}
	
	echo $result;
}

// Add Widget Location
function InitializeWidgets() {
	register_sidebar(array(
		'name' => 'Title Ad',
		'id' => 'widgetareatitlead',
		'before_widget' => '<div>',
		'after_widget' => '</div>'
	));

	register_sidebar(array(
		'name' => 'Search',
		'id' => 'widgetareasearch',
		'before_widget' => '<div>',
		'after_widget' => '</div>'
	));

	register_sidebar(array(
		'name' => 'SideBar',
		'id' => 'widgetareasidebar',
		'before_widget' => '<div class="sidebar-module panel panel-primary">',
		'after_widget' => '</div>',
		'before_title' => '<div class="panel-heading">',
		'after_title' => '</div>'
	));
}
add_action('widgets_init', 'InitializeWidgets');

// Loading Scripts and Styles
function loadingResources() {
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('bootstrapCss', get_template_directory_uri() . '/bootstrap-3.3.4-dist/css/bootstrap.min.css' );
	wp_enqueue_script('jQuery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js');
	wp_enqueue_script('bootstrapJs', get_template_directory_uri() . '/bootstrap-3.3.4-dist/js/bootstrap.min.js');
	wp_enqueue_script('js', get_template_directory_uri() . '/js/main.js');
}
add_action('wp_enqueue_scripts', 'loadingResources');

// Get Top ancestor
function get_top_ancestor_id() {
	global $post;

	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}

	return $post->ID;
}

// Checks whether page has childrens
function has_children() {
	global $post;

	$pages = get_pages('child_of=' . $post-> ID);
	return count($pages);
}

function add_last_nav_item($items) {
	$categories = GetCategories();

	$items .=  '<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">';

	foreach ( $categories as $category ) {
		$items .= '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
	}

	$items .=  '</ul></li>';

	return $items;
}
add_filter('wp_nav_menu_items','add_last_nav_item');

// Gets a comma seperated list of categories in which a post is present
function getPostCategories() {
	$categories = get_the_category(); 
	$seperator = ", ";
	$output = "Categories: ";

	if ($categories) {
		foreach ($categories as $category) {
			$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $seperator;
		}

		echo trim($output, $seperator);
	}
}

function getPostTags() {
	the_tags('Topics: ', ', ', '');
}

// Gets the custom length for excerpts
function custom_excerpt_length() {
	return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Add Read more as an excerpt
function new_excerpt_more( $more ) {
	global $post;
	$permalink = get_permalink($post->ID);
	return '<br/><br/><a href="' . $permalink . '" class="btn btn-primary">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Hide Wordpress admin bar
add_filter('show_admin_bar', '__return_false');

// Customize Appearence Options
function RegisterCustomization($wp_customize) {

}
add_action('customize_register', 'RegisterCustomization');

function pagination() {
	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav><ul class="pagination">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li><a href="#">...</a></li>' . "\n";
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><a href="#">...</a></li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></nav>' . "\n";
}

?>