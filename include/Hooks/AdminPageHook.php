<?php 

namespace Inc\Hooks;
use Inc\Config\Config;

class AdminPageHook
{
    use Config;

    public static function getHookName() : string
    {
        return self::$PLUGIN_SLUG . 'admin-page';
    }

    public static function doAction() :void
    {
        do_action(self::getHookName());
    } 

    public static function addAction( callable $callback ) :void
    {
        add_action(self::getHookName(), $callback);
    }
};