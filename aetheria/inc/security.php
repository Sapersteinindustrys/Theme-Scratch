<?php
/**
 * Security Features
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Remove WordPress version from head
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Disable XML-RPC if not needed
 */
function aetheria_disable_xmlrpc( $enabled ) {
$settings = get_option( 'aetheria_settings', array() );

if ( ! empty( $settings['security_disable_xmlrpc'] ) ) {
return false;
}

return $enabled;
}
add_filter( 'xmlrpc_enabled', 'aetheria_disable_xmlrpc' );

/**
 * Add security headers
 */
function aetheria_security_headers() {
header( 'X-Content-Type-Options: nosniff' );
header( 'X-Frame-Options: SAMEORIGIN' );
header( 'X-XSS-Protection: 1; mode=block' );
header( 'Referrer-Policy: strict-origin-when-cross-origin' );
}
add_action( 'send_headers', 'aetheria_security_headers' );

/**
 * Sanitize file uploads
 */
function aetheria_sanitize_file_upload( $file ) {
$file['name'] = sanitize_file_name( $file['name'] );
return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'aetheria_sanitize_file_upload' );

/**
 * Remove file edit capability from theme editor
 */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Verify nonce for AJAX requests
 */
function aetheria_verify_ajax_nonce() {
if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
if ( ! isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], 'aetheria_nonce' ) ) {
wp_send_json_error( array( 'message' => 'Invalid nonce' ), 403 );
}
}
}

/**
 * Sanitize REST API requests
 */
function aetheria_sanitize_rest_request( $result, $server, $request ) {
// Add custom sanitization for REST requests
return $result;
}
add_filter( 'rest_pre_dispatch', 'aetheria_sanitize_rest_request', 10, 3 );
