<?php

/*
add_action( 'init', 'post_types_adding' );

function post_types_adding() {
   $labels = array(
    'name' => __('Slides', 'tint'),
    'singular_name' => __('Slides', 'tint'),
    'add_new' => __('Add New', 'tint'),
    'add_new_item' => __('Add New Slide', 'tint'),
    'edit_item' => __('Edit Slide', 'tint'),
    'new_item' => __('New Slide', 'tint'),
    'all_items' => __('All Slide', 'tint'),
    'view_item' => __('View this Slide', 'tint'),
    'search_items' => __('Search Slide', 'tint'),
    'not_found' =>  __('No Slides', 'tint'),
    'not_found_in_trash' => __('No Slides in Trash', 'tint'),
    'parent_item_colon' => '',
    'menu_name' => __('Slides', 'tint'),

  );
  $args = array(
    'exclude_from_search' => true,
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'slides'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 100,
    'menu_icon' => get_template_directory_uri() . '/style/img/slider.png',
    'supports' => array('title', 'editor', 'thumbnail' ),
  );
  register_post_type('pt_slides',$args);
*/
  

  /*
$labels = array(
    'name' => __('Portfolio', 'tint'),
    'singular_name' => __('Portfolio', 'tint'),
    'add_new' => __('Add New', 'tint'),
    'add_new_item' => __('Add New Portfolio Item', 'tint'),
    'edit_item' => __('Edit Portfolio Item', 'tint'),
    'new_item' => __('New Portfolio Item', 'tint'),
    'all_items' => __('All Portfolio', 'tint'),
    'view_item' => __('View this Portfolio Item', 'tint'),
    'search_items' => __('Search Portfolio', 'tint'),
    'not_found' =>  __('No Portfolio', 'tint'),
    'not_found_in_trash' => __('No Portfolio in Trash', 'tint'),
    'parent_item_colon' => '',
    'menu_name' => __('Portfolio', 'tint'),

  );
  $args = array(
    'exclude_from_search' => true,
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'portfolios'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 100,
    'menu_icon' => get_template_directory_uri().'/style/img/portfolio.png',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt' ),
    'taxonomies' => array('category', 'post_tag'),
);
  register_post_type('pt_portfolio',$args);
*/

  //flush_rewrite_rules();

//} ?>