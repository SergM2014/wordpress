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

    $args= array(
       'public'=> true,
        'label'=> 'Job Listing'
    );

    register_post_type('job', $args);
}

add_action('init', 'dwwp_register_post_type');