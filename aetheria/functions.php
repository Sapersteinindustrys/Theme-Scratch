<?php
/**
 * Aetheria Theme Functions
 *
 * @package Aetheria
 * @since 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
exit;
}

// Define theme constants
define( 'AETHERIA_VERSION', '1.0.0' );
define( 'AETHERIA_DIR', get_template_directory() );
define( 'AETHERIA_URI', get_template_directory_uri() );

// Core includes
require_once AETHERIA_DIR . '/inc/setup.php';
require_once AETHERIA_DIR . '/inc/assets.php';
require_once AETHERIA_DIR . '/inc/performance.php';
require_once AETHERIA_DIR . '/inc/security.php';
require_once AETHERIA_DIR . '/inc/blocks.php';
require_once AETHERIA_DIR . '/inc/patterns.php';
require_once AETHERIA_DIR . '/inc/custom-post-types.php';
require_once AETHERIA_DIR . '/inc/taxonomies.php';
require_once AETHERIA_DIR . '/inc/meta.php';
require_once AETHERIA_DIR . '/inc/schema.php';
require_once AETHERIA_DIR . '/inc/filters.php';
require_once AETHERIA_DIR . '/inc/template-tags.php';
require_once AETHERIA_DIR . '/inc/navigation.php';
require_once AETHERIA_DIR . '/inc/i18n.php';
require_once AETHERIA_DIR . '/inc/accessibility.php';
require_once AETHERIA_DIR . '/inc/options.php';
require_once AETHERIA_DIR . '/inc/customizer.php';
require_once AETHERIA_DIR . '/inc/image-sizes.php';
require_once AETHERIA_DIR . '/inc/related-content.php';
require_once AETHERIA_DIR . '/inc/search.php';

// REST API endpoints
require_once AETHERIA_DIR . '/inc/rest/newsletter-endpoint.php';
require_once AETHERIA_DIR . '/inc/rest/search-endpoint.php';

// Onboarding wizard
require_once AETHERIA_DIR . '/inc/onboarding/wizard-controller.php';
require_once AETHERIA_DIR . '/inc/onboarding/wizard-steps.php';
require_once AETHERIA_DIR . '/inc/onboarding/wizard-api.php';

// Integrations (conditional loading)
if ( class_exists( 'WooCommerce' ) ) {
require_once AETHERIA_DIR . '/inc/integrations/woocommerce.php';
}

if ( defined( 'WPCF7_VERSION' ) ) {
require_once AETHERIA_DIR . '/inc/integrations/contact-form7.php';
}

if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
require_once AETHERIA_DIR . '/inc/integrations/wpml.php';
}

// Initialize theme
add_action( 'after_setup_theme', 'aetheria_setup' );
