<?php

function displayFeaturedImage() {

    return the_post_thumbnail( 'large' );
}
add_shortcode('displayFeaturedImage', 'displayFeaturedImage');

//animated sub footer menu
function freewell_footer_menu($atts = array()) {

    extract(shortcode_atts(array(
        'text' => 'Click Here!'
    ), $atts));

    $html = '';

    $html .= '<div class="animated-menu">';
    $html .= '<div class="up-arrow"><i class="far fa-arrow-alt-circle-up"></i></div>';
    $html .= '<h3>Get Around</h3>';
    $html .= '<div class="left-side">';
    $html .= ' <ul>  <li><a href="https://myfreewell.com">Home</a></li> <li><a href="./mystory">About</a></li><li><a href="./blog">Blog</a></li> </ul>';
    $html .= '</div>';
    $html .= '<div class="right-side">';
    $html .= '<ul><li><a href="./shop">Shop</a></li> <li><a href="./recipe">Food</a></li> <li><a href="./favorites">Favorites</a></li> <li><a href="./contact">Contact</a></li></ul>';
    $html .= ' </div>';
    $html .= ' </div>';

    return $html;
}
add_shortcode('freewell_footer_menu', 'freewell_footer_menu');

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

    $share = do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]');
    $cooktime = get_field('cook_time');
    $preptime = get_field('prep_time');
    $audio = get_field('blog_audio');

    $html = '<div class="header-meta">';
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
        $catname =$category->cat_name;
        $html .= '<li>' . $catname . '</li>';
    }
    return $html;
}

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

function getFooterPosts() {

    $postType = get_post_type();

    $args = array(
        'post_type'   => $postType,
        'post__not_in' => array( get_the_ID() ),
        'posts_per_page' => 3,
        'order' => 'asc'
    );

    if($postType === 'foods') {
        $widgetTitle = 'Recent Recipes';
    } else {
        $widgetTitle = 'Recent Posts';
    }


    $previousPosts = new WP_Query($args);

    $html .= '<div class="recent-posts-widget">';
    $html .= '<h3>' . $widgetTitle . '</h3>';
    $html .= '<div class="recent-posts-wrap">';

    if($previousPosts->have_posts()) {
        while($previousPosts->have_posts()) {
            $previousPosts->the_post();

            $thumbnail = get_the_post_thumbnail(null, 'medium');
            $permalink = get_the_permalink();
            $html .= '<a class="recent-post-link" href="' . $permalink . '"' . '>';

            if ( has_post_thumbnail() ) {
                $html .=  $thumbnail;
            }
            $html .= '<p>' . get_the_title() . '</p>';
            $html .= '</a>';
        }
    };

    $html .= '</div>';
    $html .= '</div>';

    return $html;
}
add_shortcode('getFooterPosts', 'getFooterPosts');
