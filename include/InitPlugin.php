<?php

namespace Inc;

use Inc\Database\EntitiesManager;
use Inc\Templates\ShortcodesManager;

class InitPlugin
{
    public static function init()
    {
        ShortcodesManager::init();
    }

    public static function onActivatePlugin()
    {
        EntitiesManager::initEntities();
    }

    public static function onDactivatePlugin()
    {
    }

    public static function onUninstallPlugin()
    {
        EntitiesManager::destroyEntities();
    }

}
