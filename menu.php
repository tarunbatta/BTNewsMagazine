<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href='<?php echo home_url(); ?>'><?php bloginfo('name'); ?></a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse">
			<?php 
				$args = array(
					'theme_location' => 'primary',
					'menu_class' => 'nav navbar-nav'
				);
			?>
			<?php wp_nav_menu($args); ?>
			<?php if (is_active_sidebar('widgetareasearch')) { ?> 
				<div class="navbar-right">
					<?php dynamic_sidebar('widgetareasearch'); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</nav>