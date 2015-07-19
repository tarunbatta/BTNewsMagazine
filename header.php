<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset='<?php bloginfo('charset'); ?>'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		
		<meta name="keywords" content="<?php GetPageKeywords(); ?>" />
		<meta name="description" content="<?php bloginfo('description'); ?>" />

		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
		<meta property="og:type" content="article" />
		<meta property="fb:app_id" content="<?php echo GetFacebookAppId(); ?>" />
		<meta property="og:url" content="<?php GetCurrentPageUrl(); ?>" />
		<meta property="og:image" content="<?php GetImageUrl(); ?>" />
		<meta property="og:title" content="<?php GetPageTitle(); ?>" />
		<meta property="og:description" content="<?php GetPageDescription(); ?>" />
	
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@<?php bloginfo('name'); ?>" />
		<meta name="twitter:creator" content="@<?php bloginfo('name'); ?>" />
		<meta name="twitter:url" content="<?php GetCurrentPageUrl(); ?>" />
		<meta name="twitter:image" content="<?php GetImageUrl(); ?>" />
		<meta name="twitter:title" content="<?php GetPageTitle(); ?>" />
		<meta name="twitter:description" content="<?php GetPageDescription(); ?>" />
		<meta name="twitter:domain" content="<?php GetDomain(); ?>" />

		<?php GetArticleMetaTags(); ?>

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php GetIconUrl(); ?>" />

		<link rel="publisher" href="<?php echo GetGooglePlusUrl(); ?>" />
		<link rel="alternate" hreflang="x-default" href="<?php GetDomain(); ?>" />
		<link rel="canonical" href="<?php GetDomain(); ?>" />

		<title><?php GetPageTitle(); ?></title>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php get_template_part('menu'); ?>
	<div class="container">
		<div class="page-header row">
			<div class="col-sm-5">
				<h1><a href='<?php echo home_url(); ?>'><?php bloginfo('name'); ?></a></h1>
				<p class="lead"><?php bloginfo('description'); ?></p>
			</div>
			<?php if (is_active_sidebar('widgetareatitlead')) { ?> 
				<div class="col-sm-7">
					<?php dynamic_sidebar('widgetareatitlead'); ?>
				</div>
			<?php } ?>
		</div>