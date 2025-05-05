<?php

namespace Inc;

use Inc\Database\EntitiesManager;

class PluginManager
{
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
