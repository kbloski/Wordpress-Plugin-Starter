<?php

/**
 * Plugin Name: Alguin Template 2025
 * Description: WordPress plugin using Composer autoload wit namespaces and ReactApp
 * Version: 1.0.0
 * Author: Kamil Błoński
 */

use Inc\InitPlugin;
use Inc\ScriptsManager;
use Inc\Api\ApiManager;
use Inc\Templates\React\Admin\AdminTemplate;

if (!defined('ABSPATH')) exit;
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

register_activation_hook(__FILE__, 'Inc\InitPlugin::onActivatePlugin');
register_deactivation_hook(__FILE__, 'Inc\InitPlugin::onDactivatePlugin');

InitPlugin::init();
ApiManager::init();
AdminTemplate::init();
ScriptsManager::init();
