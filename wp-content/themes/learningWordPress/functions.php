<?php

function learningWordPress_resources(){
// register givven css-file
//get_stylesheet_uri-> used only in a given function
    wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'learningWordPress_resources');

//Navigation Menus
//Регистрируется сразу несколько расположений меню, к которым затем прикрепляются меню.
//масив ключ - описание
register_nav_menus(array(
    'primary'=>__('Primary Menu'),
    'footer'=>__('Footer Menu')
));

