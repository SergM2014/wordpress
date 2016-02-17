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

require_once(plugin_dir_path(__FILE__).'wp-job-cpt.php');
require_once (plugin_dir_path(__FILE__).'wp-job-render-admin.php');
require_once (plugin_dir_path(__FILE__).'wp-job-fields.php');


function dwwp_admin_enqueue_scripts(){
    global $pagenow, $typenow;

    if(($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'job'){
        wp_enqueue_style('dwwp-admin-css', plugins_url('css/admin-jobs.css', __FILE__));
        wp_enqueue_script('dwwp-job-js', plugins_url('js/admin-jobs.js', __FILE__), array('jquery', 'jquery-ui-datepicker'), '20150204', true );
    }
}

add_action('admin_enqueue_scripts', 'dwwp_admin_enqueue_scripts');