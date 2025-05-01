<?php 
namespace Inc\Templates;

use Inc\Templates\Shortcodes\ExampleForm;
use Inc\Templates\Shortcodes\ExampleList;

class ShortcodesManager
{
    public static function init_shortcodes()
    {
        ShortcodesReact::Init();
        
        ExampleForm::init_shortcode();
        ExampleList::init_shortcode();
    }
}