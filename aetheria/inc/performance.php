<?php
/**
 * Performance Optimizations
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Enable lazy loading for images
 */
function aetheria_enable_lazy_loading( $attr, $attachment ) {
$settings = get_option( 'aetheria_settings', array() );

if ( ! empty( $settings['performance_lazy_load'] ) ) {
$attr['loading'] = 'lazy';
}

return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'aetheria_enable_lazy_loading', 10, 2 );

/**
 * Defer JavaScript loading
 */
function aetheria_defer_scripts( $tag, $handle ) {
// Scripts to defer
$defer_scripts = array( 'aetheria-front' );

if ( in_array( $handle, $defer_scripts, true ) ) {
return str_replace( ' src', ' defer src', $tag );
}

return $tag;
}
add_filter( 'script_loader_tag', 'aetheria_defer_scripts', 10, 2 );

/**
 * Preload critical assets
 */
function aetheria_preload_assets() {
// Preload primary font
echo '<link rel="preload" href="' . esc_url( AETHERIA_URI . '/assets/fonts/inter-variable.woff2' ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action( 'wp_head', 'aetheria_preload_assets', 1 );

/**
 * Remove unnecessary WordPress features
 */
function aetheria_remove_unnecessary_features() {
// Remove emoji scripts
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Remove block library CSS if not needed
// Uncomment if you want to remove core block styles
// wp_dequeue_style( 'wp-block-library' );
}
add_action( 'init', 'aetheria_remove_unnecessary_features' );

/**
 * Optimize database queries
 */
function aetheria_optimize_queries() {
// Limit post revisions
if ( ! defined( 'WP_POST_REVISIONS' ) ) {
define( 'WP_POST_REVISIONS', 5 );
}

// Set autosave interval
if ( ! defined( 'AUTOSAVE_INTERVAL' ) ) {
define( 'AUTOSAVE_INTERVAL', 300 );
}
}
add_action( 'init', 'aetheria_optimize_queries' );

/**
 * Add resource hints
 */
function aetheria_resource_hints( $urls, $relation_type ) {
if ( 'dns-prefetch' === $relation_type ) {
$urls[] = '//fonts.googleapis.com';
$urls[] = '//fonts.gstatic.com';
}

return $urls;
}
add_filter( 'wp_resource_hints', 'aetheria_resource_hints', 10, 2 );
