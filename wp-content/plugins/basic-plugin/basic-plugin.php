<?php
/*
 * Plugin Name:Basic Plugin
 * Plugin URI: https://github.com/SergM2014
 * Description: Aplugin for creating and displaing job oportunities.
 * Author:Sergiy Muzyra
 * Author URI: https://github.com/SergM2014
 * Version: 1.0
 * License:GPLv2
 */
//delete news in admin page


function remove_dashboard_widgets(){
      // Quick Press

    remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog

// use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

function dwwp_add_google_link(){
    global $wp_admin_bar;

    $wp_admin_bar->add_menu(array(
        'id'    =>'google_analytics',
        'title' =>'Google analytics',
        'href'  =>'http://google.com/analytics'

    ));

}

add_action('wp_before_admin_bar_render', 'dwwp_add_google_link');

