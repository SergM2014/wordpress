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

//Get top ancestor
function get_top_ancestor_id(){
    global $post;

    if($post->post_parent){//get the array of parents posts ofthe curent post
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;
}


/*Does page have children*/
function has_children(){

    global $post;
//get the array of pages which are the child of given post
    $pages = get_pages('child_of='.$post->ID);

    return count($pages);

}