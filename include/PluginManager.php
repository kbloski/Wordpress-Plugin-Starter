<?php

namespace Inc;

use Inc\Database\EntitiesManager;

class InitPlugin
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
