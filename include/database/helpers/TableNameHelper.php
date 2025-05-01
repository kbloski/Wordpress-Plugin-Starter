<?php

namespace Inc\Database\Helpers;

class TableNameHelper 
{
    private static function create_table_name($table_name)
    {
        global $wpdb;
        return $wpdb->prefix . 'alguin_' . $table_name;
    }

    public static function get_example_table_name()
    {
        return self::create_table_name('example');
    }
}