<?php

//Building theme administration
require(  get_template_directory() . '/inc/theme-options.php');

//Building meta boxes
//require(  get_template_directory() . '/inc/meta-boxes.php');

//Building post types
//require(  get_template_directory() . '/inc/post-types.php');

//Building post types
require(  get_template_directory() . '/inc/custom-taxonomies.php');

//Add default posts and comments RSS feed links to <head>
add_theme_support( 'automatic-feed-links' );

//This enables Post Thumbnails support for this theme.
add_theme_support( 'post-thumbnails' );

add_image_size( 'featured', 800 , 200 , true );

//This theme uses wp_nav_menu()
register_nav_menu( 'primary', 'Primary Menu' );


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '...<p><a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article &rarr;</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*************************************************************/
/************REGISTERING SIDEBARS**************************/
/************************************************************/

        if(function_exists('register_sidebar')){
        
	        register_sidebar( array(
			'name'          => __( 'Primary Sidebar', 'tint' ),
			'id'            => 'sidebar-1',
			'description'   => 'Main sidebar that appears on the right',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			) );
			
			register_sidebar(array(
			'name'=> 'Front Page Highlight',
			'id' => 'frontpage_highlight',
			'description'   => 'Widget-able area for the front page template to show highlights',
			'before_widget' => '<div id="section-wide"><div class="container"><div class="row"><div class="col-md-12">',
			'after_widget' => '</div></div></div></div>',
			'before_title' => '',
			'after_title' => '',
			) );
        
		}

if ( ! function_exists( 'pu_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
 
function pu_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . 'Sticky' . '</span>';
	}
	// Set up and print post meta information.
	printf( '<span class="entry-date">Posted on <a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"> by <a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}

endif;

if ( ! function_exists( 'pu_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function pu_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="col-md-12" role="navigation">
		<h1 class="screen-reader-text">Posts navigation</h1>
		<div class="col-md-12">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous col-sm-6"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'pu-tint' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next col-sm-6" style="text-align:right;"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'pu-tint' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

 
 ?>