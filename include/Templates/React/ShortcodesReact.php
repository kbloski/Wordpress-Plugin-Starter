<?php 

namespace Inc\Templates\React;

use Inc\Config\Config;
use Inc\Templates\Helpers\HtmlElementCreator;

class ShortcodesReact 
{
    use Config;

    /** @var string[] */
    private static array $shortcodesList = [];

    private static function addReactShortcode( string $name ) : void
    {   
        $shortcodeName = self::$PLUGIN_SLUG . $name;


        self::$shortcodesList[] = $shortcodeName;

        add_shortcode($shortcodeName, function() use ($shortcodeName) {
            return HtmlElementCreator::createDivWithReactId($shortcodeName);
        });
    }

    public static function init()
    {
        self::addReactShortcode("-hello-react");
        self::addReactShortcode("-shortcode-without-component");
    }

    public static function getShortcodesList()
    {
        return self::$shortcodesList;
    }
}