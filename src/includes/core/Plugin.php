<?php

namespace MyPlugin\Core;

use MyPlugin\Core\Hooks;
use MyPlugin\Admin\Notice;

class Plugin
{
    public function run()
    {
        $hooks = new Hooks();
        $hooks->add_action('admin_notices', [new Notice(), 'show']);
        $hooks->register();
    }
}
