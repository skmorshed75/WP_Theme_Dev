<?php

require_once get_theme_file_path( "/library/csf/cs-framework.php" ); //Class 2.5
require_once get_theme_file_path( "/inc/metaboxes/sections.php" ); //class 2.7
require_once get_theme_file_path( "/inc/metaboxes/banner.php" ); //class 2.8
require_once get_theme_file_path( "/inc/metaboxes/mission.php" ); //2.13
require_once get_theme_file_path( "/inc/metaboxes/features.php" ); //2.14
require_once get_theme_file_path( "/inc/metaboxes/about.php" ); //2.15
require_once get_theme_file_path( "/inc/metaboxes/services.php" ); //2.16
require_once get_theme_file_path( "/inc/metaboxes/benefits.php" ); //2.17
require_once get_theme_file_path( "/inc/metaboxes/testimonials.php" ); //2.18
require_once get_theme_file_path( "/inc/metaboxes/image_info.php" ); //2.19
require_once get_theme_file_path( "/inc/metaboxes/counter.php" ); //2.20
require_once get_theme_file_path( "/inc/metaboxes/cta.php" ); //2.21
require_once get_theme_file_path( "/inc/metaboxes/team.php" ); //2.22
require_once get_theme_file_path( "/inc/metaboxes/portfolio.php" ); //2.23
require_once get_theme_file_path( "/inc/metaboxes/pricing.php" ); //2.24
require_once get_theme_file_path( "/inc/metaboxes/shop.php" ); //2.26
require_once get_theme_file_path( "/inc/metaboxes/clients.php" ); //2.29
require_once get_theme_file_path( "/inc/metaboxes/subscription.php" ); //2.30
require_once get_theme_file_path( "/inc/metaboxes/page-sections.php" ); //class 2.9

// active modules
define( 'CS_ACTIVE_FRAMEWORK', false );
define( 'CS_ACTIVE_METABOX', true );
define( 'CS_ACTIVE_TAXONOMY', false );
define( 'CS_ACTIVE_SHORTCODE', false );
define( 'CS_ACTIVE_CUSTOMIZE', false );
define( 'CS_ACTIVE_LIGHT_THEME', false );
//Class 2.5

//Class 2.2
function mark_theme_setup() {
    load_theme_textdomain( 'mark', get_template_directory_uri() . "/languages" );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tags' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'gallery',
        'caption',
        'comment-list',
    ) );
    add_theme_support( 'custom-logo' );
    register_nav_menu( "top-menu", __( "Top Menu", "Mark" ) );

    add_image_size( 'mark_fullsize', 1400, 9999 ); //Class 2.12
    add_image_size( 'mark_landscape_one', 583, 383, true ); //Class 2.27
    add_image_size( 'mark-logo', 190, 9999 ); //Class 2.28
}
add_action( 'after_setup_theme', 'mark_theme_setup' );

//Class 2.2

define( "VERSION", time() );
define( "ASSETS_DIR", get_template_directory_uri() . "/assets/" );

function mark_assets() {
    $css_files = array(
        "google-fonts-css"   => "//fonts.googleapis.com/css?family=Cabin|Open+Sans:300,400,600,700",
        "font-awesome-css"   => ASSETS_DIR . "vendor/font-awesome/css/font-awesome.min.css",
        "bootstrap-css"      => ASSETS_DIR . "vendor/bootstrap/css/bootstrap.min.css",
        "bicon-css"          => ASSETS_DIR . "vendor/bicon/css/bicon.css",
        "owl-carousel-css"   => ASSETS_DIR . "vendor/owl/assets/owl.carousel.min.css",
        "owl-theme-css"      => ASSETS_DIR . "vendor/owl/assets/owl.theme.default.min.css",
        "magnific-popup-css" => ASSETS_DIR . "vendor/magnific-popup/magnific-popup.css",
        "animate-css"        => ASSETS_DIR . "vendor/animate.css",
        "main-css"           => ASSETS_DIR . "css/main.css",
    );

    foreach ( $css_files as $handle => $css_file ) {
        wp_enqueue_style( $handle, $css_file, null, VERSION );
    }
    wp_enqueue_style( 'mark-css', get_stylesheet_uri(), null, VERSION );

    $js_files = array(
        "bootstrap-js"      => array( 'src' => ASSETS_DIR . "vendor/bootstrap/js/bootstrap.min.js", 'dep' => array( 'jquery' ) ),
        "owl-carousel-js"   => array( 'src' => ASSETS_DIR . "vendor/owl/owl.carousel.min.js", 'dep' => array( 'jquery' ) ),
        "magnific-popup-js" => array( 'src' => ASSETS_DIR . "vendor/magnific-popup/jquery.magnific-popup.min.js", 'dep' => array( 'jquery' ) ),
        "wow-js"            => array( 'src' => ASSETS_DIR . "vendor/wow.min.js", 'dep' => array( 'jquery' ) ),
        "visible-js"        => array( 'src' => ASSETS_DIR . "vendor/visible.js", 'dep' => array( 'jquery' ) ),
        "animate-number-js" => array( 'src' => ASSETS_DIR . "vendor/jquery.animateNumber.min.js", 'dep', array( 'jquery' ) ),
        "isotope-js"        => array( 'src' => ASSETS_DIR . "vendor/jquery.isotope.js", 'dep' => '' ),
        "imageloaded-js"    => array( 'src' => ASSETS_DIR . "vendor/imagesloaded.js", 'dep' => '' ),
        "script-js"         => array( 'src' => ASSETS_DIR . "js/scripts.js", 'dep' => array( 'jquery' ) ),
    );
    foreach ( $js_files as $handle => $js_file ) {
        wp_enqueue_script( $handle, $js_file['src'], isset( $js_file['dep'] ) ? $js_file['dep'] : null, VERSION, true );
    }
}
add_action( 'wp_enqueue_scripts', 'mark_assets' );

//Class 2.7
function mark_csf_init() {
    CSFramework_Metabox::instance( array() );
}
add_action( 'init', 'mark_csf_init' );
//End Class 2.7

//class 2.22
function mark_get_social_fields() {
    $fields = array();
    $social_profiles = apply_filters( 'mark_social_profiles', array( 'facebook', 'twitter', 'youtube' ) );
    foreach ( $social_profiles as $social_profile ) {
        $field = array(
            'id'    => $social_profile,
            'type'  => 'text',
            'title' => ucfirst( $social_profile ),
        );
        array_push( $fields, $field );
    }
    return $fields;
}

//Class 2.22 - Add Social Profile Field
function mark_social_profile_fields( $profiles ) {
    array_push( $profiles, 'rss' );
    return $profiles;
}
add_filter( 'mark_social_profiles', 'mark_social_profile_fields' );

//Class 2.32
function mark_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Section', 'mark' ),
        'id'            => 'footer-left',
        'description'   => __( 'Footer Section, Left Side', 'mark' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'mark_widgets_init' );