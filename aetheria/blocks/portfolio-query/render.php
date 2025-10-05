<?php
/**
 * Portfolio Query Block Render
 *
 * @package Aetheria
 * @since 1.0.0
 */

$category = isset( $attributes['category'] ) ? sanitize_text_field( $attributes['category'] ) : '';
$limit = isset( $attributes['limit'] ) ? absint( $attributes['limit'] ) : 6;
$columns = isset( $attributes['columns'] ) ? absint( $attributes['columns'] ) : 3;
$show_filters = isset( $attributes['showFilters'] ) ? (bool) $attributes['showFilters'] : false;
$order_by = isset( $attributes['orderBy'] ) ? sanitize_text_field( $attributes['orderBy'] ) : 'date';
$order = isset( $attributes['order'] ) ? sanitize_text_field( $attributes['order'] ) : 'DESC';

$args = array(
'post_type'      => 'portfolio',
'posts_per_page' => $limit,
'orderby'        => $order_by,
'order'          => $order,
);

if ( $category ) {
$args['tax_query'] = array(
array(
'taxonomy' => 'portfolio_category',
'field'    => 'slug',
'terms'    => $category,
),
);
}

$args = apply_filters( 'aetheria_portfolio_query_args', $args );
$query = new WP_Query( $args );

?>
<div class="aetheria-portfolio-query">
<?php if ( $show_filters ) : ?>
<nav class="portfolio-filters" role="toolbar">
<button class="filter-btn" data-filter="*" aria-pressed="true">
<?php echo esc_html__( 'All', 'aetheria' ); ?>
</button>
<?php
$terms = get_terms( array( 'taxonomy' => 'portfolio_category' ) );
foreach ( $terms as $term ) :
?>
<button class="filter-btn" data-filter="<?php echo esc_attr( $term->slug ); ?>" aria-pressed="false">
<?php echo esc_html( $term->name ); ?>
</button>
<?php endforeach; ?>
</nav>
<?php endif; ?>

<div class="portfolio-grid" style="grid-template-columns: repeat(<?php echo esc_attr( $columns ); ?>, 1fr);">
<?php
if ( $query->have_posts() ) :
while ( $query->have_posts() ) :
$query->the_post();
?>
<article class="portfolio-card">
<?php if ( has_post_thumbnail() ) : ?>
<div class="portfolio-card__image">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'large' ); ?>
</a>
</div>
<?php endif; ?>
<div class="portfolio-card__content">
<h3 class="portfolio-card__title">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h3>
<?php
$terms = get_the_terms( get_the_ID(), 'portfolio_category' );
if ( $terms ) :
?>
<div class="portfolio-card__meta">
<?php
foreach ( $terms as $term ) {
echo '<span class="portfolio-card__category">' . esc_html( $term->name ) . '</span>';
}
?>
</div>
<?php endif; ?>
</div>
</article>
<?php
endwhile;
wp_reset_postdata();
else :
?>
<p><?php echo esc_html__( 'No portfolio items found.', 'aetheria' ); ?></p>
<?php endif; ?>
</div>
</div>
