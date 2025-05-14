<?php

namespace Inc\Database\Helpers;

use Inc\Config\Config;

class TableNameHelper 
{
    use Config;

    private static function createTableName($table_name)
    {
        global $wpdb;
        return $wpdb->prefix . self::$PLUGIN_SLUG. '_' . $table_name;
    }

    public static function getExampleTableName()
    {
        return self::createTableName('example');
    }
}