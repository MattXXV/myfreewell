<?php /* Template Name: Recipe Index Page*/ ?>

<?php get_header();

$categories = get_terms([
    'taxonomy' => 'recipe',
    'hide_empty' => false,
]);

?>
<div class="index-header">
    <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid template-banner vc_row-o-content-middle vc_row-flex" style="background: #ced5e5;" >
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element  template-title">
                        <div class="wpb_wrapper">
                            <h1><span class="cursive-title">Recipes</span></h1>
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

    <div class="page-callout recipe-index">
        <h2>Think Doable Dishes.</h2>
        <p>While my love of cooking has grown (now I get excited about kitchen gadgets - who am I?!) I still don’t want to spend all hours doing it. Free Well Recipes is home to good food, in good time.  Suzie Sunday recipes are the exception, these are a tad longer and a tribute to my Mom who cherishes experimenting in the kitchen - sometimes we can all benefit from a Suzie Sunday. Read about my blend of perspectives on food and gentle nutrition at <a href="https://myfreewell.com/approach-nutrition/">Approach & Nutrition</a>, and how I approach food with a family of five. Now, are you ready to make food that you love, and that loves your body back?  </p>
    </div>


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

                        $html = '';

                        $cats = wp_get_post_terms( $post->ID, 'recipe', array( 'fields' => 'all' ) );

                        foreach($cats as $term) {
                            $html .= '<li>'  .  $term->name . '</li>';
                        }

                        $postTerms = $html;
                   ?>


                        <div class="post-col">
                            <div class="featured-image"><?php the_post_thumbnail( 'large' ); ?> </div>
                            <ul class="post-cats"> <?php echo $postTerms ?></ul>
                            <h3 class="post-title"><?php the_title(); ?></h3>
                            <p class="post-date">Prep: <?php  the_field('prep_time');?> min |<span style="padding: 0 5px">Cook Time: <?php  the_field('cook_time');?> min</span></p>
                            <div class="post-excerpt"><?php  the_field('post_excerpt');?></div>
                            <div class="read-more-link"><a href="<?php echo esc_url( get_permalink()); ?>">Read more</a></div>
                        </div>
<!--                    --><?php
//                        endif;
                        $first_post++;
                        $blogCount++;
                    }
                }
                ?>

            </div>
        </article>

    <?php endwhile; endif; ?>
</main>
    </div>

<div class="index-pre-foot">
    <div class="author-bio-spot">
        <div class="admin-img">
            <img class="alignnone wp-image-214 size-medium" src="https://myfreewell.com/wp-content/uploads/2020/04/bio-img-229x300.jpg" alt="" width="229" height="300" srcset="https://myfreewell.com/wp-content/uploads/2020/04/bio-img-229x300.jpg 229w, https://myfreewell.com/wp-content/uploads/2020/04/bio-img.jpg 320w" sizes="(max-width: 229px) 100vw, 229px">
        </div>

        <div class="admin-bio">
            <h3><strong>I’m Dina</strong><br>
                <strong>Haggenjos.</strong></h3>

            <p>Research and idea expert turned Integrative Health and Nutrition Coach &amp; Educator. Helping you fulfill your own wellness, one choice at a time!</p>
        </div>
    </div>

    <div class="footer-menu-wrap">
        <div class="animated-menu">
            <div class="up-arrow">
                <i class="far fa-arrow-alt-circle-up"></i>
            </div>
            <h3>Get Around</h3>
            <div class="left-side">
                <ul>
                    <li><a href="https://myfreewell.com">Home</a></li>
                    <li><a href="./mystory">About</a></li>
                    <li><a href="./blog">Blog</a></li>
                </ul>
            </div>
            <div class="right-side">
                <ul>
                    <li><a href="./shop">Shop</a></li>
                    <li><a href="./recipe">Food</a></li>
                    <li><a href="./favorites">Favorites</a></li>
                    <li><a href="./contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
