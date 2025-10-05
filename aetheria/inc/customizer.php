<?php
/**
 * Customizer Settings
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register customizer settings
 */
function aetheria_customize_register( $wp_customize ) {
// Add Aetheria panel
$wp_customize->add_panel(
'aetheria_settings',
array(
'title'    => __( 'Aetheria Settings', 'aetheria' ),
'priority' => 10,
)
);

// Layout section
$wp_customize->add_section(
'aetheria_layout',
array(
'title' => __( 'Layout', 'aetheria' ),
'panel' => 'aetheria_settings',
)
);

// Header style
$wp_customize->add_setting(
'aetheria_header_style',
array(
'default'           => 'minimal',
'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control(
'aetheria_header_style',
array(
'label'   => __( 'Header Style', 'aetheria' ),
'section' => 'aetheria_layout',
'type'    => 'select',
'choices' => array(
'minimal' => __( 'Minimal', 'aetheria' ),
'center'  => __( 'Center', 'aetheria' ),
'split'   => __( 'Split', 'aetheria' ),
),
)
);
}
add_action( 'customize_register', 'aetheria_customize_register' );
