<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _svbk
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrap">
			<?php
			$footer_logo = get_theme_mod( 'footer_logo', '' );
			$company_name = get_theme_mod( 'company_name', false );
			$company_info = get_theme_mod( 'company_info', false );
			if ( ($footer_logo || $company_name) || $company_info || is_active_sidebar( 'footer' ) ) :	?>
			<div class="footer-section">
				<?php if ( $footer_logo ) : ?>
				<figure class="footer__custom-logo">
				<?php echo wp_get_attachment_image( $footer_logo, 'small'); ?>
				</figure>
				<?php else: ?>
				<h3 class="company-name"><?php echo $company_name; ?></h3>
				<?php endif; ?>
				<?php if ( $company_info ) : ?>
				<p><?php echo nl2br($company_info); ?></p>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer' ) ): ?>
				<aside class="site-footer__widgets widget-area">
					<?php dynamic_sidebar( 'footer' ); ?>			
				</aside>
				<?php endif; ?>					
			</div>
			<?php endif ?>

			<div id="contacts" class="footer-section footer-section--contacts">
				<h3 class="footer-section__title"><?php _e('Contacts', '_svbk') ?></h3>
				<ul>
					<?php if ( get_theme_mod( 'company_phone', false ) ) : ?>
					<li><?php _e('Tel', '_svbk'); ?>:&nbsp;<a href="tel:<?php echo get_theme_mod( 'company_phone' ); ?>"><?php echo get_theme_mod( 'company_phone' ); ?></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'company_email', false ) ) : ?>
					<li><?php _e('E-mail', '_svbk'); ?>:&nbsp;<a href="mailto:<?php echo get_theme_mod( 'company_email' ); ?>"><?php echo get_theme_mod( 'company_email' ); ?></a></li>
					<?php endif; ?>		
				</ul>
			</div>
			
			<?php if ( get_theme_mod( 'company_opening_hours', false ) ) : ?>
			<div id="opening-hours" class="footer-section footer-section--opening-hours">
				<h3 class="footer-section__title"><?php _e('Opening Hours', '_svbk') ?></h3>
				<p><?php echo nl2br( get_theme_mod( 'company_opening_hours' ) ); ?></p>
			</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'company_address', false ) ) : ?>
			<div id="address" class="footer-section footer-section--address">
				<h3 class="footer-section__title"><?php _e('Address', '_svbk') ?></h3>
				<p><?php echo nl2br( get_theme_mod( 'company_address' ) ); ?></p>
			</div>
			<?php endif; ?>
		</div>
		
		<div id="legal" class="site-footer__bar bar sub-footer">
			<dl>
				<dt>&copy;</dt>
				<dd><?php echo date( 'Y' ); ?></dd>
				
				<?php if ( get_theme_mod( 'company_name', false ) ) : ?>
				<dt class="screen-reader-text"><?php _e('Company Name', '_svbk'); ?></dt>
				<dd><?php echo get_theme_mod( 'company_name' ); ?></dd>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'company_vat', false ) ) : ?>
				<dt><?php _e('VAT', '_svbk'); ?></dt>
				<dd><?php echo get_theme_mod( 'company_vat' ); ?></dd>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'company_rea', false ) ) : ?>
				<dt><?php _e('REA', '_svbk'); ?></dt>
				<dd><?php echo get_theme_mod( 'company_rea' ); ?></dd>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'company_certified_email', false ) ) : ?>
				<dt><?php _e('Certified e-mail', '_svbk'); ?></dt>
				<dd><?php echo get_theme_mod( 'company_certified_email' ); ?></dd>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'company_share_capital', false ) ) : ?>
				<dt><?php _e('Share Capital', '_svbk'); ?></dt>
				<dd><?php echo get_theme_mod( 'company_share_capital' ); ?></dd>
				<?php endif; ?>
			</dl>

			<?php if ( has_nav_menu( 'legal-menu' ) ) : ?>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'legal-menu',
						'menu_id'        => 'legal-menu',
					)
				);
			?>
			<?php else : ?>
				<ul id="legal-menu" class="menu">
					<?php the_privacy_policy_link( '<li class="menu-item">', '</li>' ); ?>
					<?php the_cookie_policy_link( '<li class="menu-item">', '</li>' ); ?>
				</ul>
			<?php endif; ?>
		</div>
		
		<?php if ( get_theme_mod( 'fixed_footer_bar' ) ) : ?>
		<div class="site-footer__bar bar bar--fixed footer-fixed-bar">
			<?php echo do_shortcode( get_theme_mod( 'fixed_footer_bar_content', __( 'Customize this text in Theme Customizer', '_svbk' ) ) ); ?>
		</div>
		<?php endif ?>
		
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
