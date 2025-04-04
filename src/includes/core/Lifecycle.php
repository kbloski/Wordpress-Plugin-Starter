<?php

namespace MyPlugin\Core;

class Lifecycle
{
    public static function activate()
    {
        // Example: create custom db table or option
        error_log('MyPlugin activated');
    }

    public static function deactivate()
    {
        // Example: cleanup or remove scheduled tasks
        error_log('MyPlugin deactivated');
    }
}
