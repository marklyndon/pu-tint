<?php get_header();?>
<?php wp_reset_query(); ?>
<div class="container">
<div id="page" class="row">
<div id="content" class="col-sm-8" role="main">
<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'pu-tint' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'pu-tint' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'pu-tint' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'pu-tint' ), get_the_date( _x( 'Y', 'yearly archives date format', 'pu-tint' ) ) );

						else :
							_e( 'Archives', 'pu-tint' );

						endif;
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					pu_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
</div>
<div class="col-sm-4">
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>