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
function dwwp_remove_dashboard_widget(){
   /* Удаляет Блоки на страницах редактирования/создания постов, постоянных страниц, ссылок
    и произвольных типов записей. */
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
}
add_action('wp_dashboard_setup', 'dwwp_remove_dashboard_widget');

