<?php

namespace Inc;

use Inc\Api\ApiManager;

class ScriptsManager 
{
    public static function init()
    {
        // Dodaj hooki do ładowania skryptów
        add_action('wp_enqueue_scripts', [self::class, 'enqueue_shared_react_script']);
        add_action('admin_enqueue_scripts', [self::class, 'enqueue_shared_react_script']);
    }

    public static function enqueue_shared_react_script()
    {
        $asset_path = plugin_dir_url(dirname(__FILE__)) . 'build/';
        
        wp_enqueue_script(
            'handleReactApp',
            $asset_path . 'src/index.js',
            [], 
            null,
            true
        );

        // Opcjonalnie — dołącz CSS, jeśli potrzebny
        wp_enqueue_style(
            'my-plugin-style',
            $asset_path . 'src/index.css',
            [],
            null
        );

        // Provide data to scripta
        wp_localize_script(
            'handleReactApp',   // script handler
            'pluginData',       // variable name
            [
                'api' => [
                    // 'ajaxUrl'      => admin_url('admin-ajax.php'),
                    'restBaseUrl'  => esc_url_raw(rest_url()),
                    'endpoints'    => ApiManager::getClientApiEndpoints(),
                    'nonce'        => wp_create_nonce('my-plugin-nonce'),
                ],
            ]
        );
    }
}
