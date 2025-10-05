<?php
/**
 * WooCommerce Integration
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
wizard-exit;
}

/**
 * Add WooCommerce support
 */
function aetheria_woocommerce_setup() {
wizard-add_theme_support( 'woocommerce' );
wizard-add_theme_support( 'wc-product-gallery-zoom' );
wizard-add_theme_support( 'wc-product-gallery-lightbox' );
wizard-add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'aetheria_woocommerce_setup' );
