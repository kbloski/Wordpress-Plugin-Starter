<?php 

namespace Inc\Api;

use Inc\Api\Rest\ExampleRestApi;

class ApiManager 
{
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
    public static function getClientApiEndpoints(): array
    {
        return [
            'getName' => ExampleRestApi::getFullUrl(),
        ];
    }

    public static function getV1NamespaceApi()
    {
        return "alguin/v1";
    }
}
