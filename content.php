<?php
/**
 * The default template for displaying content
 *
 * Used for both index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php if(has_post_thumbnail()){?>
	<a href="<?php the_permalink(); ?>" rel="single">
		<?php the_post_thumbnail('featured'); ?>
		</a>
		<?php } ?>

	
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) )) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list(', ', 'Used between list items, there is a space after the comma.'); ?></span> | 
			<?php
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments' ); ?></span>
			<?php
				endif; ?>
			<?php
			edit_post_link('Edit', '<span class="edit-link"> - ', '</span>' );
			?>
		</div><!-- .entry-meta -->
		<?php
			endif;

			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		?>
		<div class="entry-meta2">
			<?php
				if ( 'post' == get_post_type() ) 
					pu_posted_on();	
			?>
		</div><!-- .entry-meta2 -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			the_excerpt('Continue reading <span class="meta-nav">&rarr;</span>');
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php // the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
