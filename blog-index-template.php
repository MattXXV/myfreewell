<?php /* Template Name: Blog Index Page*/ ?>

<?php get_header();


?>
<div class="index-header">
    <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid template-banner vc_row-o-content-middle vc_row-flex" style="background: #ddc2bb;" >
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element  template-title">
                        <div class="wpb_wrapper">
                            <h1><span class="cursive-title">Blog</span></h1>
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
                           echo returnAllCats();
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

    <div class="page-callout blog-index">
        <h2>An Imperfectly Perfect Blog.</h2>
        <p>Life. There are corners filled with dog hair, emotions, stretch marks, cravings, crunched time, questions, among so many other things! These things are our humanness, and when it comes to feeling well, there is no better path than through story which reminds us of our connectedness. The Free Well Blog will house stories, lessons learned (and learning), along with tangible questions and strategies to apply to your own life. <span style="font-style: italic;">LET’S BE HUMAN TOGETHER.</span></p>
    </div>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content post-wrapper">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order'   => 'DESC',
                );

                $post_query = new WP_Query($args);
                $first_post = 0;
                $blogCount = 1;
                if($post_query->have_posts() ) {
                    while($post_query->have_posts() ) {
                        $post_query->the_post();

                        $author = get_the_author_meta( 'nickname', $author_id );

                        $cats = returnCats();
//                           ?>

                        <div class="post-col">
                            <div class="featured-image"><?php the_post_thumbnail( 'large' ); ?> </div>
                            <ul class="post-cats"> <?php echo $cats ?></ul>
                            <h3 class="post-title"><?php the_title(); ?></h3>
                            <p class="author-name">Author: <?php echo $author; ?> </p>
                            <p class="post-date"><?php the_time( get_option( 'date_format' ) );?><span style="padding: 0 5px">|</span>Read Time: <?php  the_field('read_time');?> min</p>
                            <div class="post-excerpt"><?php  the_field('post_excerpt');?></div>
                            <div class="read-more-link"><a href="<?php echo esc_url( get_permalink()); ?>">Read more</a></div>
                        </div>
<?php
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
