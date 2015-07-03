<form class="navbar-form navbar-left" role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div class="form-group">
		<label class="screen-reader-text" for="s" style="display: none;">Search for:</label>
		<input class="form-control" type="text" value="" name="s" id="s" placeholder="<?php the_search_query(); ?>"/>
		<input class="btn btn-default" type="submit" id="searchsubmit" value="Search" />
	</div>
</form>