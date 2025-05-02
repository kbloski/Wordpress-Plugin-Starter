<?php 

namespace Inc\Templates\React;

use Inc\Templates\Helpers\HtmlElementCreator;

class ShortcodesReact 
{
    public static function init()
    {
        add_shortcode("test-react-block", [self::class, "testReactShortcode"]);
    }

    public static function testReactShortcode()
    {
        return HtmlElementCreator::createReactDiv("test-react-block");
    }
}