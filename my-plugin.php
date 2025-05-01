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
use Inc\Templates\Admin\AdminTemplate;

if (!defined('ABSPATH')) exit;
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

register_activation_hook(__FILE__, 'Inc\InitPlugin::activate_plugin');
register_deactivation_hook(__FILE__, 'Inc\InitPlugin::deactivate_plugin');

InitPlugin::init();
ApiManager::init();
AdminTemplate::init();

// Init react scripts for all app
add_action('wp_enqueue_scripts', "enquence_shared_react_script");
add_action('admin_enqueue_scripts', "enquence_shared_react_script");

function enquence_shared_react_script(){
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
}
