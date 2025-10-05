<?php
/**
 * Newsletter Block Render
 *
 * @package Aetheria
 * @since 1.0.0
 */

$heading = isset( $attributes['heading'] ) ? sanitize_text_field( $attributes['heading'] ) : '';
$description = isset( $attributes['description'] ) ? sanitize_text_field( $attributes['description'] ) : '';
$button_text = isset( $attributes['buttonText'] ) ? sanitize_text_field( $attributes['buttonText'] ) : 'Subscribe';
$placeholder = isset( $attributes['placeholder'] ) ? sanitize_text_field( $attributes['placeholder'] ) : 'Your email';
$success_msg = isset( $attributes['successMessage'] ) ? sanitize_text_field( $attributes['successMessage'] ) : 'Successfully subscribed!';
$error_msg = isset( $attributes['errorMessage'] ) ? sanitize_text_field( $attributes['errorMessage'] ) : 'An error occurred.';

?>
<div class="aetheria-newsletter">
<?php if ( $heading ) : ?>
<h2 class="newsletter__heading"><?php echo esc_html( $heading ); ?></h2>
<?php endif; ?>

<?php if ( $description ) : ?>
<p class="newsletter__description"><?php echo esc_html( $description ); ?></p>
<?php endif; ?>

<form class="newsletter-form" data-success="<?php echo esc_attr( $success_msg ); ?>" data-error="<?php echo esc_attr( $error_msg ); ?>">
<div class="newsletter__fields">
<input 
type="email" 
name="email" 
placeholder="<?php echo esc_attr( $placeholder ); ?>" 
required 
aria-label="<?php echo esc_attr__( 'Email address', 'aetheria' ); ?>"
/>
<button type="submit" class="wp-block-button__link">
<?php echo esc_html( $button_text ); ?>
</button>
</div>
<label class="newsletter__consent">
<input type="checkbox" name="consent" required />
<?php echo esc_html__( 'I consent to receive newsletter emails', 'aetheria' ); ?>
</label>
<div class="newsletter__message" role="alert" aria-live="polite"></div>
</form>
</div>
