<?php 
namespace Inc\Templates;

use Inc\Templates\React\ShortcodesReact;
use Inc\Templates\Shortcodes\ExampleForm;
use Inc\Templates\Shortcodes\ExampleList;

class ShortcodesManager
{
    public static function init()
    {
        ShortcodesReact::init();
        
        ExampleForm::initShortcode();
        ExampleList::initShortcode();
    }
}