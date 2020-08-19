<?php
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

function freewell_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'freeWell' ),
    ) );

    register_nav_menus(
        array( 'footer-menu' => __( 'Footer Menu' ) )
    );

    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
}
add_action( 'after_setup_theme', 'freewell_setup' );

/** Enqueue Scripts and Stylesheets **/
function freewell_load_scripts() {
    // Load Scripts
    wp_enqueue_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'greensock-tween-max', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'greensock-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/ScrollToPlugin.min.js', array( 'greensock-tween-max'), null, true );
    wp_enqueue_script( 'scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.js', array(), null , true );
    wp_enqueue_script( 'animatongsap', get_template_directory_uri() . '/js/animation.gsap.min.js', array(), null , true );
    wp_enqueue_script( 'freewell-script', get_template_directory_uri() . '/js/freewell.js', array(), null , true );


    wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
    wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css' );
    wp_enqueue_style( 'webkit', get_template_directory_uri() . '/css/webfontkit/stylesheet.css' );
    wp_enqueue_style( 'freewell', get_template_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'freewell_load_scripts' );

function excludePages($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
//add_filter('pre_get_posts','excludePages');

require_once get_template_directory() . '/inc/foods.php';
require_once get_template_directory() . '/inc/freewell-shortcodes.php';
require_once get_template_directory() . '/inc/posts-sidebar.php';
