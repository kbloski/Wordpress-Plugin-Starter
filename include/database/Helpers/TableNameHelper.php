<?php

namespace Inc\Database\Helpers;

class TableNameHelper 
{
    private static function create_table_name($table_name)
    {
        global $wpdb;
        return $wpdb->prefix . 'alguin_' . $table_name;
    }

    public static function get_feature_table_name()
    {
        error_log( self::create_table_name('features') );
        return self::create_table_name('features');
    }
}