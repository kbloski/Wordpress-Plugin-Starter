<?php

/**
 * Plugin Name: Alguin Template 2025
 * Description: WordPress plugin using Composer autoload wit namespaces and ReactApp
 * Version: 1.0.0
 * Author: Kamil Błoński
 */

use Inc\Templates\React\Admin\AdminTemplate;
use Inc\Api\ApiManager;
use Inc\PluginManager;
use Inc\ScriptsManager;
use Inc\Templates\ShortcodesManager;

if (!defined('ABSPATH')) exit;
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

register_activation_hook(__FILE__, 'Inc\PluginManager::onActivatePlugin');
register_deactivation_hook(__FILE__, 'Inc\PluginManager::onDactivatePlugin');

AdminTemplate::init();
ApiManager::init();
ScriptsManager::init();
ShortcodesManager::init();