<?php
/**
 * Image Sizes
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register custom image sizes
 */
function aetheria_register_image_sizes() {
// Portfolio thumbnail
add_image_size( 'portfolio-thumbnail', 600, 450, true );

// Portfolio large
add_image_size( 'portfolio-large', 1200, 800, true );

// Hero image
add_image_size( 'hero', 1920, 1080, true );

// Testimonial headshot
add_image_size( 'testimonial-headshot', 150, 150, true );

// Logo cloud
add_image_size( 'logo', 300, 200, false );
}
add_action( 'after_setup_theme', 'aetheria_register_image_sizes' );

/**
 * Add custom image sizes to editor
 */
function aetheria_custom_image_sizes( $sizes ) {
return array_merge(
$sizes,
array(
'portfolio-thumbnail' => __( 'Portfolio Thumbnail', 'aetheria' ),
'portfolio-large'     => __( 'Portfolio Large', 'aetheria' ),
'hero'                => __( 'Hero', 'aetheria' ),
)
);
}
add_filter( 'image_size_names_choose', 'aetheria_custom_image_sizes' );
