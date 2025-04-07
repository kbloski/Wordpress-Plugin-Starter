<?php 

namespace Inc\Database\Models;

class FeaturesModel 
{
    public static $table_prefix =  "features";

    public static function create_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . self::$table_prefix;

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        require_once(ABSPATH . "wp-admin/includes/upgrade.php");
        dbDelta($sql);
    }
    
    public static function drop_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . self::$table_prefix;

        $sql = "DROP TABLE $table_name";

        $wpdb->query($sql);
    }
}