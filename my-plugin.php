<?php

/**
 * Plugin Name: augin
 * Description: Minimal WordPress plugin using Composer autoload and namespace
 * Version: 1.0.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) exit;

// Ładujemy autoloader Composera
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php'); // lub podobne



use Src\Hello;

function my_mini_plugin_boot()
{
    $hello = new Hello();
    add_action('admin_notices', [$hello, 'showNotice']);
}

add_action('plugins_loaded', 'my_mini_plugin_boot');
