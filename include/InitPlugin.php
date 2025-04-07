<?php

namespace Inc;

use Inc\Database\ModelsManager;
use Inc\Database\Services\FeatureService;

function installNotice()
{
    echo '<div class="notice notice-success"><p>Alguin Plugin Installed 👋✨</p></div>';
}


class InitPlugin
{
    public static function activate_plugin()
    {
        ModelsManager::init_models();
    }

    public static function deactivate_plugin()
    {
    }

    public static function uninstall_plugin()
    {
        ModelsManager::destroy_models();
    }

}
