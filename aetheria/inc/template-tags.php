<?php
/**
 * Template Tags
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Display reading time
 */
function aetheria_reading_time( $post_id = null ) {
if ( ! $post_id ) {
$post_id = get_the_ID();
}

$content = get_post_field( 'post_content', $post_id );
$word_count = str_word_count( strip_tags( $content ) );
$reading_time = ceil( $word_count / 200 ); // Assume 200 words per minute

printf(
'<span class="reading-time" data-read-minutes="%d">%s</span>',
absint( $reading_time ),
sprintf(
/* translators: %d: reading time in minutes */
esc_html( _n( '%d min read', '%d min read', $reading_time, 'aetheria' ) ),
absint( $reading_time )
)
);
}

/**
 * Display breadcrumbs
 */
function aetheria_breadcrumbs() {
if ( is_front_page() ) {
return;
}

$items = array();
$items[] = array(
'text' => __( 'Home', 'aetheria' ),
'url'  => home_url( '/' ),
);

if ( is_single() ) {
$post_type = get_post_type();
if ( 'post' === $post_type ) {
$items[] = array(
'text' => __( 'Blog', 'aetheria' ),
'url'  => get_permalink( get_option( 'page_for_posts' ) ),
);
} elseif ( 'portfolio' === $post_type ) {
$items[] = array(
'text' => __( 'Portfolio', 'aetheria' ),
'url'  => get_post_type_archive_link( 'portfolio' ),
);
}
$items[] = array(
'text' => get_the_title(),
'url'  => '',
);
} elseif ( is_archive() ) {
$items[] = array(
'text' => get_the_archive_title(),
'url'  => '',
);
}

$items = apply_filters( 'aetheria_breadcrumb_items', $items );

if ( empty( $items ) ) {
return;
}

echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'aetheria' ) . '">';
echo '<ol>';
foreach ( $items as $item ) {
echo '<li>';
if ( ! empty( $item['url'] ) ) {
echo '<a href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['text'] ) . '</a>';
} else {
echo '<span aria-current="page">' . esc_html( $item['text'] ) . '</span>';
}
echo '</li>';
}
echo '</ol>';
echo '</nav>';
}

/**
 * Display post meta
 */
function aetheria_post_meta() {
echo '<div class="post-meta">';

// Date
printf(
'<time datetime="%1$s">%2$s</time>',
esc_attr( get_the_date( 'c' ) ),
esc_html( get_the_date() )
);

// Author
printf(
'<span class="author">%s <a href="%s">%s</a></span>',
esc_html__( 'by', 'aetheria' ),
esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
esc_html( get_the_author() )
);

// Reading time
aetheria_reading_time();

echo '</div>';
}
