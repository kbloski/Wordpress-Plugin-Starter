<?php
use Inc\InitPlugin;

if (!defined('ABSPATH')) exit;
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

InitPlugin::uninstall_plugin();

// delete_option('my_plugin_option_name');
// delete_site_option('my_plugin_option_name');

// register_uninstall_hook(__FILE__, 'Inc\InitPlugin::uninstall_plugin');