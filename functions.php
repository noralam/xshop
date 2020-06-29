<?php 
/*This file is part of X blog child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
function x_shop_fonts_url() {
	$fonts_url = '';

		$font_families = array();

		$font_families[] = 'ource+Sans+Pro:400,600';
		$font_families[] = 'Oswald:400,600,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );


	return esc_url_raw( $fonts_url );
}


function x_shop_enqueue_child_styles() {
	wp_enqueue_style( 'xbloglite-google-font', x_shop_fonts_url(), array(), null );
	wp_enqueue_style( 'xshop-parent-style', get_template_directory_uri() . '/style.css',array('slicknav','xblog-google-font', 'xblog-style'), '', 'all');
   wp_enqueue_style( 'bootstrap',get_stylesheet_directory_uri() . '/assets/css/bootstrap.css',array(), '4.4.1', 'all');
   wp_enqueue_style( 'xshop-main',get_stylesheet_directory_uri() . '/assets/css/main.css',array(), '', 'all');

   	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.4.1', true );

  
}
add_action( 'wp_enqueue_scripts', 'x_shop_enqueue_child_styles');



if ( ! function_exists( 'x_shop_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function x_shop_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'xshop' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'xshop' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on"><i class="fa fa-clock-o"></i>' . $posted_on . '</span><span class="byline"> <i class="fa fa-user-circle"></i>' . $byline . '</span>'; // WPCS: XSS OK.

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"><i class="fa fa-comment"></i> ';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'comment <span class="screen-reader-text"> on %s</span>', 'xshop' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

	}
endif;



/**
 * Load theme recomended plguin
 */

 require_once trailingslashit( get_stylesheet_directory() ).'inc/recomended-plugin.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
 require_once trailingslashit( get_stylesheet_directory() ).'inc/xshop-woocommerce.php';
}
