<?php 

namespace Inc\Api;

use Inc\Api\Rest\ExampleRestApi;
use Inc\Config\Config;

class ApiManager 
{
    use Config;

    public static function init(): void
    {
        // Init REST API endpoints
        ExampleRestApi::init();
    }

    /**
     * Returns an array of available API endpoints for the plugin.
     *
     * @return array<string, string>
     */
    public static function getClientPublicApiEndpoints(): array
    {
        return [
            'example' => ExampleRestApi::getFullUrl(),
        ];
    }

    public static function getV1NamespaceApi()
    {
        return self::$PLUGIN_SLUG . "/v1";
    }
}
