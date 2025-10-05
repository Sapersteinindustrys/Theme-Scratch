<?php
/**
 * Search REST Endpoint
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Register search endpoint
 */
function aetheria_register_search_endpoint() {
register_rest_route(
'aetheria/v1',
'/search',
array(
'methods'             => 'GET',
'callback'            => 'aetheria_search_callback',
'permission_callback' => '__return_true',
'args'                => array(
'q' => array(
'required'          => true,
'type'              => 'string',
'sanitize_callback' => 'sanitize_text_field',
),
'post_type' => array(
'required'          => false,
'type'              => 'string',
'default'           => 'any',
'sanitize_callback' => 'sanitize_text_field',
),
'limit' => array(
'required'          => false,
'type'              => 'integer',
'default'           => 10,
'sanitize_callback' => 'absint',
),
),
)
);
}
add_action( 'rest_api_init', 'aetheria_register_search_endpoint' );

/**
 * Search callback
 */
function aetheria_search_callback( $request ) {
$query = $request->get_param( 'q' );
$post_type = $request->get_param( 'post_type' );
$limit = min( $request->get_param( 'limit' ), 50 ); // Max 50

// Search args
$args = array(
's'              => $query,
'post_type'      => $post_type === 'any' ? array( 'post', 'page', 'portfolio' ) : $post_type,
'post_status'    => 'publish',
'posts_per_page' => $limit,
);

$search_query = new WP_Query( $args );
$results = array();

if ( $search_query->have_posts() ) {
while ( $search_query->have_posts() ) {
$search_query->the_post();
$results[] = array(
'id'      => get_the_ID(),
'title'   => get_the_title(),
'excerpt' => get_the_excerpt(),
'url'     => get_permalink(),
'type'    => get_post_type(),
'date'    => get_the_date( 'Y-m-d' ),
);
}
wp_reset_postdata();
}

return rest_ensure_response(
array(
'results' => $results,
'total'   => $search_query->found_posts,
'page'    => 1,
)
);
}
