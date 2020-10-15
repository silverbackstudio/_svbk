<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _svbk
 */

use \Svbk\WP\Helpers;

?>
<!doctype html>
<html <?php language_attributes(); ?><?php echo Helpers\Html\Element::attributes( apply_filters( '_svbk_html_attributes', [ 'class' => [] ] ) ); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_svbk' ); ?></a>
		
		<header id="masthead" class="site-header" role="banner">
		
			<?php if ( get_theme_mod( 'header_top_bar' ) || function_exists( '_svbk_woocommerce_header_cart' ) ) : ?>
			<div class="top-header">
				<div class="wrap">
					<?php if ( get_theme_mod( 'company_phone', false ) || get_theme_mod( 'company_email', false ) ) : ?>
					<div class="top-header__left">
						<?php if ( get_theme_mod( 'company_phone', false ) ) : ?>
						<span class="company-phone"><a href="tel:<?php echo get_theme_mod( 'company_phone' ); ?>"><?php echo get_theme_mod( 'company_phone' ); ?></a></span>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'company_email', false ) ) : ?>
						<span class="company-email"><a href="mailto:<?php echo get_theme_mod( 'company_email' ); ?>"><?php echo get_theme_mod( 'company_email' ); ?></a></span>
						<?php endif; ?>
					</div>
					<? endif; ?>
					<?php if ( get_theme_mod( 'company_opening_hours', false ) || function_exists( '_svbk_woocommerce_header_cart' ) ) : ?>
					<div class="top-header__right">
						<?php if ( function_exists( 'sensei_user_login_url' ) ) : ?>
							<a class="login" href="<?php echo sensei_user_login_url() ?>"><?php esc_html_e('Login', '_svbk') ?></a>
						<?php elseif ( function_exists( '_svbk_myaccount_sidebar_profile' ) ) :
							_svbk_myaccount_sidebar_profile();
						elseif ( get_theme_mod( 'company_opening_hours', false ) ) : ?>
							<span class="company-opening-hours"><?php echo get_theme_mod( 'company_opening_hours' ); ?></span>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif ?>
		
			<div class="wrap">
				
				<div class="site-branding">
				
					<?php the_custom_logo(); ?>
				
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
				
					<?php
					$_svbk_description = get_bloginfo( 'description', 'display' );
					if ( $_svbk_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $_svbk_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
					
				</div><!-- .site-branding -->
	
				<button class="main-navigation-toggle" aria-controls="main-navigation" aria-expanded="false">
					<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', '_svbk' ); ?></span>
				</button>
			
				<div id="main-navigation">

					<?php if ( has_nav_menu( 'sensei-menu' ) ) : ?>
					<nav id="site-navigation" role="navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'sensei-menu',
									'menu_id'        => 'sensei-menu',
								)
							);
						?>
					</nav><!-- #site-navigation -->
					<?php endif; ?>
					
					<?php if ( has_nav_menu( 'language' ) ) : ?>
					<nav id="language-navigation" role="navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'language',
									'menu_id'        => 'language-menu',
								)
							);
						?>
					</nav><!-- #language-navigation -->
					<?php endif; ?>					
					
				</div>
			
			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">
