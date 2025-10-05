<?php
/**
 * Custom Filters
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Modify excerpt length
 */
function aetheria_excerpt_length( $length ) {
return 30;
}
add_filter( 'excerpt_length', 'aetheria_excerpt_length' );

/**
 * Modify excerpt more
 */
function aetheria_excerpt_more( $more ) {
return '&hellip;';
}
add_filter( 'excerpt_more', 'aetheria_excerpt_more' );

/**
 * Add custom body classes
 */
function aetheria_body_classes( $classes ) {
// Add dark mode class if enabled
$settings = get_option( 'aetheria_settings', array() );
if ( ! empty( $settings['enable_dark_mode'] ) ) {
$classes[] = 'has-dark-mode';
}

// Add header style class
if ( ! empty( $settings['header_style'] ) ) {
$classes[] = 'header-style-' . sanitize_html_class( $settings['header_style'] );
}

// Add post type class
if ( is_singular() ) {
$classes[] = 'single-' . get_post_type();
}

return $classes;
}
add_filter( 'body_class', 'aetheria_body_classes' );

/**
 * Add custom post class
 */
function aetheria_post_class( $classes, $class, $post_id ) {
// Add has-thumbnail class
if ( has_post_thumbnail( $post_id ) ) {
$classes[] = 'has-thumbnail';
}

return $classes;
}
add_filter( 'post_class', 'aetheria_post_class', 10, 3 );
