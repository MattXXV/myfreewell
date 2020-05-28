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
<?php
 $showSidebar = get_field('show_sidebar');
?>

    <?php if ( is_active_sidebar( 'recipe_sidebar' ) && $showSidebar ) : ?>
<aside id="sidebar">
        <div id="primary" class="widget-area">
            <ul class="xoxo">
                <?php dynamic_sidebar( 'recipe_sidebar' ); ?>
            </ul>
        </div>
    <script>
        const page = document.querySelector('#content');
        page.classList.add('sidebar-visible');
    </script>
</aside>
    <?php endif; ?>
<?php get_footer(); ?>
