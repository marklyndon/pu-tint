<?php
// Template Name: Full Width
get_header();
?>
<section id="page">
<div class="container">
<div class="row">
<div id="content" class="col-md-12">
<h1><?php the_title()?></h1>
<?php
/* Run the loop to output the page.
* If you want to overload this in a child theme then include a file
* called loop-page.php and that will be used instead.
*/
//get_template_part( 'loop', 'page' );
wp_reset_query();
if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile;
else:
endif;
wp_reset_query();
?>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>