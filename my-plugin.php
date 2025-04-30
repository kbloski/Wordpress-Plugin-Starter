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

// Enqueue skryptów Reacta ------------------------- INICJALIZACJA REACT
add_action('admin_enqueue_scripts', function () {
    $asset_path = plugin_dir_url(__FILE__) . 'build/';

    wp_enqueue_script('handleReactApp', $asset_path . 'src/index.js', [], null, true);
    // wp_enqueue_style('my-plugin-style', $asset_path . 'assets/index.css', [], null);
    
    // Można przekazać dane do Reacta // ścieżkę file??
    wp_localize_script('handleReactApp', 'pluginData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'restBaseUrl' => esc_url_raw(rest_url()),
        'restUrlGetName' => esc_url_raw(rest_url('alguin/v1/get-name')),
        'nonce'   => wp_create_nonce('my-plugin-nonce'),
    ]);
});

// Zakdka w menu --------------------------- COMPONENT DLA REACT
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
    echo '<div id="my-plugin-admin-panel"></div>';
}

// ------------------------------------------------ PRZYKŁADOWE REST API

// Rejestracja endpointu REST API
add_action('rest_api_init', function () {
    register_rest_route('alguin/v1', '/get-name', [
        'methods' => 'GET',                         // Możesz zmienić na 'POST' jeśli wolisz
        'callback' => 'alguin_get_name',          // Funkcja obsługująca zapytanie
        'permission_callback' => '__return_true',   // Brak sprawdzania uprawnień (dla prostoty)
    ]);
});

// Funkcja obsługująca zapytanie
function alguin_get_name(WP_REST_Request $request) {
    // Pobieramy parametry 'name' i 'surname' przesyłane w zapytaniu
    $name = $request->get_param('name');
    $surname = $request->get_param('surname');

    // Sprawdzamy, czy parametry zostały przesłane, jeśli nie - zwrócimy błąd
    if (empty($name) || empty($surname)) {
        return new WP_REST_Response('Brak danych name lub surname', 400);
    }

    // Zwracamy dane w odpowiedzi
    return new WP_REST_Response([
        'name' => $name,
        'surname' => $surname,
        'message' => 'Dane otrzymane pomyślnie!'
    ], 200);
}

