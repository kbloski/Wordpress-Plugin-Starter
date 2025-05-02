<?php

namespace Inc\Api;

use WP_REST_Request;
use WP_REST_Response;

class ExampleRestApi
{
    public static function init()
    {
        add_action('rest_api_init', [self::class, 'registerRoutes']);
    }

    public static function registerRoutes()
    {
        register_rest_route('alguin/v1', '/get-name', [
            'methods'             => 'GET',
            'callback'            => [self::class, 'request'],
            'permission_callback' => '__return_true',                   // For all
        ]);
    }

    public static function request(WP_REST_Request $request)
    {
        $name    = $request->get_param('name');
        $surname = $request->get_param('surname');

        if (empty($name) || empty($surname)) {
            return new WP_REST_Response('Not found name or surname params.', 400);
        }

        return new WP_REST_Response([
            'name'    => $name,
            'surname' => $surname,
            'message' => 'Data received sucess!',
        ], 200);
    }
}
