<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xshop
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php woocommerce_content(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php if ( is_active_sidebar( 'shop-sidebar' ) ): ?>
<aside id="secondary" class="widget-area shop-sidebar">
	<?php dynamic_sidebar( 'shop-sidebar' ); ?>
</aside><!-- #secondary -->
<?php
endif;
get_footer();
