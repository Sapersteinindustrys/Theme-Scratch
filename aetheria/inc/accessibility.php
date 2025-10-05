<?php
/**
 * Accessibility Features
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Add aria-current to current menu items
 */
function aetheria_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
if ( $item->current ) {
$atts['aria-current'] = 'page';
}

return $atts;
}
add_filter( 'nav_menu_link_attributes', 'aetheria_nav_menu_link_attributes', 10, 4 );

/**
 * Improve image accessibility
 */
function aetheria_enhance_image_accessibility( $html, $id ) {
// If image doesn't have alt text, add it from title or leave empty
if ( strpos( $html, 'alt=""' ) !== false ) {
$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
if ( empty( $alt ) ) {
$alt = get_the_title( $id );
}
$html = str_replace( 'alt=""', 'alt="' . esc_attr( $alt ) . '"', $html );
}

return $html;
}
add_filter( 'wp_get_attachment_image', 'aetheria_enhance_image_accessibility', 10, 2 );

/**
 * Add role="navigation" to menus
 */
function aetheria_nav_menu_args( $args ) {
$args['container_aria_label'] = $args['theme_location'];
return $args;
}
add_filter( 'wp_nav_menu_args', 'aetheria_nav_menu_args' );
