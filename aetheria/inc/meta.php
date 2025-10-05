<?php
/**
 * Meta Fields
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register portfolio meta fields
 */
function aetheria_register_portfolio_meta() {
// Client name
register_post_meta(
'portfolio',
'client_name',
array(
'type'         => 'string',
'single'       => true,
'show_in_rest' => true,
)
);

// Role/services
register_post_meta(
'portfolio',
'role',
array(
'type'         => 'string',
'single'       => true,
'show_in_rest' => true,
)
);

// Year
register_post_meta(
'portfolio',
'year',
array(
'type'         => 'string',
'single'       => true,
'show_in_rest' => true,
)
);

// Project URL
register_post_meta(
'portfolio',
'project_url',
array(
'type'         => 'string',
'single'       => true,
'show_in_rest' => true,
)
);

// Gallery IDs
register_post_meta(
'portfolio',
'gallery_ids',
array(
'type'         => 'array',
'single'       => true,
'show_in_rest' => array(
'schema' => array(
'type'  => 'array',
'items' => array(
'type' => 'integer',
),
),
),
)
);
}
add_action( 'init', 'aetheria_register_portfolio_meta' );

/**
 * Register testimonial meta fields
 */
function aetheria_register_testimonial_meta() {
// Company
register_post_meta(
'testimonial',
'company',
array(
'type'         => 'string',
'single'       => true,
'show_in_rest' => true,
)
);

// Role
register_post_meta(
'testimonial',
'role',
array(
'type'         => 'string',
'single'       => true,
'show_in_rest' => true,
)
);

// Rating
register_post_meta(
'testimonial',
'rating',
array(
'type'         => 'integer',
'single'       => true,
'show_in_rest' => true,
)
);

// Headshot ID
register_post_meta(
'testimonial',
'headshot_id',
array(
'type'         => 'integer',
'single'       => true,
'show_in_rest' => true,
)
);
}
add_action( 'init', 'aetheria_register_testimonial_meta' );
