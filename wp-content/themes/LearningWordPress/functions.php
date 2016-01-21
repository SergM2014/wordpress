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

function gamesquare_customizer_register($wp_customize){
    $wp_customize->add_section('gamesquare_colors', array(
        'title'=>__('Colors of tutorials', 'LearningWordPress'),
        'description'=>'Modify the theme colors',
        'priority'=>30,
    ));

    $wp_customize->add_setting('background_color', array(
        'default'=> '#fff',
    ));

    $wp_customize->add_setting('link_color', array(
        'default'=> '#4b4b4b',
    ));

    $wp_customize->add_setting('link_background_color', array(
        'default'=> '#4b4b4b',
    ));

    $wp_customize->add_setting('link_background_hover', array(
        'default'=> '#56c928',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label'=>__('Edit Background Color', 'learningWordPress'),
        'section'=> 'gamesquare_colors',
        'settings'=> 'background_color'
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'=>__('Edit link Color', 'LearningWordPress'),
        'section'=> 'gamesquare_colors',
        'settings'=> 'link_color'
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_background_color', array(
        'label'=>__('Edit link BackgroundColor', 'LearningWordPress'),
        'section'=> 'gamesquare_colors',
        'settings'=> 'link_background_color'
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_background_color_hover', array(
        'label'=>__('Edit link Hover', 'LearningWordPress'),
        'section'=> 'gamesquare_colors',
        'settings'=> 'link_background_hover'
    )));

    //start image settings
    $wp_customize->add_section('gamesquare_images', array(
        'title'=>__('Images', 'LearningWordPress'),
        'description'=>'Modify the images/logos'
    ));
    $wp_customize->add_setting('logo_image', array(
      'default'=>'http://wordpress/wp-content/themes/LearningWordPress/img/may_be_logo.jpg',

    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_image', array(
        'label'=>__('Edit log images', 'LearningWordPress'),
        'section'=> 'gamesquare_images',
        'settings'=> 'logo_image'
    )));

    //start copyright settings
    $wp_customize->add_section('gamesquare_copyright', array(
        'title'=>__('Copyright Details', 'LearningWordPress'),
        'description'=>'Add/Edit copyright'
    ));
    $wp_customize->add_setting('copyright_details', array(
        'default'=>'&copy; 2016 Your Company',

    ));

    $wp_customize->add_control( 'copyrights_details', array(
        'label'=>__('Copyright Information', 'LearningWordPress'),
        'section'=> 'gamesquare_copyright',
        'settings'=> 'copyright_details'
    ));
}
add_action ('customize_register', 'gamesquare_customizer_register');

function gamesquare_css_customiser(){
    ?>

    <style type="text/css">
        body { background-color: #<?php echo get_theme_mod('background_color'); ?>; }
        .main-nav a {
            color: <?php echo get_theme_mod('link_color'); ?>;
            background-color: <?php echo get_theme_mod('link_background_color'); ?> ;
        }
        .main-nav a:hover{
            background-color: <?php echo get_theme_mod('link_background_hover'); ?>;
        }
    </style>

<?php
}

add_action('wp_head', 'gamesquare_css_customiser');