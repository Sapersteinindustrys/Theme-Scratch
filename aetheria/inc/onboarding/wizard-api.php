<?php
/**
 * Onboarding Wizard API
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register wizard REST endpoints
 */
function aetheria_register_wizard_endpoints() {
// Save step endpoint
register_rest_route(
'aetheria/v1',
'/wizard/step',
array(
'methods'             => 'POST',
'callback'            => 'aetheria_wizard_save_step',
'permission_callback' => function() {
return current_user_can( 'manage_options' );
},
)
);

// Complete wizard endpoint
register_rest_route(
'aetheria/v1',
'/wizard/complete',
array(
'methods'             => 'POST',
'callback'            => 'aetheria_wizard_complete',
'permission_callback' => function() {
return current_user_can( 'manage_options' );
},
)
);
}
add_action( 'rest_api_init', 'aetheria_register_wizard_endpoints' );

/**
 * Save wizard step
 */
function aetheria_wizard_save_step( $request ) {
$step = $request->get_param( 'step' );
$data = $request->get_param( 'data' );

aetheria_save_wizard_state( $step, $data );

return rest_ensure_response( array( 'success' => true ) );
}

/**
 * Complete wizard
 */
function aetheria_wizard_complete( $request ) {
$settings = $request->get_param( 'settings' );

aetheria_complete_wizard( $settings );

return rest_ensure_response( array( 'success' => true ) );
}
