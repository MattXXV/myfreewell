<?php /* Template Name: Recipe Index Page*/ ?>

<?php get_header();

$categories = get_terms([
    'taxonomy' => 'recipe',
    'hide_empty' => false,
]);

?>
<div class="index-header">
    <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid template-banner vc_custom_1587097229184 vc_row-has-fill" style="background: #ced5e5;" >
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element  template-title">
                        <div class="wpb_wrapper">
                            <p><span class="cursive-title">Welcome to</span></p>
                            <h1>Free Well Recipes.</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1587097229184 vc_row-has-fill category-header" style="background: #f8f4f3;" >
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element  template-title">
                        <div class="wpb_wrapper">
                            <?php
                            if ($categories) {
                                $html .= '<ul class="category-list">';
                                foreach ($categories as $category) {
                                    $html .= '<li><a href="' . get_term_link( $category->slug, $category->taxonomy ) . '">' . $category->name. '</a></li>';
                                }
                                $html .= '</ul>';

                                echo $html;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

    <div class="center-wrap">

<main id="content">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content post-wrapper">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                <?php
                $args = array(
                    'post_type' => 'foods',
                    'orderby' => 'date',
                    'order'   => 'ASC',
                );

                $post_query = new WP_Query($args);
                $first_post = 0;
                $blogCount = 1;
                if($post_query->have_posts() ) {
                    while($post_query->have_posts() ) {
                        $post_query->the_post();

                        $author = get_the_author_meta( 'nickname', $author_id );
                        $html = '';

                        $cats = wp_get_post_terms( $post->ID, 'recipe', array( 'fields' => 'all' ) );

                        foreach($cats as $term) {
                            $html .= '<li>'  .  $term->name . '</li>';
                        }

                        $postTerms = $html;

                        if($blogCount > 4) {$blogCount = 1;}
                            if($blogCount === 4) :
                           ?> <div class="row">
                    <?php
                        endif; ?>

                        <div class="post-col">
                            <div class="featured-image"><?php the_post_thumbnail( 'large' ); ?> </div>
                            <ul class="post-cats"> <?php echo $postTerms ?></ul>
                            <h3 class="post-title"><?php the_title(); ?></h3>
                            <p class="author-name">Author: <?php echo $author; ?> </p>
                            <p class="post-date">Prep Time:<span style="padding: 0 5px"> <?php  the_field('read_time');?> min</span></p>
                            <div class="post-excerpt"><?php  the_field('post_excerpt');?></div>
                            <div class="read-more-link"><a href="<?php echo esc_url( get_permalink()); ?>">Read more</a></div>
                        </div>
                        <?php
                            if($first_post === 7) :
                                ?> </div>
                    <?php
                        endif;
                        $first_post++;
                        $blogCount++;
                    }
                }
                ?>

<!--                <div class="entry-links">--><?php //wp_link_pages(); ?><!--</div>-->
            </>
        </article>

    <?php endwhile; endif; ?>
</main>
    <aside id="sidebar">
        <?php if ( is_active_sidebar( 'recipe_sidebar' ) ) : ?>
            <div id="primary" class="widget-area">
                <ul class="xoxo">
                    <?php dynamic_sidebar( 'recipe_sidebar' ); ?>
                </ul>
            </div>
        <?php endif; ?>
    </aside>
    </div>

<?php get_footer(); ?>
