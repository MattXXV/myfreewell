<?php

function registerPostsSideBar() {
    register_sidebar(
        array(
            'name' => __( 'Posts Sidebar', 'textdomain' ),
            'id' => 'recipe_sidebar',
            'description' => __( 'Sidebar for recipes and posts.', 'textdomain' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}
add_action( 'widgets_init', 'registerPostsSideBar' );

function getPostMetaData() {

    $date = get_the_date();
    $author = get_the_author_meta( 'nickname', $author_id );
    $share = do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]');
    $time = get_field('read_time');
    $audio = get_field('blog_audio');

    $html = '<div class="header-meta">';
    $html .= '<p>Author: ' . $author . '</p>';
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
