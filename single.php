<?php
get_header();
?> 
<div class="container">
<div id="page" class="row">
<div id="content" class="col-sm-8">
	<header class="entry-header">
	<?php if(has_post_thumbnail()){?>

<?php the_post_thumbnail('featured'); ?>

<?php }?>
	
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
			?>
			<h1><?php the_title() ?></h1>
	</header><!-- .entry-header -->

                        <?php
                            wp_reset_query();
                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                                    the_content();
                                endwhile;
                            else:
                            endif;
                            wp_reset_query();
        ?>
        <?php comments_template(); ?>
</div>
<div class="col-sm-4">
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>