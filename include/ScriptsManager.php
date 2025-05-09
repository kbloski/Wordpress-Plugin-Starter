<?php

namespace Inc;

use Inc\Api\ApiManager;
use Inc\Templates\React\ShortcodesReact;
use Inc\Templates\Shortcodes\ShortcodesManager;

class ScriptsManager 
{
    public static function init()
    {
        
        // Hooks for loading scripts for wp-admin pages
        add_action('plug-admin-page', [self::class, 'enqueue_shared_react_script']);

        // Hooks for loading scripts for wordpress pages
        add_action('wp_enqueue_scripts', [self::class, 'enqueue_shared_react_script']);
    }

    public static function enqueue_shared_react_script()
    {
        $asset_path = plugin_dir_url(dirname(__FILE__)) . 'build/';
        
        wp_enqueue_script( 'handleReactApp', $asset_path . 'src/main.js', [], null, true );
        wp_enqueue_style( 'handleReactAppStyles', $asset_path . 'src/main.css', [], null );

        // Provide data to script
        wp_localize_script(
            'handleReactApp',   // Script handler
            'pluginData',       // Provided variable name
            [
                "admin" => [
                    "shortcodes" => [
                        "php" => ShortcodesManager::getShortcodesList(),
                        "react" => ShortcodesReact::getShortcodesList(),
                    ]
                ],
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
