<?php 
namespace Inc\Templates;

use Inc\Templates\Shortcodes\FeatureShortcode;

class ShortcodesManager
{
    public static function init_shortcodes()
    {
        FeatureShortcode::init_shortcode();
    }
}