<?php
/**
 * Block Patterns
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register block patterns
 */
function aetheria_register_patterns() {
// Register pattern category
register_block_pattern_category(
'aetheria',
array( 'label' => __( 'Aetheria', 'aetheria' ) )
);

// Hero with CTA pattern
register_block_pattern(
'aetheria/hero-with-cta',
array(
'title'       => __( 'Hero with CTA', 'aetheria' ),
'description' => __( 'A hero section with heading, subheading, and call-to-action button', 'aetheria' ),
'categories'  => array( 'aetheria' ),
'content'     => '<!-- wp:aetheria/hero {"heading":"Welcome to Our Studio","subheading":"Crafting digital experiences","height":"tall","variant":"gradient","ctaText":"Get Started","ctaUrl":"#contact"} /-->',
)
);

// Add more patterns here
}
add_action( 'init', 'aetheria_register_patterns' );
