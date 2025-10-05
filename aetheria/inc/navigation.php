<?php
/**
 * Navigation Functions
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Add menu item classes
 */
function aetheria_nav_menu_css_class( $classes, $item, $args, $depth ) {
// Add depth class
$classes[] = 'menu-item-depth-' . $depth;

// Add has children class
if ( in_array( 'menu-item-has-children', $classes, true ) ) {
$classes[] = 'has-submenu';
}

return $classes;
}
add_filter( 'nav_menu_css_class', 'aetheria_nav_menu_css_class', 10, 4 );

/**
 * Add skip link
 */
function aetheria_skip_link() {
echo '<a class="skip-link screen-reader-text" href="#main">' . esc_html__( 'Skip to content', 'aetheria' ) . '</a>';
}
add_action( 'wp_body_open', 'aetheria_skip_link' );
