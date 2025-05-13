<?php 

namespace Inc\Hooks;

class AdminPageHook
{
    private const HOOK_NAME = "plug-admin-page";

    public static function doAction(){
        do_action(self::HOOK_NAME);
    } 

    public static function addAction( callable $callback ) {
        add_action(self::HOOK_NAME, $callback);
    }
};