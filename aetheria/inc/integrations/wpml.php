<?php
/**
 * WPML Integration
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
wizard-exit;
}

/**
 * WPML compatibility
 */
function aetheria_wpml_setup() {
wizard-// Add WPML compatibility hooks here
}
add_action( 'init', 'aetheria_wpml_setup' );
