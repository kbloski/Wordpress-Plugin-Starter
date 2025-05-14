<?php

namespace Inc\Config;

use InvalidArgumentException;

class Options {
    use Config;

    protected static array $defaults = [
        'api_key' => '',
        'client_secret' => '',
    ];

    protected static array $validOptionKeys = [
        'api_key',
        'client_secret',
    ];

    private static function getOptionsName() : string
    {
        return self::$PLUGIN_SLUG . "_plugin_options";
    }


    /**
     * Checks if the key is allowed.
     */
    private static function validateKey(string $key): void {
        if (!in_array($key, self::$validOptionKeys, true)) {
            throw new InvalidArgumentException("Option key '$key' is not allowed. Register it in validOptionKeys.");
        }
    }

    public static function get(string $key, $default = null) 
    {
        self::validateKey($key);
        $all = get_option(self::getOptionsName(), []);
        return $all[$key] ?? self::$defaults[$key] ?? $default;
    }

    public static function set(string $key, $value): void 
    {
        self::validateKey($key);
        $options = get_option(self::getOptionsName(), []);
        $options[$key] = $value;
        update_option(self::getOptionsName(), $options);
    }

    public static function all(): array 
    {
        return array_merge(self::$defaults, get_option(self::getOptionsName(), []));
    }

    public static function update(array $values): void 
    {
        foreach (array_keys($values) as $key) {
            self::validateKey($key);
        }

        $current = get_option(self::getOptionsName(), []);
        $merged = array_merge($current, $values);
        update_option(self::getOptionsName(), $merged);
    }


}
