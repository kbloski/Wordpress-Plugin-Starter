<?php 

namespace Inc\Api;

class ApiManager 
{
    public static function init ()
    {
        // Rest Api Endpoints
        ExampleRestApi::init();
    }
}