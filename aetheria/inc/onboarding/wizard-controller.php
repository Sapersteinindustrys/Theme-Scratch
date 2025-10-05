<?php
/**
 * Onboarding Wizard Controller
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Check if wizard should be shown
 */
function aetheria_should_show_wizard() {
return ! get_option( 'aetheria_wizard_completed' );
}

/**
 * Mark wizard as completed
 */
function aetheria_complete_wizard( $settings ) {
update_option( 'aetheria_settings', $settings );
update_option( 'aetheria_wizard_completed', true );
delete_transient( 'aetheria_wizard_state' );

do_action( 'aetheria_onboarding_completed', $settings );
}

/**
 * Save wizard state
 */
function aetheria_save_wizard_state( $step, $data ) {
$state = get_transient( 'aetheria_wizard_state' );
if ( ! $state ) {
$state = array();
}
$state[ $step ] = $data;
set_transient( 'aetheria_wizard_state', $state, DAY_IN_SECONDS );
}

/**
 * Get wizard state
 */
function aetheria_get_wizard_state( $step = null ) {
$state = get_transient( 'aetheria_wizard_state' );
if ( $step ) {
return isset( $state[ $step ] ) ? $state[ $step ] : null;
}
return $state;
}
