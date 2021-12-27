<?php
/*** Calling Assets ***/
add_action( 'wp_enqueue_scripts', 'cinderella_assets' );
function cinderella_assets() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'boostrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'awesome-style', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_script( 'boostrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), true  );
    wp_enqueue_style( 'lightslider', get_stylesheet_directory_uri() . '/assets/css/lightslider.css' );    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), true  );
    wp_enqueue_script( 'lightslider', get_stylesheet_directory_uri() . '/assets/js/lightslider.js', array( 'jquery' ), true  );
}
/*** Removing parent theme's default widget ***/
add_action('init','remove_parent_theme_widget');
function remove_parent_theme_widget(){
    unregister_sidebar('sidebar-1');
    unregister_sidebar('sidebar-2');
    unregister_sidebar('sidebar-3');
}
/*** Register menu for footer ***/
register_nav_menu('footer_menu_bottom', 'Footer Menu Bottom');
/*Register Sidebar*/
function wp_cinderella_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Contact', 'cinderella' ),
		'id'            => 'footer-contact',
		'description'   => esc_html__( 'Add widgets here.', 'cinderella' ),
		'before_widget' => '<section id="%1$s" class="footer-contact %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Logo', 'cinderella' ),
		'id'            => 'footer-logo',
		'description'   => esc_html__( 'Add widgets here.', 'cinderella' ),
		'before_widget' => '<section id="%1$s" class="footer-desc %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wp_cinderella_widgets_init' );
