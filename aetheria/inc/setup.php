<?php
/**
 * Theme Setup
 *
 * @package Aetheria
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

/**
 * Setup theme features and support
 */
function aetheria_setup() {
// Make theme available for translation
load_theme_textdomain( 'aetheria', AETHERIA_DIR . '/languages' );

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Let WordPress manage the document title
add_theme_support( 'title-tag' );

// Enable support for Post Thumbnails
add_theme_support( 'post-thumbnails' );

// Enable support for responsive embeds
add_theme_support( 'responsive-embeds' );

// Add support for editor styles
add_theme_support( 'editor-styles' );

// Enqueue editor styles
add_editor_style( 'assets/css/editor.css' );

// Add support for custom logo
add_theme_support(
'custom-logo',
array(
'height'      => 100,
'width'       => 400,
'flex-height' => true,
'flex-width'  => true,
)
);

// Add support for wide and full alignment
add_theme_support( 'align-wide' );

// Add support for custom line height
add_theme_support( 'custom-line-height' );

// Add support for custom spacing
add_theme_support( 'custom-spacing' );

// Add support for custom units
add_theme_support( 'custom-units' );

// Add support for link color
add_theme_support( 'link-color' );

// Add support for block styles
add_theme_support( 'wp-block-styles' );

// Register navigation menus
register_nav_menus(
array(
'primary' => esc_html__( 'Primary Menu', 'aetheria' ),
'footer'  => esc_html__( 'Footer Menu', 'aetheria' ),
)
);

// Add support for HTML5 markup
add_theme_support(
'html5',
array(
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
'style',
'script',
)
);

// Add theme support for selective refresh for widgets
add_theme_support( 'customize-selective-refresh-widgets' );

// Add support for Block Templates
add_theme_support( 'block-templates' );

// Add support for appearance tools
add_theme_support( 'appearance-tools' );
}
