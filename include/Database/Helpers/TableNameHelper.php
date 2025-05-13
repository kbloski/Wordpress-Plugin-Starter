<?php

namespace Inc\Database\Helpers;

class TableNameHelper 
{
    private static function createTableName($table_name)
    {
        global $wpdb;
        return $wpdb->prefix . 'alguin_' . $table_name;
    }

    public static function getExampleTableName()
    {
        return self::createTableName('example');
    }
}