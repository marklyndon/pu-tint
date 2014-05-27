<?php get_header(); ?>
<section id="page">
<div class="container">
<div class="row">
<div id="content" class="col-md-8" role="main">
<h1><?php the_title(); ?></h1>
<?php
/* Run the loop to output the page.
* If you want to overload this in a child theme then include a file
* called loop-page.php and that will be used instead.
*/

//get_template_part( 'loop', 'page' );
                        
if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile;
else:
endif;
?>
</div>
<div class="col-md-4">
<?php get_sidebar(); ?>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>