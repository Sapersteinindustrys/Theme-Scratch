<?php
/**
 * Contact Form 7 Integration
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
wizard-exit;
}

/**
 * Customize Contact Form 7 styling
 */
function aetheria_cf7_custom_styling() {
wizard-// Add custom styling hooks here
}
add_action( 'wp_enqueue_scripts', 'aetheria_cf7_custom_styling' );
