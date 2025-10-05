<?php
/**
 * Custom Post Types
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register Portfolio Post Type
 */
function aetheria_register_portfolio_post_type() {
$labels = array(
'name'                  => _x( 'Portfolio', 'Post Type General Name', 'aetheria' ),
'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'aetheria' ),
'menu_name'             => __( 'Portfolio', 'aetheria' ),
'name_admin_bar'        => __( 'Portfolio Item', 'aetheria' ),
'archives'              => __( 'Portfolio Archives', 'aetheria' ),
'attributes'            => __( 'Portfolio Attributes', 'aetheria' ),
'parent_item_colon'     => __( 'Parent Item:', 'aetheria' ),
'all_items'             => __( 'All Items', 'aetheria' ),
'add_new_item'          => __( 'Add New Item', 'aetheria' ),
'add_new'               => __( 'Add New', 'aetheria' ),
'new_item'              => __( 'New Item', 'aetheria' ),
'edit_item'             => __( 'Edit Item', 'aetheria' ),
'update_item'           => __( 'Update Item', 'aetheria' ),
'view_item'             => __( 'View Item', 'aetheria' ),
'view_items'            => __( 'View Items', 'aetheria' ),
'search_items'          => __( 'Search Item', 'aetheria' ),
'not_found'             => __( 'Not found', 'aetheria' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'aetheria' ),
'featured_image'        => __( 'Featured Image', 'aetheria' ),
'set_featured_image'    => __( 'Set featured image', 'aetheria' ),
'remove_featured_image' => __( 'Remove featured image', 'aetheria' ),
'use_featured_image'    => __( 'Use as featured image', 'aetheria' ),
'insert_into_item'      => __( 'Insert into item', 'aetheria' ),
'uploaded_to_this_item' => __( 'Uploaded to this item', 'aetheria' ),
'items_list'            => __( 'Items list', 'aetheria' ),
'items_list_navigation' => __( 'Items list navigation', 'aetheria' ),
'filter_items_list'     => __( 'Filter items list', 'aetheria' ),
);

$args = array(
'label'               => __( 'Portfolio Item', 'aetheria' ),
'description'         => __( 'Portfolio items', 'aetheria' ),
'labels'              => $labels,
'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
'taxonomies'          => array( 'portfolio_category', 'skill' ),
'hierarchical'        => false,
'public'              => true,
'show_ui'             => true,
'show_in_menu'        => true,
'menu_position'       => 5,
'menu_icon'           => 'dashicons-portfolio',
'show_in_admin_bar'   => true,
'show_in_nav_menus'   => true,
'can_export'          => true,
'has_archive'         => true,
'exclude_from_search' => false,
'publicly_queryable'  => true,
'capability_type'     => 'post',
'show_in_rest'        => true,
'rest_base'           => 'portfolio',
'rewrite'             => array( 'slug' => 'portfolio' ),
);

register_post_type( 'portfolio', $args );
}
add_action( 'init', 'aetheria_register_portfolio_post_type' );

/**
 * Register Testimonial Post Type
 */
function aetheria_register_testimonial_post_type() {
$labels = array(
'name'                  => _x( 'Testimonials', 'Post Type General Name', 'aetheria' ),
'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'aetheria' ),
'menu_name'             => __( 'Testimonials', 'aetheria' ),
'name_admin_bar'        => __( 'Testimonial', 'aetheria' ),
'archives'              => __( 'Testimonial Archives', 'aetheria' ),
'attributes'            => __( 'Testimonial Attributes', 'aetheria' ),
'parent_item_colon'     => __( 'Parent Item:', 'aetheria' ),
'all_items'             => __( 'All Testimonials', 'aetheria' ),
'add_new_item'          => __( 'Add New Testimonial', 'aetheria' ),
'add_new'               => __( 'Add New', 'aetheria' ),
'new_item'              => __( 'New Testimonial', 'aetheria' ),
'edit_item'             => __( 'Edit Testimonial', 'aetheria' ),
'update_item'           => __( 'Update Testimonial', 'aetheria' ),
'view_item'             => __( 'View Testimonial', 'aetheria' ),
'view_items'            => __( 'View Testimonials', 'aetheria' ),
'search_items'          => __( 'Search Testimonial', 'aetheria' ),
'not_found'             => __( 'Not found', 'aetheria' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'aetheria' ),
);

$args = array(
'label'               => __( 'Testimonial', 'aetheria' ),
'description'         => __( 'Client testimonials', 'aetheria' ),
'labels'              => $labels,
'supports'            => array( 'title', 'editor', 'thumbnail' ),
'hierarchical'        => false,
'public'              => true,
'show_ui'             => true,
'show_in_menu'        => true,
'menu_position'       => 6,
'menu_icon'           => 'dashicons-format-quote',
'show_in_admin_bar'   => true,
'show_in_nav_menus'   => false,
'can_export'          => true,
'has_archive'         => false,
'exclude_from_search' => true,
'publicly_queryable'  => false,
'capability_type'     => 'post',
'show_in_rest'        => true,
'rest_base'           => 'testimonials',
);

register_post_type( 'testimonial', $args );
}
add_action( 'init', 'aetheria_register_testimonial_post_type' );
