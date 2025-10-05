<?php
/**
 * Custom Taxonomies
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register Portfolio Category Taxonomy
 */
function aetheria_register_portfolio_category() {
$labels = array(
'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'aetheria' ),
'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'aetheria' ),
'menu_name'                  => __( 'Categories', 'aetheria' ),
'all_items'                  => __( 'All Categories', 'aetheria' ),
'parent_item'                => __( 'Parent Category', 'aetheria' ),
'parent_item_colon'          => __( 'Parent Category:', 'aetheria' ),
'new_item_name'              => __( 'New Category Name', 'aetheria' ),
'add_new_item'               => __( 'Add New Category', 'aetheria' ),
'edit_item'                  => __( 'Edit Category', 'aetheria' ),
'update_item'                => __( 'Update Category', 'aetheria' ),
'view_item'                  => __( 'View Category', 'aetheria' ),
'separate_items_with_commas' => __( 'Separate categories with commas', 'aetheria' ),
'add_or_remove_items'        => __( 'Add or remove categories', 'aetheria' ),
'choose_from_most_used'      => __( 'Choose from the most used', 'aetheria' ),
'popular_items'              => __( 'Popular Categories', 'aetheria' ),
'search_items'               => __( 'Search Categories', 'aetheria' ),
'not_found'                  => __( 'Not Found', 'aetheria' ),
'no_terms'                   => __( 'No categories', 'aetheria' ),
'items_list'                 => __( 'Categories list', 'aetheria' ),
'items_list_navigation'      => __( 'Categories list navigation', 'aetheria' ),
);

$args = array(
'labels'            => $labels,
'hierarchical'      => true,
'public'            => true,
'show_ui'           => true,
'show_admin_column' => true,
'show_in_nav_menus' => true,
'show_tagcloud'     => true,
'show_in_rest'      => true,
'rewrite'           => array( 'slug' => 'portfolio-category' ),
);

register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
}
add_action( 'init', 'aetheria_register_portfolio_category' );

/**
 * Register Skill Taxonomy
 */
function aetheria_register_skill_taxonomy() {
$labels = array(
'name'                       => _x( 'Skills', 'Taxonomy General Name', 'aetheria' ),
'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'aetheria' ),
'menu_name'                  => __( 'Skills', 'aetheria' ),
'all_items'                  => __( 'All Skills', 'aetheria' ),
'parent_item'                => __( 'Parent Skill', 'aetheria' ),
'parent_item_colon'          => __( 'Parent Skill:', 'aetheria' ),
'new_item_name'              => __( 'New Skill Name', 'aetheria' ),
'add_new_item'               => __( 'Add New Skill', 'aetheria' ),
'edit_item'                  => __( 'Edit Skill', 'aetheria' ),
'update_item'                => __( 'Update Skill', 'aetheria' ),
'view_item'                  => __( 'View Skill', 'aetheria' ),
'separate_items_with_commas' => __( 'Separate skills with commas', 'aetheria' ),
'add_or_remove_items'        => __( 'Add or remove skills', 'aetheria' ),
'choose_from_most_used'      => __( 'Choose from the most used', 'aetheria' ),
'popular_items'              => __( 'Popular Skills', 'aetheria' ),
'search_items'               => __( 'Search Skills', 'aetheria' ),
'not_found'                  => __( 'Not Found', 'aetheria' ),
'no_terms'                   => __( 'No skills', 'aetheria' ),
'items_list'                 => __( 'Skills list', 'aetheria' ),
'items_list_navigation'      => __( 'Skills list navigation', 'aetheria' ),
);

$args = array(
'labels'            => $labels,
'hierarchical'      => false,
'public'            => true,
'show_ui'           => true,
'show_admin_column' => true,
'show_in_nav_menus' => true,
'show_tagcloud'     => true,
'show_in_rest'      => true,
'rewrite'           => array( 'slug' => 'skill' ),
);

register_taxonomy( 'skill', array( 'portfolio' ), $args );
}
add_action( 'init', 'aetheria_register_skill_taxonomy' );
