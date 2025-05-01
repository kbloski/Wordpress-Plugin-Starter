<?php 

namespace Inc\Database\Entities;

use Inc\Database\Helpers\TableNameHelper;

class ExampleEntity 
{
    public static function create_table()
    {
        $table_name = TableNameHelper::get_example_table_name();

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            header VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        require_once(ABSPATH . "wp-admin/includes/upgrade.php");
        dbDelta($sql);
    }
    
    public static function drop_table()
    {
        global $wpdb;
        $table_name = TableNameHelper::get_example_table_name();
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
    }
}