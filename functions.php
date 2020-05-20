<?php
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

function one_for_all_setup() {
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
        // file does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // file exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
}
add_action( 'after_setup_theme', 'one_for_all_setup' );

/** Enqueue Scripts and Stylesheets **/
add_action( 'wp_enqueue_scripts', 'freewell_load_scripts' );
function freewell_load_scripts()
{
    // Load Scripts
//    wp_enqueue_script('jquery');
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

function getPostMetaData() {
//    $a = shortcode_atts( array(
//        'read_time' => 0,
//    ), $atts );
    $date = get_the_date();
    $title = get_the_title();
    $author = get_the_author_meta( 'nickname', $author_id );
    $categories = wp_get_post_categories();
    $share = do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]');
    $time = get_field('read_time');
    $audio = get_field('blog_audio');

    $html = '<div class="header-meta">';
    $html .= '<p>Author: ' . $author . '</p>';
    $html .= '<p>Categories:</p>';
    $html .= '<ul class="post-cats">' . returnCats() . '</ul>';
    $html .= '<p class="header-date">Posted on: <span class="s1">' . $date . '</span> | <span class="s2">' . $time . '</span> min read</p>';
    $html .= '<p>' .  $share . '</p>';
    if($audio) {
        $html .= '<div class="blog-audio"><audio controls>' . ' <source src="' . $audio . '"' . 'type="audio/mpeg"></audio></div>';
    }
    $html .= '</div>';

    return $html;
}
add_shortcode('getPostMetaData', 'getPostMetaData');

function getFoodsMetaData() {
    function returnAllPostTerms() {
        $cats =  get_the_terms( get_the_ID(), 'recipe' );
        $html = '';
        $terms = $cats;

        foreach($terms as $term) {
            $html .= '<li>'  .  $term->name . '</li>';
        }

        return $html;
    }

    $postTerms = returnAllPostTerms();

    $date = get_the_date();
    $title = get_the_title();
    $categories = wp_get_post_categories();
    $author = get_the_author_meta( 'nickname', $author_id );
    $share = do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]');
    $cooktime = get_field('cook_time');
    $preptime = get_field('prep_time');
    $audio = get_field('blog_audio');

    $html = '<div class="header-meta">';
    $html .= '<p>Recipe Categories:</p>';
    $html .= '<ul class="post-cats">' . $postTerms . '</ul>';
    $html .= '<p class="header-date"><span class="s1">' . 'Prep: ' . $preptime . ' min' . '</span> | <span class="s2"> Cook Time: ' . $cooktime . '</span> min </p>';
    $html .= '<p>' .  $share . '</p>';
    if($audio) {
        $html .= '<div class="blog-audio"><audio controls>' . ' <source src="' . $audio . '"' . 'type="audio/mpeg"></audio></div>';
    }
    $html .= '</div>';

    return $html;
}
add_shortcode('getFoodsMetaData', 'getFoodsMetaData');

function getAllFoodsCats() {
    $categories = get_terms([
        'taxonomy' => 'recipe',
        'hide_empty' => false,
    ]);
    $output = 'names'; // or objects
    $operator = 'and'; // 'and' or 'or'
    $html = '';
    if ($categories) {
        $html .= '<ul>';
        foreach ($categories as $category) {
            $html .= '<li><a href="' . get_term_link( $category->slug, $category->taxonomy ) . '">' . $category->name. '</a></li>';
        }
        $html .= '</ul>';
    }

    return $html;
}
add_shortcode('getAllFoodsCats', 'getAllFoodsCats');

function returnCats() {
    $html = '';
    foreach((get_the_category()) as $category) {
        $postcat= $category->cat_ID;
        $catname =$category->cat_name;
//        echo $postcat;
       $html .= '<li>' . $catname . '</li>';
    }

    return $html;
}


function displayFeaturedImage() {

    return the_post_thumbnail( 'large' );
}
add_shortcode('displayFeaturedImage', 'displayFeaturedImage');

function freewell_footer_menu($atts = array()) {

    extract(shortcode_atts(array(
        'text' => 'Click Here!'
    ), $atts));

    $html = '';

    $html .= '<div class="animated-menu">';
    $html .= '<div class="up-arrow"><i class="far fa-arrow-alt-circle-up"></i></div>';
    $html .= '<h3>Get Around</h3>';
    $html .= '<div class="left-side">';
    $html .= ' <ul>  <li><a href="https://myfreewell.com">Home</a></li> <li><a href="./about">About</a></li><li><a href="./blog">Blog</a></li> </ul>';
    $html .= '</div>';
    $html .= '<div class="right-side">';
    $html .= '<ul><li><a href="./shop">Shop</a></li> <li><a href="./recipe">Food</a></li> <li><a href="./favorites">Favorites</a></li> <li><a href="./contact">Contact</a></li></ul>';
    $html .= ' </div>';
    $html .= ' </div>';

    return $html;
}
add_shortcode('freewell_footer_menu', 'freewell_footer_menu');

function food_posttype() {

    register_post_type( 'foods',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Foods' ),
                'singular_name' => __( 'Food' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'food'),
            'menu_icon'  => 'dashicons-carrot',
            'menu_position' => 4,
            'taxonomies' => array( 'Recipe' ),
//            'exclude_from_search' => true,
        )
    );
}

function create_recipe_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Recipe', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Recipe', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search Recipes', 'textdomain'),
        'all_items' => __('All Recipes', 'textdomain'),
        'parent_item' => __('Parent Recipe', 'textdomain'),
        'parent_item_colon' => __('Parent Recipe:', 'textdomain'),
        'edit_item' => __('Edit Recipe', 'textdomain'),
        'update_item' => __('Update Recipe', 'textdomain'),
        'add_new_item' => __('Add New recipe', 'textdomain'),
        'new_item_name' => __('New Recipe Name', 'textdomain'),
        'menu_name' => __('Recipe', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'recipe'),
    );

    register_taxonomy('recipe', array('foods'), $args);
}
add_action( 'init', 'create_recipe_taxonomies', 0 );

function allowAuthorEditing()
{
    add_post_type_support( 'foods', 'author' );
}

add_action('init','allowAuthorEditing');





flush_rewrite_rules( );
// Hooking up our function to theme setup
add_action( 'init', 'food_posttype' );
add_post_type_support( 'foods', 'thumbnail' );



function returnAllCats() {
    $html = '<ul class="category-list">';
    $categories = get_categories();

    foreach($categories as $category) {
        $html .= '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
    }
    $html .= '</ul>';

    return $html;
}
add_shortcode('returnAllCats', 'returnAllCats');


function registerRecipeSideBar() {
    register_sidebar(
        array(
            'name'          => __( 'Recipe Sidebar', 'textdomain' ),
            'id'            => 'recipe_sidebar',
            'description' => __( 'Sidebar for recipe posts.', 'textdomain' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}
add_action( 'widgets_init', 'registerRecipeSideBar' );

function excludePages($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','excludePages');
