<?php

namespace MyPlugin\Core;

class Hooks
{
    protected $actions = [];

    public function add_action($hook, $callback, $priority = 10, $accepted_args = 1)
    {
        $this->actions[] = compact('hook', 'callback', 'priority', 'accepted_args');
    }

    public function register()
    {
        foreach ($this->actions as $action) {
            add_action($action['hook'], $action['callback'], $action['priority'], $action['accepted_args']);
        }
    }
}
