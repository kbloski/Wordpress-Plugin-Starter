<?php
use Inc\PluginManager;

if (!defined('ABSPATH')) exit;
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

PluginManager::onUninstallPlugin();

// delete_option('my_plugin_option_name');
// delete_site_option('my_plugin_option_name');
