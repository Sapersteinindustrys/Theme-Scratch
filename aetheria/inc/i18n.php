<?php
/**
 * Internationalization
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Add RTL support
 */
function aetheria_rtl_support() {
if ( is_rtl() ) {
// RTL styles are automatically loaded by WordPress
// Add RTL-specific adjustments here if needed
}
}
add_action( 'wp_enqueue_scripts', 'aetheria_rtl_support' );

/**
 * Register strings for translation
 */
function aetheria_register_translatable_strings() {
// Register common strings
$strings = array(
__( 'Read More', 'aetheria' ),
__( 'Continue Reading', 'aetheria' ),
__( 'Previous', 'aetheria' ),
__( 'Next', 'aetheria' ),
__( 'Search', 'aetheria' ),
__( 'Close', 'aetheria' ),
__( 'Menu', 'aetheria' ),
);
}
add_action( 'init', 'aetheria_register_translatable_strings' );
