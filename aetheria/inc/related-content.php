<?php
/**
 * Related Content Algorithm
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Get related posts using scoring algorithm
 */
function aetheria_get_related_posts( $post_id = null, $limit = 3 ) {
if ( ! $post_id ) {
$post_id = get_the_ID();
}

$post = get_post( $post_id );
if ( ! $post ) {
return array();
}

// Get post categories and tags
$categories = wp_get_post_categories( $post_id );
$tags = wp_get_post_tags( $post_id, array( 'fields' => 'ids' ) );

// Query potential related posts
$args = array(
'post_type'      => $post->post_type,
'post_status'    => 'publish',
'posts_per_page' => 50,
'post__not_in'   => array( $post_id ),
'orderby'        => 'date',
'order'          => 'DESC',
);

$args = apply_filters( 'aetheria_related_posts_args', $args, $post );

$query = new WP_Query( $args );
$scored_posts = array();

if ( $query->have_posts() ) {
while ( $query->have_posts() ) {
$query->the_post();
$related_id = get_the_ID();

// Calculate score
$score = 0;
$related_cats = wp_get_post_categories( $related_id );
$related_tags = wp_get_post_tags( $related_id, array( 'fields' => 'ids' ) );

// Shared categories (weight: 2)
$shared_cats = array_intersect( $categories, $related_cats );
$score += count( $shared_cats ) * 2;

// Shared tags (weight: 1)
$shared_tags = array_intersect( $tags, $related_tags );
$score += count( $shared_tags ) * 1;

// Time decay
$post_date = get_the_date( 'U' );
$age_days = ( time() - $post_date ) / DAY_IN_SECONDS;
$decay = 1 / ( 1 + ( $age_days / 180 ) );

$final_score = $score * $decay;

if ( $final_score > 0 ) {
$scored_posts[ $related_id ] = $final_score;
}
}
wp_reset_postdata();
}

// Sort by score
arsort( $scored_posts );

// Get top posts
$related_ids = array_slice( array_keys( $scored_posts ), 0, $limit );

// If no related posts, get recent posts
if ( empty( $related_ids ) ) {
$recent_args = array(
'post_type'      => $post->post_type,
'post_status'    => 'publish',
'posts_per_page' => $limit,
'post__not_in'   => array( $post_id ),
'orderby'        => 'date',
'order'          => 'DESC',
);
$recent_query = new WP_Query( $recent_args );
if ( $recent_query->have_posts() ) {
while ( $recent_query->have_posts() ) {
$recent_query->the_post();
$related_ids[] = get_the_ID();
}
wp_reset_postdata();
}
}

return $related_ids;
}
