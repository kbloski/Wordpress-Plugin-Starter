<?php

namespace Inc\Api\Rest;

use WP_REST_Request;
use WP_REST_Response;
use Inc\Api\ApiManager;

class ExampleRestApi
{
    /**
     * Namespace API v1.
     *
     * @var string
     */

    /**
     * Init REST API.
     */
    public static function init()
    {
        add_action('rest_api_init', [self::class, 'registerRoutes']);
    }

    /**
     * Register route REST API.
     */
    public static function registerRoutes()
    {
        register_rest_route(ApiManager::getV1NamespaceApi(), '/get-name', [
            'methods'             => 'GET',
            'callback'            => [self::class, 'request'],
            'permission_callback' => '__return_true'
        ]);
    }

    /**
     * Obsługuje zapytanie do /get-name.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public static function request(WP_REST_Request $request)
    {
        $name    = $request->get_param('name');
        $surname = $request->get_param('surname');

        if (empty($name) || empty($surname)) {
            return new WP_REST_Response([
                'error'   => 'Missing parameters.',
                'message' => 'Name and surname parameters are required.'
            ], 400); 
        }

        return new WP_REST_Response([
            'name'    => $name,
            'surname' => $surname,
            'message' => 'Data received successfully!'
        ], 200); 
    }

    /**
     * Return full endpoion url.
     *
     * @return string
     */
    public static function getFullUrl() : string
    {
        return rest_url(ApiManager::getV1NamespaceApi() . '/get-name');
    }
}
