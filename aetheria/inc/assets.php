<?php
/**
 * Asset Management
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Enqueue front-end scripts and styles
 */
function aetheria_enqueue_assets() {
// Get asset manifest for cache busting
$manifest_path = AETHERIA_DIR . '/assets/manifest.json';
$manifest      = file_exists( $manifest_path ) ? json_decode( file_get_contents( $manifest_path ), true ) : array();

// Enqueue front-end CSS
$front_css = isset( $manifest['front.css'] ) ? $manifest['front.css'] : 'assets/css/front.css';
wp_enqueue_style( 'aetheria-front', AETHERIA_URI . '/' . $front_css, array(), AETHERIA_VERSION );

// Enqueue dark mode CSS
$dark_css = isset( $manifest['dark.css'] ) ? $manifest['dark.css'] : 'assets/css/dark.css';
wp_enqueue_style( 'aetheria-dark', AETHERIA_URI . '/' . $dark_css, array( 'aetheria-front' ), AETHERIA_VERSION );

// Inline critical CSS if enabled
$settings = get_option( 'aetheria_settings', array() );
if ( ! empty( $settings['performance_critical_css'] ) ) {
$critical_css = AETHERIA_DIR . '/assets/css/critical.css';
if ( file_exists( $critical_css ) ) {
wp_add_inline_style( 'aetheria-front', file_get_contents( $critical_css ) );
}
}

// Enqueue front-end JS
$front_js = isset( $manifest['front.js'] ) ? $manifest['front.js'] : 'assets/js/front.js';
wp_enqueue_script( 'aetheria-front', AETHERIA_URI . '/' . $front_js, array(), AETHERIA_VERSION, true );

// Localize script with theme data
wp_localize_script(
'aetheria-front',
'aetheriaData',
array(
'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
'restUrl'     => rest_url( 'aetheria/v1' ),
'nonce'       => wp_create_nonce( 'aetheria_nonce' ),
'darkMode'    => ! empty( $settings['enable_dark_mode'] ),
'i18n'        => array(
'loading'         => esc_html__( 'Loading...', 'aetheria' ),
'error'           => esc_html__( 'An error occurred', 'aetheria' ),
'closeMenu'       => esc_html__( 'Close menu', 'aetheria' ),
'openMenu'        => esc_html__( 'Open menu', 'aetheria' ),
'previousSlide'   => esc_html__( 'Previous slide', 'aetheria' ),
'nextSlide'       => esc_html__( 'Next slide', 'aetheria' ),
'closeModal'      => esc_html__( 'Close modal', 'aetheria' ),
),
)
);

// Enqueue comment reply script
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}

// Fire action for additional assets
do_action( 'aetheria_enqueue_front_assets' );
}
add_action( 'wp_enqueue_scripts', 'aetheria_enqueue_assets' );

/**
 * Enqueue editor scripts and styles
 */
function aetheria_enqueue_editor_assets() {
// Enqueue editor CSS
wp_enqueue_style( 'aetheria-editor', AETHERIA_URI . '/assets/css/editor.css', array(), AETHERIA_VERSION );

// Enqueue editor JS
wp_enqueue_script( 'aetheria-editor', AETHERIA_URI . '/assets/js/editor.js', array( 'wp-blocks', 'wp-element', 'wp-editor' ), AETHERIA_VERSION, true );
}
add_action( 'enqueue_block_editor_assets', 'aetheria_enqueue_editor_assets' );
