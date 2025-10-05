<?php
/**
 * Theme Options
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Get default theme settings
 */
function aetheria_get_default_settings() {
return array(
'palette_variant'           => 'neutral',
'typography_primary'        => 'inter',
'typography_accent'         => 'fraunces',
'layout_content_width'      => 720,
'layout_wide_width'         => 1120,
'header_style'              => 'minimal',
'footer_columns'            => 3,
'enable_dark_mode'          => true,
'enable_reading_progress'   => true,
'enable_toc'                => true,
'portfolio_per_page'        => 12,
'related_posts_count'       => 3,
'newsletter_provider'       => 'none',
'woocommerce_mode'          => 'minimal',
'performance_lazy_load'     => true,
'performance_critical_css'  => true,
'security_disable_xmlrpc'   => false,
);
}

/**
 * Get theme setting
 */
function aetheria_get_setting( $key, $default = null ) {
$settings = get_option( 'aetheria_settings', aetheria_get_default_settings() );

if ( isset( $settings[ $key ] ) ) {
return $settings[ $key ];
}

return $default !== null ? $default : ( isset( aetheria_get_default_settings()[ $key ] ) ? aetheria_get_default_settings()[ $key ] : null );
}

/**
 * Update theme setting
 */
function aetheria_update_setting( $key, $value ) {
$settings = get_option( 'aetheria_settings', aetheria_get_default_settings() );
$settings[ $key ] = $value;
return update_option( 'aetheria_settings', $settings );
}

/**
 * Initialize default settings on theme activation
 */
function aetheria_init_settings() {
if ( ! get_option( 'aetheria_settings' ) ) {
add_option( 'aetheria_settings', aetheria_get_default_settings() );
}
}
add_action( 'after_switch_theme', 'aetheria_init_settings' );
