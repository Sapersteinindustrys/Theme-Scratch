<?php
/**
 * Newsletter REST Endpoint
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register newsletter endpoint
 */
function aetheria_register_newsletter_endpoint() {
register_rest_route(
'aetheria/v1',
'/newsletter',
array(
'methods'             => 'POST',
'callback'            => 'aetheria_newsletter_callback',
'permission_callback' => '__return_true',
'args'                => array(
'email' => array(
'required'          => true,
'type'              => 'string',
'sanitize_callback' => 'sanitize_email',
'validate_callback' => 'is_email',
),
'consent' => array(
'required'          => true,
'type'              => 'boolean',
),
),
)
);
}
add_action( 'rest_api_init', 'aetheria_register_newsletter_endpoint' );

/**
 * Newsletter subscription callback
 */
function aetheria_newsletter_callback( $request ) {
// Rate limiting
$ip = $_SERVER['REMOTE_ADDR'];
$rate_limit_key = 'aetheria_newsletter_' . md5( $ip );
$rate_limit = get_transient( $rate_limit_key );

if ( $rate_limit && $rate_limit >= 5 ) {
return new WP_Error(
'rate_limit',
__( 'Too many requests. Please try again later.', 'aetheria' ),
array( 'status' => 429 )
);
}

// Get parameters
$email = $request->get_param( 'email' );
$consent = $request->get_param( 'consent' );

// Validate email
if ( ! is_email( $email ) ) {
return new WP_Error(
'invalid_email',
__( 'Please provide a valid email address.', 'aetheria' ),
array( 'status' => 400 )
);
}

// Check consent
if ( ! $consent ) {
return new WP_Error(
'no_consent',
__( 'You must consent to subscribe.', 'aetheria' ),
array( 'status' => 400 )
);
}

// Check if already subscribed
$subscribers = get_option( 'aetheria_newsletter_subscribers', array() );
if ( in_array( $email, $subscribers, true ) ) {
return new WP_Error(
'already_subscribed',
__( 'This email is already subscribed.', 'aetheria' ),
array( 'status' => 400 )
);
}

// Add subscriber
$subscribers[] = $email;
update_option( 'aetheria_newsletter_subscribers', $subscribers );

// Update rate limit
$current_count = $rate_limit ? $rate_limit : 0;
set_transient( $rate_limit_key, $current_count + 1, HOUR_IN_SECONDS );

// Prepare response
$response = array(
'success' => true,
'message' => __( 'Successfully subscribed to newsletter.', 'aetheria' ),
);

$response = apply_filters( 'aetheria_newsletter_response', $response, $request );

return rest_ensure_response( $response );
}
