<?php get_header(); ?>
<div class="index-header">
    <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid template-banner vc_custom_1587097229184 vc_row-has-fill" style="background: #ddc2bb;;" >
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

    <div class="category-header" style="" >
        <div class="category-title" style=" ">
            <?php
            single_term_title();
            ?>
        </div>
    </div>
</div>
<div class="center-wrap">
<main id="content">
<header class="header">
<h1 class="entry-title"><?php single_term_title(); ?></h1>
<div class="archive-meta"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div>
</header>
    <div class="post-wrapper">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php  $cats = returnCats(); ?>
    <div class="post-col">
        <div class="featured-image"><?php the_post_thumbnail( 'large' ); ?> </div>
        <ul class="post-cats"> <?php echo $cats ?></ul>
        <h3 class="post-title"><?php the_title(); ?></h3>
        <p class="post-date"><?php the_time( get_option( 'date_format' ) );?><span style="padding: 0 5px">|</span><?php  the_field('read_time');?> min read</p>
        <div class="post-excerpt"><?php  the_field('post_excerpt');?></div>
        <div class="read-more-link"><a href="<?php echo esc_url( get_permalink()); ?>">Read more</a></div>
    </div>
<?php endwhile; endif; ?>
    </div>
<?php //get_template_part( 'nav', 'below' ); ?>
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
