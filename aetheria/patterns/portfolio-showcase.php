<?php
/**
 * Title: Portfolio Showcase
 * Slug: aetheria/portfolio-showcase
 * Categories: aetheria
 *
 * @package Aetheria
 * @since 1.0.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="has-text-align-center">Recent Work</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">Explore our latest projects and case studies</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:aetheria/portfolio-query {"limit":6,"columns":3,"showFilters":true} /-->
</div>
<!-- /wp:group -->
