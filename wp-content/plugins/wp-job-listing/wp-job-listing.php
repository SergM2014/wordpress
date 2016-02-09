<?php
/*
 * Plugin Name: WP Job Listing
 * Plugin URI:
 * Description: This plugin allows you to add a simple job listing section to you Wp
 * Author:me
 * Author URI:
 * Version: 1.0
 * License: GPLv2
 */

if(!defined('ABSPATH')){
    exit;
}

function dwwp_register_post_type(){

    $singular = 'Job Listing';
    $plural = 'Job Listings';
    $labels = array(
        'name'              =>$plural,
        'singular_name'     =>$singular,
        'add_name'          =>'Add New',
        'add_new_item'      =>'Add New '.$singular,
        'edit'              =>'Edit',
        'edit_item'         =>'Edit '.$singular,
        'new_item'          =>'New '.$singular,
        'view'              =>'View '.$singular,
        'view_item'         =>'View '.$singular,
        'search_term'       =>'Search '.$plural,
        'parent'            =>'Parent '.$singular,
        'not_found'         =>'No '.$plural.' found',
        'not_found_in_trash'=>'no '.$plural.' in trash'


    );

    $args= array(
        'labels'=>$labels,
        'public'                =>true,
        'publicly_queryable'    =>true,
        'exclude_from_search'   =>false,
        'show_in_nav_menus'     =>true,
        'show_ui'               =>true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     =>true,
        'menu_position'         =>6,
        'menu_icon'             =>'dashicons-bisinessman',
        'can_export'            =>true,
        'delete_with_user'      =>false,
        'hierarchical'          =>false,
        'has_archive'           =>true,
        'query_var'             =>true,
        'capability_type'       =>'page',
        'map_meta_cap'          =>true,

        'rewrite'=>array(
          'slug'        =>'jobs',
            'with_front'=>true,
            'pages'     =>true,
            'feeds'     =>false,

        ),
        'supports'=>array(
            'title',
            'editor',
            'author',
            'custom-fields',
            'thumbnail'
        )
    );

    register_post_type('job', $args);
}

add_action('init', 'dwwp_register_post_type');