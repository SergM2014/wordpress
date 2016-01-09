<?php

function learningWordPress_resources(){
// register givven css-file
//get_stylesheet_uri-> used only in a given function
    wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'learningWordPress_resources');



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

//Customize excerpt word count length
function custom_excerpt_length(){
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

//Theme setup
function learningWordpress_setup(){

    //Navigation Menus
//Регистрируется сразу несколько расположений меню, к которым затем прикрепляются меню.
//масив ключ - описание
    register_nav_menus(array(
        'primary'=>__('Primary Menu'),
        'footer'=>__('Footer Menu')
    ));
    //Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left', 'top'));

    //add post format
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));

}

add_action('after_setup_theme', 'learningWordPress_setup');

//add ourWidget Location
function ourWidgetsInit(){
    register_sidebar(
        array(
            'name'=>'Sidebar',
            'id'=> 'sidebar1',
            'before_widget'=>'<div class="widget-item">',
            'after_widget'=>'</div>'
        )
    );

    register_sidebar(
        array(
            'name'=>'Footer Area 1',
            'id'=> 'footer1'
        )
    );

    register_sidebar(
        array(
            'name'=>'Footer Area 2',
            'id'=> 'footer2'
        )
    );

    register_sidebar(
        array(
            'name'=>'Footer Area 3',
            'id'=> 'footer3'
        )
    );

    register_sidebar(
        array(
            'name'=>'Footer Area 4',
            'id'=> 'footer4'
        )
    );
}

add_action('widgets_init', 'ourWidgetsInit');


//customize Appearance Option
function learningWordpress_customize_register($wp_customize)
{
    $wp_customize->add_setting('lwp_link_color', array(
        'default'=>'#006ec3',
        'transport'=>'refresh',
        ));

    $wp_customize->add_setting('lwp_btn_color', array(
        'default'=>'#006ec3',
        'transport'=>'refresh',
    ));


    $wp_customize->add_section('lwp_standard_colors', array(
        'title'=> __('Standard Colors', 'LearningWordPress'),
        'priority'=> 30,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'lwp_link_color_control', array(
       'label'=>__('Link Color', 'LearningWordPress'),
        'section'=>'lwp_standard_colors',
        'settings'=>'lwp_link_color',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_color_control', array(
        'label'=>__('Button Color', 'LearningWordPress'),
        'section'=>'lwp_standard_colors',
        'settings'=>'lwp_btn_color',
    )));
}

add_action('customize_register', 'learningWordpress_customize_register');


function learningWordPress_customize_css(){?>

    <style type="text/css">

        a:link,
        a:visited {
            color: <?php echo get_theme_mod('lwp_link_color'); ?>
        }
        .site-header nav ul li.current-menu-item a:link,
        .site-header nav ul li.current-menu-item a:visited,
        .site-header nav ul li.current-page-ancestor a:link,
        .site-header nav ul li.current-page-ancestor a:visited{
            background-color: <?php echo get_theme_mod('lwp_link_color'); ?>

        }

        div.hd-search #searchsubmit {
            background-color: <?php echo get_theme_mod('lwp_btn_color'); ?>
        }

    </style>


<?php }

add_action('wp_head', 'learningWordPress_customize_css');