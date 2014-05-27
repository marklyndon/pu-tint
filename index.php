<?php get_header();?>
<?php wp_reset_query(); ?>
<div class="container">
<div id="page" class="row">
<div id="content" class="col-sm-8" role="main">
<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;
				// Previous/next post navigation.
				//twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>
		<?php pu_paging_nav(); ?>

</div>
<div class="col-sm-4">
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>