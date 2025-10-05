<?php
/**
 * Block Registration
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register custom blocks
 */
function aetheria_register_blocks() {
// Register block categories
add_filter( 'block_categories_all', 'aetheria_block_categories', 10, 2 );

// Register individual blocks
$blocks = array(
'hero',
'feature-grid',
'testimonial-slider',
'portfolio-query',
'stats',
'logo-cloud',
'accordion',
'tabs',
'timeline',
'newsletter',
'cta-band',
'masonry-gallery',
'video-lightbox',
);

foreach ( $blocks as $block ) {
$block_path = AETHERIA_DIR . '/blocks/' . $block;
if ( file_exists( $block_path . '/block.json' ) ) {
register_block_type( $block_path );
}
}

do_action( 'aetheria_register_blocks' );
}
add_action( 'init', 'aetheria_register_blocks' );

/**
 * Add custom block category
 */
function aetheria_block_categories( $categories, $context ) {
return array_merge(
array(
array(
'slug'  => 'aetheria',
'title' => __( 'Aetheria Blocks', 'aetheria' ),
'icon'  => 'star-filled',
),
),
$categories
);
}
