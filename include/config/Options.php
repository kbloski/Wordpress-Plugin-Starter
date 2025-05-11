<?php

namespace Inc\Config;

use InvalidArgumentException;

class Options {
    protected static string $option_name = 'alguin_plugin_options';

    protected static array $defaults = [
        'api_key' => '',
        'client_secret' => '',
    ];

    protected static array $optionKeys = [
        'api_key',
        'client_secret',
    ];

    /**
     * Checks if the key is allowed.
     */
    private static function validateKey(string $key): void {
        if (!in_array($key, self::$optionKeys, true)) {
            throw new InvalidArgumentException("Option key '$key' is not allowed. Register it in optionKeys.");
        }
    }

    

    public static function getOptionName(): string 
    {
        return self::$option_name;
    }

    public static function get(string $key, $default = null) 
    {
        self::validateKey($key);
        $all = get_option(self::$option_name, []);
        return $all[$key] ?? self::$defaults[$key] ?? $default;
    }

    public static function set(string $key, $value): void 
    {
        self::validateKey($key);
        $options = get_option(self::$option_name, []);
        $options[$key] = $value;
        update_option(self::$option_name, $options);
    }

    public static function all(): array 
    {
        return array_merge(self::$defaults, get_option(self::$option_name, []));
    }

    public static function update(array $values): void 
    {
        foreach (array_keys($values) as $key) {
            self::validateKey($key);
        }

        $current = get_option(self::$option_name, []);
        $merged = array_merge($current, $values);
        update_option(self::$option_name, $merged);
    }


}
