<?php
require_once get_theme_file_path( "/inc/tgm.php" ); //Class 2.34
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

define( "VERSION", time() );
define( "ASSETS_DIR", get_template_directory_uri() . "/assets/" );

if ( !defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

if ( !function_exists( 'mark_blog_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function mark_blog_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on theme-blog, use a find and replace
         * to change 'theme-blog' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'theme-blog', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'mark_blog_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'custom-logo' );
        register_nav_menu( "top-menu", __( "Top Menueeee", "Mark" ) );
        register_nav_menu( "footer-menu", __( "Footer Right Menu", "Mark" ) );

        add_image_size( 'mark_fullsize', 1400, 9999 ); //Class 2.12
        add_image_size( 'mark_landscape_one', 583, 383, true ); //Class 2.27
        add_image_size( 'mark-logo', 190, 9999 ); //Class 2.28
    }
endif;
add_action( 'after_setup_theme', 'mark_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mark_blog_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'mark_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'mark_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mark_blog_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'theme-blog' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'theme-blog' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar( array(
        'name'          => __( 'Footer Section', 'mark' ),
        'id'            => 'footer-left',
        'description'   => __( 'Footer Section, Left Side', 'mark' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ) );

    //Class 2.34
    register_sidebar( array(
        'name'          => __( 'Footer Middle Section', 'mark' ),
        'id'            => 'footer-middle',
        'description'   => __( 'Footer Section, Middle Side', 'mark' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ) );

    //Class 2.34
    register_sidebar( array(
        'name'          => __( 'Footer Right Section', 'mark' ),
        'id'            => 'footer-right',
        'description'   => __( 'Footer Section, Right Side', 'mark' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'mark_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mark_blog_scripts() {
    wp_enqueue_style( 'theme-blog-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'theme-blog-style', 'rtl', 'replace' );

    wp_enqueue_script( 'theme-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'mark_blog_scripts' );

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

//Class 2.34 to remove wordpress auto image srcset (image size 75px to 50px)
add_filter( 'wp_calculate_image_srcset_meta', '__return_empty_array' );

//Class 2.34 add CSS class in the widget
function mark_widget_nav_menu_args( $nav_menu_args, $nav_menu, $args, $instance ) {
    if ( isset( $nav_menu_args['menu_class'] ) ) {
        $nav_menu_args['menu_class'] .= ' list-unstyled short-links';
    } else {
        $nav_menu_args['menu_class'] = 'list-unstyled short-links';
    }
    return $nav_menu_args;
}
add_filter( 'widget_nav_menu_args', 'mark_widget_nav_menu_args', 10, 4 );

//Class 2.35 AddClass in li menu
function mark_menu_filter( $classes, $item, $args ) {
    if ( isset( $args->theme_location ) ) {
        if ( 'top-menu' == $args->theme_location ) {
            $classes[] = 'nav-item';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'mark_menu_filter', 10, 3 );

//Class 2.35
function mark_change_nav_menu( $menus ) {
    $string_to_replace = home_url( "/" ) . "section/";
    if ( is_front_page() ) {
        foreach ( $menus as $menu ) {
            $new_url = str_replace( $string_to_replace, "#", $menu->url );
            if ( $new_url != $menu->url ) {
                $new_url = rtrim( $new_url, "/" );
            }
            $menu->url = $new_url;
        }
    }
    return $menus;
}
add_filter( 'wp_nav_menu_objects', 'mark_change_nav_menu' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

//Class 2.37
function mark_comment_form_fields($fields){
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields','mark_comment_form_fields');