<?php

/**
 * Plugin Name: Alguin Template 2025
 * Description: WordPress plugin using Composer autoload and namespace
 * Version: 1.0.0
 * Author: Kamil Błoński
 */

use Inc\InitPlugin;
use Inc\Templates\ShortcodesManager;

if (!defined('ABSPATH')) exit;
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

register_activation_hook(__FILE__, 'Inc\InitPlugin::activate_plugin');
register_deactivation_hook(__FILE__, 'Inc\InitPlugin::deactivate_plugin');

InitPlugin::init();


// Enqueue skryptów Reacta
add_action('admin_enqueue_scripts', function () {
    $asset_path = plugin_dir_url(__FILE__) . 'build/';

    wp_enqueue_script('my-plugin-react', $asset_path . 'assets/index.js', [], null, true);
    wp_enqueue_style('my-plugin-style', $asset_path . 'assets/index.css', [], null);
    
    // Można przekazać dane do Reacta
    wp_localize_script('my-plugin-react', 'myPluginData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('my-plugin-nonce'),
    ]);
});


// Zakdka w menu
add_action('admin_menu', function () {
    add_menu_page(
        'Alguin Plugin',            // Page Title
        'Alguin Template 2025',     // Menu Title
        'manage_options',           // Only Admin Can see this page
        'alguin-plugin-template',   // slug strony - unikalny identyfikator uzywanyt w ury do identyfikacji strony
        'my_plugin_render_page',    // Callback renderujący
        'dashicons-admin-generic'   // Icon
    );
});

function my_plugin_render_page() {
    // Root element (Podłanczam do tego moją react app)
    echo '<div id="my-plugin-admin-panel"></div>'; // kontener dla Reacta
}