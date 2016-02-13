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
