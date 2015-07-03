<article>
	<?php if ($wp_query->current_post && !is_paged()) {
		get_template_part('postBrief');
	} else {
		get_template_part('postLarge');
	} ?>
</article>