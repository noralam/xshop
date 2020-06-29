<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xshop
 */
$x_shop_categories_list = get_the_category_list( esc_html__( ' / ', 'xshop' ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_post_thumbnail()): ?>
        <div class="baby-feature-image"> 
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="top-cat post-meta">
			<i class="fa fa-folder"></i>
			<?php echo wp_kses_post( $x_shop_categories_list ); ?>
		</div>
		<?php endif; ?>
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta post-meta">
			<?php x_shop_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
        if( !is_single() ){ 
            the_excerpt(); ?>
            <div class="redmore-btn"> <a href="<?php the_permalink( ); ?>" class="more-link" rel="bookmark"> <?php esc_html_e('Continue Reading ..','xshop') ?></a></div>
           
       <?php
        }else{ 
            the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xshop' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
        }
			

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xshop' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
