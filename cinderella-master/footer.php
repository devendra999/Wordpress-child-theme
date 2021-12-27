<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
?>
		</div><!-- #content -->
		<footer id="gl-site-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<?php
							if ( is_active_sidebar( 'footer-logo' ) ) {
								dynamic_sidebar( 'footer-logo' );
							}
						?>
						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav class="gl-site-social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
								<h5>Stay Connected</h5>
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu list-inline',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
									) );
								?>
							</nav>
						<?php endif; ?>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<?php 
							$quickLink = wp_get_nav_menu_object("Quick Links" );
							echo '<h6>'.$quickLink->name.'</h6>';
							wp_nav_menu(array( 'menu' => 'Quick Links' ) );
						?>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<?php 
							$services = wp_get_nav_menu_object("Services" );
							echo '<h6>'.$services->name.'</h6>';
							wp_nav_menu(array( 'menu' => 'Services' ) );
						?>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<?php
							if ( is_active_sidebar( 'footer-contact' ) ) {
								dynamic_sidebar( 'footer-contact' );
							}
						?>
					</div>
				</div>
			</div>
			
		</footer>
		<section id="copyright-sec">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<p class="text-center">Copyrights © 2018 Beauty Center Maria Willi.All rights reserved.</p>
						</div>
					</div>
				</div>
		</section>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