/* Add page slug in body class */
add_filter('body_class', 'cinderella_body_classes');
function cinderella_body_classes($classes) {
    global $post;
    $classes[] = 'cinderella-'.$post->post_name;
    return $classes;
}
/*** Register Testimonial CPT ***/
add_action( 'init', 'cinderella_register_testimonial' );
function cinderella_register_testimonial() {
    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
        'menu_name'          => _x( 'Testimonials', 'admin menu' ),
        'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'testimonial' ),
        'add_new_item'       => __( 'Add New Testimonial' ),
        'new_item'           => __( 'New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'view_item'          => __( 'View Testimonial' ),
        'all_items'          => __( 'All Testimonials' ),
        'search_items'       => __( 'Search Testimonials' ),
        'parent_item_colon'  => __( 'Parent Testimonials:' ),
        'not_found'          => __( 'No testimonials found.' ),
        'not_found_in_trash' => __( 'No testimonials found in Trash.' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial' ),
        'menu_icon'          => 'dashicons-format-quote',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'excerpt' )
    );
    register_post_type( 'testimonial', $args );
}
// limited code Custom post type
function doctors_post_type(){
    register_post_type('doctors',
        array(
        'labels' => array(
        'name' => __('Doctors'),
        'singular_name' => __('Doctors'),
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => array('title', 'thumbnail')
        )
    );
}
add_action('init', 'doctors_post_type');
// Add caregoris
add_action( 'init', 'dealers_taxonomy_parent' );
    function dealers_taxonomy_parent() {
        register_taxonomy(
            'doctors_type',
            array('doctors'),
            array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'doctors_type' ),
            'hierarchical' => true,
        )
    );
}
/*** Register Services CPT ***/
add_action( 'init', 'cinderella_register_services' );
function cinderella_register_services() {
    $labels = array(
        'name'               => _x( 'Services', 'post type general name' ),
        'singular_name'      => _x( 'Services', 'post type singular name' ),
        'menu_name'          => _x( 'Services', 'admin menu' ),
        'name_admin_bar'     => _x( 'Services', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Services' ),
        'add_new_item'       => __( 'Add New Services' ),
        'new_item'           => __( 'New Services' ),
        'edit_item'          => __( 'Edit Services' ),
        'view_item'          => __( 'View Services' ),
        'all_items'          => __( 'All Services' ),
        'search_items'       => __( 'Search Services' ),
        'parent_item_colon'  => __( 'Parent Services:' ),
        'not_found'          => __( 'No Services found.' ),
        'not_found_in_trash' => __( 'No Services found in Trash.' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'menu_icon'          => 'dashicons-clipboard',
        'capability_type'    => 'page',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );
    register_post_type( 'service', $args );
}
/*** Testimonial slider ***/
add_shortcode('testimonial-slider','cinderella_testimonial_slider');
function cinderella_testimonial_slider($args) { 
    ob_start();
    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'testimonial',
        'post_status'      => 'publish',
    );
$testimonials = get_posts( $args );
?>
<div class="testimonials">
    <div class="item">
        <div id="testimonials-slider" class="testimonials-slider">
            <?php foreach ($testimonials as $testimonialsData) { ?>
                <div class="testimonial-data">
                    <div class="testimonial-title">
                        <h6>"<?php echo $testimonialsData->post_title; ?>"</h6>
                    </div>
                    <div class="testimonial-meta">
                        <?php
                            $getRatings = get_field('ratings',$testimonialsData->ID);
                            for ($i=0; $i < $getRatings ; $i++) { 
                                echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            }
                            echo ' - '.$testimonialsData->post_excerpt;
                        ?>
                    </div>
                    <div class="testimonial-content"><p><?php echo $testimonialsData->post_content; ?></p></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php return ob_get_clean(); }
/*** Programs & Services ***/
add_shortcode('services','cinderella_services_shortcode');
function cinderella_services_shortcode($args) { 
    ob_start();
    $ArgsServices = array(
        'posts_per_page'   => -1,
        'post_type'        => 'service',
        'post_status'      => 'publish',
        );
    $services = get_posts( $ArgsServices ); ?>
    <div class="vc_row wpb_row vc_inner vc_row-fluid">
        <?php foreach ($services as $servicesData) { ?>
            <div class="vc_col-sm-4">
                <div class="back-imag">
                    <div class="service-hover">
                        <?php $service_back_image = get_field('service_back_image',$servicesData->ID); ?>
                        <img src="<?php echo $service_back_image['url']; ?>" alt="<?php echo $service_back_image['alt'] ?>" />
                    </div>
                    <div class="service-block">
                        <div class="img-border">
                            <?php $bannerimage = get_field('service_icon',$servicesData->ID); ?>
                            <img src="<?php echo $bannerimage['url']; ?>" alt="<?php echo $service_back_image['alt'] ?>" />
                        </div>
                        <h3><?php echo get_the_title($servicesData->ID);?></h3>
                        <p><?php echo get_the_excerpt($servicesData->ID);?></p>
                        <a class="view-more-btn" href="<?php echo get_permalink($servicesData->ID); ?>">view more <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div> 
        <?php } ?> 
    </div>
<?php return ob_get_clean(); }
/*** What we do child pages block images ***/
function cinderella_resize_images() {
    add_image_size( 'latest-post', 360, 160, true );
}
/*** Latest 3 posts on homepage ***/
add_shortcode('latestposts','cinderella_latest_posts');
function cinderella_latest_posts(){ 
    ob_start();
$latestPostArgs = array(
    'posts_per_page'   => 3,
    'post_type'        => 'post',
    'post_status'      => 'publish',
);
$latestPost = get_posts( $latestPostArgs );
?>
<div class="latest-posts">
    <div class="vc_row wpb_row vc_inner vc_row-fluid">
        <?php foreach ($latestPost as $latestPostData) { ?>
            <div class="vc_col-sm-4">
                <div class="post-block">
                    <?php
                        if(has_post_thumbnail($latestPostData->ID)) { 
                            echo get_the_post_thumbnail($latestPostData->ID,'latest-post');
                        } else { 
                            echo '<img src="'.site_url().'/wp-content/uploads/2018/06/blog-01.jpg">';
                        }
                     ?>
                    <div class="date-info-sec">
                        <div class="date">
                            <h3><?php echo date('M j', strtotime($latestPostData->post_date)); ?></h3>
                        </div>
                         <div class="newpost">
                            <?php echo $latestPostData->post_title; ?>
                        </div>
                        <div class="mover-destials">
                             <a href=<?php echo get_permalink($latestPostData->ID); ?>>More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php return ob_get_clean(); }
/*** Gravity Form hide label option ***/
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
/*** Changing admin view ***/
add_action( 'login_enqueue_scripts', 'cinderlla_admin_logo' );
function cinderlla_admin_logo() { ?>
<style type="text/css">
     body.login{
          background-image: url("<?php echo site_url() ?>/wp-content/uploads/2018/06/Home-banner1.jpg");
          background-size: cover;
        }
        body.login div#login h1 a {
          background-image: url("<?php echo site_url() ?>/wp-content/uploads/2018/06/admin-logo.png");
          background-size: contain;
          width: auto;
          height: 130px;
        }
        body.login div#login h1 a:focus {
            color: #c1e3eb;
            box-shadow: none;
        }
        body.login form {
            background:#363636;
        }
        body.login #backtoblog a, body.login #nav a {
            color: #fff;
            text-decoration: none;
        }
        body.login label {
          color: #ffffff;
          font-size: 14px;
        }
        body.login #login_error, body.login .message {
            background-color:#EC181F;
            border-color: #211E1F; 
            color:#ffffff;
        }
        body.login #wp-submit {
          background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
          border-color: #ffffff;
          text-shadow: unset;
        }
</style> 
<?php 
}
add_filter( 'login_headertitle', 'cinderlla_logo_title_attr' );
function cinderlla_logo_title_attr() {
  return 'Powered by Cinderella Coiffure';
}
add_filter( 'login_headerurl', 'cinderlla_logo_url' );
function cinderlla_logo_url() {
  return home_url();
}
