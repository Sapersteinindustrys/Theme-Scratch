<?php
/**
 * Schema/Structured Data
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Generate schema markup
 */
function aetheria_generate_schema() {
$schema = array();

// Website schema
$schema[] = array(
'@type'         => 'WebSite',
'@id'           => home_url( '/#website' ),
'url'           => home_url( '/' ),
'name'          => get_bloginfo( 'name' ),
'description'   => get_bloginfo( 'description' ),
'potentialAction' => array(
'@type'       => 'SearchAction',
'target'      => home_url( '/?s={search_term_string}' ),
'query-input' => 'required name=search_term_string',
),
);

// Organization schema
$schema[] = array(
'@type' => 'Organization',
'@id'   => home_url( '/#organization' ),
'name'  => get_bloginfo( 'name' ),
'url'   => home_url( '/' ),
);

// Article schema for posts
if ( is_singular( 'post' ) ) {
global $post;
$schema[] = array(
'@type'         => 'Article',
'headline'      => get_the_title(),
'datePublished' => get_the_date( 'c' ),
'dateModified'  => get_the_modified_date( 'c' ),
'author'        => array(
'@type' => 'Person',
'name'  => get_the_author(),
),
);
}

$schema = apply_filters( 'aetheria_schema_graph', $schema );

if ( ! empty( $schema ) ) {
$output = array(
'@context' => 'https://schema.org',
'@graph'   => $schema,
);

echo '<script type="application/ld+json">' . wp_json_encode( $output, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
}
add_action( 'wp_head', 'aetheria_generate_schema' );
