<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xshop
 */
$x_shop_categories_list = get_the_category_list( esc_html__( ' / ', 'xshop' ) );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="top-cat post-meta">
			<i class="fa fa-folder"></i>
			<?php echo wp_kses_post( $x_shop_categories_list ); ?>
		</div>
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php x_blog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<div class="redmore-btn"> <a href="<?php the_permalink( ); ?>" class="more-link" rel="bookmark"> <?php esc_html_e('Continue Reading ..','xshop') ?></a></div>
	</div><!-- .entry-summary -->

	<?php 	wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xshop' ),
				'after'  => '</div>',
			) ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
