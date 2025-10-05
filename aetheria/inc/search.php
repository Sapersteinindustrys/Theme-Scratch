<?php
/**
 * Search Functions
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Modify search query
 */
function aetheria_search_query( $query ) {
if ( $query->is_search() && ! is_admin() ) {
$query->set( 'post_type', array( 'post', 'page', 'portfolio' ) );
}
return $query;
}
add_filter( 'pre_get_posts', 'aetheria_search_query' );
