<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content=""width="device-width">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>

    </head>


<body <?php body_class(); ?> ><!-- автоматичне підключеннч класів до боді може залежати від конкретної сторінки -->

    <div class="container">

        <!--site-header -->
        <header class="site-header">
            <!-- returns url of main page-->
            <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <h5><?php bloginfo('description'); ?></h5>

            <nav class="site-nav">

                <?php

                $args = array(
                    'theme_location'=> 'primary'
                );

                wp_nav_menu($args); ?>
            </nav>


        </header><!-- /site-header -->