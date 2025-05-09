# Alguin Template 2025- WordPress Plugin

A minimal starter template for creating WordPress plugins, with basic file structure, hooks, and asset management.

## Features

- Easy-to-use template for building WordPress plugins
- Basic structure with necessary files and folders
- Enqueues CSS and JavaScript assets
- Admin page integration for settings and configuration

## Installation

1. Copy the `alguin` folder to `wp-content/plugins/` directory.
2. Activate the plugin from the WordPress admin dashboard.

## Usage

Once activated, you can start customizing the plugin by editing the files located in the plugin folder. The `alguin` plugin serves as a starting point for building your custom functionality.

If your plugin requires WooCommerce support, the template includes an example of how to extend WooCommerce with custom functionality.

## Author

Kamil Błoński  
[GitHub](https://github.com/kbloski)  
[Email](mailto:kblonski02@gmail.com)  
[LinkedIn](https://www.linkedin.com/in/kamil-błoński-1958b4297/)

## License

This plugin is licensed under the GPLv2 or later.
Copyright (c) 2025 Kamil Błoński

## Debugging

To enable debugging in WordPress, add the following to your `wp-config.php` file:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
