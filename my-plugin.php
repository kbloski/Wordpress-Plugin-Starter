<?php

/**
 * Plugin Name: Alguin Template 2025
 * Description: WordPress plugin using Composer autoload wit namespaces and ReactApp
 * Version: 1.0.0
 * Author: Kamil Błoński
 */

use Inc\InitPlugin;
use Inc\Api\ApiManager;
use Inc\Templates\ShortcodesManager;

if (!defined('ABSPATH')) exit;
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

register_activation_hook(__FILE__, 'Inc\InitPlugin::activate_plugin');
register_deactivation_hook(__FILE__, 'Inc\InitPlugin::deactivate_plugin');

InitPlugin::init();
ApiManager::init();


// Zakdka w menu --------------------------- COMPONENT DLA REACT
add_action('admin_menu', function () {
    add_menu_page(
        'Alguin Plugin',            // Page Title
        'Alguin Template 2025',     // Menu Title
        'manage_options',           // Only Admin Can see this page
        'alguin-plugin-template',   // Slug strony - unikalny identyfikator uzywanyt w ury do identyfikacji strony
        'my_plugin_render_page',    // Callback renderujący
        'dashicons-admin-generic'   // Icon
    );
});

function my_plugin_render_page() {
    // Root element (Podłanczam do tego moją react app)
    echo '<div id="my-plugin-admin-panel"></div>';
}


// Init admin scripts
add_action('admin_enqueue_scripts', function () {
    $asset_path = plugin_dir_url(__FILE__) . 'build/';

    wp_enqueue_script('handleReactApp', $asset_path . 'src/index.js', [], null, true);
    // wp_enqueue_style('my-plugin-style', $asset_path . 'assets/index.css', [], null);
    
    // Incject objects to script
    wp_localize_script(
        'handleReactApp', 
        'pluginData', 
        [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'restBaseUrl' => esc_url_raw(rest_url()),
            'restUrlGetName' => esc_url_raw(rest_url('alguin/v1/get-name')),
            'nonce'   => wp_create_nonce('my-plugin-nonce'),
        ]
    );
});

