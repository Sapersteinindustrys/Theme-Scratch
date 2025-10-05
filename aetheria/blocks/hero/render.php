<?php
/**
 * Hero Block Render
 *
 * @package Aetheria
 * @since 1.0.0
 */

// Sanitize attributes
$heading = isset( $attributes['heading'] ) ? wp_kses_post( $attributes['heading'] ) : '';
$subheading = isset( $attributes['subheading'] ) ? wp_kses_post( $attributes['subheading'] ) : '';
$media_id = isset( $attributes['mediaID'] ) ? absint( $attributes['mediaID'] ) : 0;
$media_alt = isset( $attributes['mediaAlt'] ) ? esc_attr( $attributes['mediaAlt'] ) : '';
$overlay_opacity = isset( $attributes['overlayOpacity'] ) ? max( 0, min( 1, floatval( $attributes['overlayOpacity'] ) ) ) : 0.4;
$alignment = isset( $attributes['alignment'] ) && in_array( $attributes['alignment'], array( 'left', 'center', 'right' ), true ) ? $attributes['alignment'] : 'center';
$cta_text = isset( $attributes['ctaText'] ) ? sanitize_text_field( $attributes['ctaText'] ) : '';
$cta_url = isset( $attributes['ctaUrl'] ) ? esc_url( $attributes['ctaUrl'] ) : '';
$height = isset( $attributes['height'] ) && in_array( $attributes['height'], array( 'short', 'medium', 'tall' ), true ) ? $attributes['height'] : 'medium';
$variant = isset( $attributes['variant'] ) && in_array( $attributes['variant'], array( 'light', 'dark', 'gradient' ), true ) ? $attributes['variant'] : 'light';

// Build classes
$classes = array(
'aetheria-hero',
'hero--variant-' . $variant,
'hero--height-' . $height,
'hero--align-' . $alignment,
);

if ( ! empty( $block['className'] ) ) {
$classes[] = $block['className'];
}

// Get media URL
$media_url = '';
if ( $media_id ) {
$media_url = wp_get_attachment_image_url( $media_id, 'full' );
}

?>
<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
<?php if ( $media_url ) : ?>
<div class="hero__media" role="img" aria-label="<?php echo esc_attr( $media_alt ); ?>">
<img src="<?php echo esc_url( $media_url ); ?>" alt="<?php echo esc_attr( $media_alt ); ?>" />
<div class="hero__overlay" style="opacity: <?php echo esc_attr( $overlay_opacity ); ?>"></div>
</div>
<?php endif; ?>

<div class="hero__content">
<?php if ( $heading ) : ?>
<h1 class="hero__heading"><?php echo wp_kses_post( $heading ); ?></h1>
<?php endif; ?>

<?php if ( $subheading ) : ?>
<p class="hero__subheading"><?php echo wp_kses_post( $subheading ); ?></p>
<?php endif; ?>

<?php if ( $cta_text && $cta_url ) : ?>
<div class="hero__cta">
<a href="<?php echo esc_url( $cta_url ); ?>" class="wp-block-button__link">
<?php echo esc_html( $cta_text ); ?>
</a>
</div>
<?php endif; ?>
</div>
</div>
