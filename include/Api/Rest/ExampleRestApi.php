<?php

namespace Inc\Api\Rest;

use WP_REST_Request;
use WP_REST_Response;
use Inc\Api\ApiManager;

class ExampleRestApi
{
    /**
     * Endpoint route name (relative path).
     */
    private const ROUTE_NAME = '/example';

    /**
     * Hook to WordPress to register routes.
     */
    public static function init(): void
    {
        add_action('rest_api_init', [static::class, 'registerRoutes']);
    }

    /**
     * Get the full URL to this endpoint.
     */
    public static function getFullUrl(): string
    {
        return rest_url(ApiManager::getV1NamespaceApi() . self::ROUTE_NAME);
    }

    /**
     * Register this route in WordPress REST API.
     */
    public static function registerRoutes(): void
    {
        register_rest_route(ApiManager::getV1NamespaceApi(), self::ROUTE_NAME, [
            'methods'             => 'GET',
            'callback'            => [static::class, 'handleGet'],
            'permission_callback' => '__return_true',
        ]);

        register_rest_route(ApiManager::getV1NamespaceApi(), self::ROUTE_NAME, [
            'methods'             => 'POST',
            'callback'            => [static::class, 'handlePost'],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * Handle GET request to this endpoint.
     */
    public static function handleGet(WP_REST_Request $request): WP_REST_Response
    {
        $header = $request->get_param('header');
        $description = $request->get_param('description');
    
        if (empty($header) || empty($description)) {
            return new WP_REST_Response([
                'error' => "Missing parameters.",
                'message' => "Both header and description are required.",
            ], 400);
        }
    
        return new WP_REST_Response([
            'header' => $header,
            'description' => $description,
            'message' => 'Data received successfully!'
        ], 200);
    }
    

    /**
     * Handle POST request to this endpoint.
     */
    public static function handlePost(WP_REST_Request $request): WP_REST_Response
    {
        $body = $request->get_json_params();

        if (empty($body)) {
            return new WP_REST_Response([
                'error'   => 'Missing parameters.',
                'message' => 'Body json parameters are required.'
            ], 400);
        }

        return new WP_REST_Response([
            'body' => $body,
            'message' => 'Data received successfully!'
        ], 200);
    }
}
