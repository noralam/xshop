<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xshop
 */
$xhop_theme_layout = get_theme_mod('xhop_theme_layout');
$xhop_logo_position = get_theme_mod('xhop_logo_position');
$xhop_slider_text = get_theme_mod('slider_text');
$xshop_header_search  = get_theme_mod('xblog_header_search');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site x-blog">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'xshop' ); ?></a>

	<header id="masthead" class="site-header baby-head-img">
        <?php if( has_header_image() ): ?>
        <div class="header-img"> 
        <?php the_header_image_tag(); ?>
        </div>
        <?php else: ?>
        <div class="header-img"> 
        <img src="<?php echo esc_url(get_stylesheet_directory_uri().'/assets/img/header.jpg'); ?>" alt="<?php esc_attr_e('Header image','xshop'); ?>">
        </div>
        <?php endif; ?>
		<div class="baby-container site-branding <?php echo esc_attr($xhop_logo_position); ?>">
            <?php
            if(has_custom_logo()):
                the_custom_logo();
            else:
            ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
            endif;
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
		<div class="menu-bar">
			<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'baby-menu',
						'menu_class'        => 'baby-container',
					) );
				?>
				
				
			</nav><!-- #site-navigation -->	
			<?php if( !empty($xshop_header_search )): ?>
			<div class="header-search">
				<div class="search-icon"><i class="fa fa-search"></i></div>
				<div class="header-search-form">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>

		
	</header><!-- #masthead -->

	<?php if(!empty($xhop_slider_text) && is_home()): ?>
	<section class="home-feature-slider">
		<?php echo wp_kses_post(do_shortcode($xhop_slider_text)); ?>
	</section>
	<?php endif; ?>

	<div id="content" class="baby-container site-content <?php echo esc_attr($xhop_theme_layout); ?>">
