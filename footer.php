<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xshop
 */


?>

	</div><!-- #content -->
    <?php if(is_dynamic_sidebar('footer-widget')): ?>
    <div class="footer-widget-area"> 
        <div class="baby-container widget-footer"> 
            <?php dynamic_sidebar('footer-widget'); ?>
        </div>
    </div>
    <?php endif; ?>
	<footer id="colophon" class="site-footer footer-display">
		<div class="baby-container site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'xshop' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'xshop' ), 'WordPress' );
				?></a>
				<span class="sep"> | </span>
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s', 'xshop' ), 'X shop', 'Noor Alam' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
	<?php
		if ( function_exists( 'x_shop_woocommerce_header_cart' ) ) {
			x_shop_woocommerce_header_cart();
		}
	?>
<?php wp_footer(); ?>

</body>
</html>
