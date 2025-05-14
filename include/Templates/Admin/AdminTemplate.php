<?php 

namespace Inc\Templates\Admin;

use Inc\Hooks\AdminPageHook;
use Inc\Templates\Helpers\HtmlElementCreator;
use Inc\Config\Config;

class AdminTemplate
{
    use Config;
    
    private static function createSlug( string $slug )
    {
        return self::$PLUGIN_SLUG.'-'.$slug;
    }

    private static function checkMenuPositions(){
        global $menu;
        echo '<script>console.log(' . json_encode($menu) . ');</script>';
    }

    public static function init()
    {

        add_action('admin_menu', function () 
        {
            $mainPageSlug = self::createSlug("template"); // lub użyj static::SLUG_PREFIX, jeśli chcesz zachować późniejsze dziedziczenie


            // Title
            add_menu_page(
                self::$PLUGIN_SLUG .' Plugin',             // Page title
                self::$PLUGIN_NAME,      // Menu title
                'manage_options',            // Permissions
                $mainPageSlug,               // Unique Slug Page
                [self::class, "renderHomePage"],  // Callback page
                'dashicons-admin-generic',          // Icon
                66                                  // Position in Menu (optional)
            );
        
            
            add_submenu_page( 
                $mainPageSlug,                      // Parent slug
                'Home',                             // Page title
                'Home',                             // Menu title
                'manage_options',
                $mainPageSlug,                      //  Slug page
                [self::class, "renderHomePage"],  // Page Callback
            );
        
            
            add_submenu_page(
                $mainPageSlug,
                'Settings',
                'Settings',
                'manage_options',
                self::createSlug("settings"),           //  Slug page
                [self::class, "renderSettingsPage"]
            );

            add_submenu_page(
                $mainPageSlug,
                'Test Api',
                'Test Api',
                'manage_options',
                self::createSlug("api"),                //  Slug page
                [self::class, "renderApiPage"]
            );

            add_submenu_page(
                $mainPageSlug,
                'Documentation',
                'Documentation',
                'manage_options',
                self::createSlug("documentation"),                //  Slug page
                [self::class, "renderDocumentationPage"]
            );
    
        });
    }

    public static function renderHomePage()
    {
        AdminPageHook::doAction();
        echo HtmlElementCreator::createDivWithReactId("admin-home-page");
    }

    public static function renderSettingsPage()
    {
        AdminPageHook::doAction();
        echo HtmlElementCreator::createDivWithReactId("admin-settings-page");
    }

    public static function renderApiPage()
    {
        AdminPageHook::doAction();
        echo HtmlElementCreator::createDivWithReactId("admin-api-page");
    }

    public static function renderDocumentationPage()
    {
        AdminPageHook::doAction();
        echo HtmlElementCreator::createDivWithReactId("admin-documentation-page");
    }
}