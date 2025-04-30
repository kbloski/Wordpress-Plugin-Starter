<?php 
namespace Inc\Templates;

use Inc\Templates\Shortcodes\FeatureForm;
use Inc\Templates\Shortcodes\FeatureList;

class ShortcodesManager
{
    public static function init_shortcodes()
    {
        ReactShortcodes::Init();
        
        FeatureList::init_shortcode();
        FeatureForm::init_shortcode();
    }
}