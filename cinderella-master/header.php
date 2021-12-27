<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="gl-site-page" class="gl-site">
	<header id="gl-site-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="gl-site-logo">
						<?php the_custom_logo(); ?>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9">
					<div class="pull-right"><?php echo do_shortcode('[responsive_menu]'); ?></div>
					<?php if ( has_nav_menu( 'top' ) ) : ?>
						<div  id="site-navigation" class="gl-site-main-menu main-navigation" role="navigation">
								<?php wp_nav_menu( array(
								'theme_location' => 'top',
								'menu_id'        => 'top-menu',
								'menu_class'        => 'main-navigation',
							) ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
			echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
			echo '<div class="gl-site-tagline">';
				echo '<div class="container">';
					echo '<div class="row">';
						echo '<div class="col-sm-12 text-center">';
							echo the_title('<h1>','</h1>');
							echo '<p>'.get_field('banner_tagline',get_the_ID()).'</p>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>
	<?php if (!is_front_page()) { ?>
		<div class="acce-breadcrumbs">
		    <div class="container">
		        <div class="row">
		            <div class="col-sm-12">
		            	<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
		            </div>
		        </div>
		    </div>
		</div>
	<?php } ?>
	<div class="gl-site-data">
		<div id="gl-site-content">



<!-- MODEL BOX -->
<div class="gl-gform-popup">
<div class="modal fade" id="appointment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
        </div>
      </div>
    </div>
  </div>
 </div>