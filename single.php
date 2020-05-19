<?php get_header(); ?>
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
