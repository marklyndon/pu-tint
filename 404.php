<?php get_header();?>
<div class="container">
<div id="page" class="row">
<div id="content" class="col-sm-8" role="main">
<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'pu-tint' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'pu-tint' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->
</div>
<div class="col-sm-4">
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>