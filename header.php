<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/png" href="https://myfreewell.com/wp-content/uploads/2020/08/free-well-favicon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>

<div id="wrapper" class="hfeed">
    <header id="header" role="banner">
        <div class="top-bar">
            <div class="social-top-bar social-desktop">

                <div class="header-search">
                    <form role="search" method="get" id="searchform" class="searchform" action="https://myfreewell.com/">
                        <div class="search-assets">
                            <input type="text" value="" name="s" id="s">
<!--                            <input type="submit" id="searchsubmit" value="Search">-->
<!--                            <i class="fas fa-search"  id="searchsubmit"></i>-->
                            <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>


                <div class="social-header-icons">
                    <ul>
                        <li><a href="https://www.facebook.com/FreeWellbyDina.Haggenjos/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/dinafigurski/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://www.instagram.com/myfreewell/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <li><a href="https://www.pinterest.com/myfreewell/boards/" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div id="menu-wrap">

            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<!--                        <span>MENU</span>-->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><a href="<?php echo get_home_url(); ?>"><img class="freewell-logo" src='<?php echo get_template_directory_uri() . "/images/freewell-logo.png" ?>'></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <?php /* Primary navigation */
                        wp_nav_menu( array(
                                'menu' => 'top_menu',
                                'depth' => 2,
                                'container' => false,
                                'menu_class' => 'nav',
                                //Process nav menu using our custom nav walker
                                'walker' => new wp_bootstrap_navwalker())
                        );
                        ?>
                    </ul>
                </div>
                <!--                <div id="search">--><?php //get_search_form(); ?><!--<i class="fas fa fa-search"></i></div>-->
                <div id="search"><?php get_search_form(); ?></div>
            </nav>

        </div>
    </header>

    <div id="container" class="container">
