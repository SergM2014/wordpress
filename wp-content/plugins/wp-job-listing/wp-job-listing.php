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
require_once (plugin_dir_path(__FILE__).'wp-job-settings.php');
require_once (plugin_dir_path(__FILE__).'wp-job-fields.php');
require_once (plugin_dir_path(__FILE__).'wp-job-shortcode.php');


function dwwp_admin_enqueue_scripts(){
    global $pagenow, $typenow;

    if($typenow == 'job'){
        wp_enqueue_style('dwwp-admin-css', plugins_url('css/admin-jobs.css', __FILE__));
    }


    if(($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'job'){

        wp_enqueue_script('dwwp-job-js', plugins_url('js/admin-jobs.js', __FILE__), array('jquery', 'jquery-ui-datepicker'), '20150204', true );
        wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
        wp_enqueue_script('dwwp-custom-quicktags', plugins_url('js/dwwp-quicktags.js',__FILE__), array('quicktags'), '20150206', true );
    }

    if($pagenow == "edit.php" && $typenow == 'job'){
        wp_enqueue_script('reorder-js', plugins_url('js/reorder.js', __FILE__), array('jquery', 'jquery-ui-sortable'), '20150026', true );
        wp_localize_script('reorder-js','WP_JOB_LISTING', array(
            'security'=> wp_create_nonce('wp-job-order'),
            'success'=>'Jobs sort order has benn saved',
            'failure'=>'There was an error saving the sort order, or you do not have the permission'
        ));
    }

}

add_action('admin_enqueue_scripts', 'dwwp_admin_enqueue_scripts');

