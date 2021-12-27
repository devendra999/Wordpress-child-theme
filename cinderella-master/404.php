<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */
get_header(); ?>

<div class="container">
    <div class="row">
        <main id="main" class="site-main" role="main">
            <section class="error-404 not-found">
                <h1>404</h1>
                <h4>Page Not Found</h4>
                <h6>Please continue browsing!</h6>
                <p>Check out our <a href="<?php echo site_url(); ?>/sitemap">site map</a> to find just what you're looking for or start over on our <a href="<?php echo site_url(); ?>">home page</a>. <br /> We apologize for the inconvenience!</p>
            </section>
        </main>
    </div>
</div>

<?php
get_footer();
