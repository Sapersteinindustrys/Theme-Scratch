<?php
/**
 * Onboarding Wizard Steps
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Get wizard steps
 */
function aetheria_get_wizard_steps() {
return array(
'system'         => __( 'System Check', 'aetheria' ),
'brand'          => __( 'Brand Information', 'aetheria' ),
'palette'        => __( 'Color Palette', 'aetheria' ),
'typography'     => __( 'Typography', 'aetheria' ),
'layout'         => __( 'Layout Settings', 'aetheria' ),
'content'        => __( 'Content Presets', 'aetheria' ),
'features'       => __( 'Feature Toggles', 'aetheria' ),
'newsletter'     => __( 'Newsletter Integration', 'aetheria' ),
'seo'            => __( 'SEO & Schema', 'aetheria' ),
'review'         => __( 'Review & Complete', 'aetheria' ),
);
}
