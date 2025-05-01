<?php

namespace Inc;

use Inc\Database\EntitiesManager;
use Inc\Templates\ShortcodesManager;

class InitPlugin
{
    public static function init()
    {
        // Init React
       
        ShortcodesManager::init_shortcodes();
    }

    public static function activate_plugin()
    {
        EntitiesManager::init_models();
    }

    public static function deactivate_plugin()
    {
    }

    public static function uninstall_plugin()
    {
        EntitiesManager::destroy_models();
    }

}
