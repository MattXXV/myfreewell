<?php

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
            'supports' => array('title','editor','author','excerpt','comments','revisions', 'thumbnail')
        )
    );
}
add_action( 'init', 'food_posttype' );

//Categories for Foods Posts
function create_recipe_taxonomies() {

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

function allowAuthorEditing() {

    add_post_type_support( 'foods', 'author' );
//    add_post_type_support( 'foods', 'thumbnail' );
}
//add_action('init','allowAuthorEditing');

flush_rewrite_rules( );
