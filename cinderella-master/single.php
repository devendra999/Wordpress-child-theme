<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<div id="accel-main-content" class="accel-content-area">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>">
						<div class="accel-wrap">
							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</div><!-- .wrap -->
					</article><!-- #post-## -->
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div><!-- #primary -->
<?php get_footer();
