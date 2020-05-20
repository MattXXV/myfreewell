<?php
/*
 * Template Name: Custom Post
 * Template Post Type: post, foods
 */
?>
<?php get_header(); ?>
<div class="cus-post-header" style="width: 100%">
    <div class="template-banner" style="background: #ddc2bb; width: 100%" >
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element  template-title">
                        <div class="wpb_wrapper">
                            <p><span class="cursive-title">Welcome to</span></p>
                            <h1>The Free Well Blog.</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<main id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>
<!--<footer class="footer">-->
<?php ////get_template_part( 'nav', 'below-single' ); ?>
<!--</footer>-->
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
<?php get_footer(); ?>
