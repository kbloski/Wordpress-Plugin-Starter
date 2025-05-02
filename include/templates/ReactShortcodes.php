<?php 

namespace Inc\Templates;

class ReactShortcodes 
{
    public static function Init()
    {
        add_shortcode("example_react_shortcode", [self::class, "example_react_shortcode"]);
    }

    public static function example_react_shortcode()
    {
        ob_start();
        echo "<div id='example-react-shortcode'></div>";
        return ob_get_clean();
    }
}