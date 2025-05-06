<?php 

namespace Inc\Templates\Admin;

use Inc\Templates\Helpers\HtmlElementCreator;

class AdminTemplate
{
    private const SLUG_PREFIX = "alguin-";
    
    private static function createSlug( string $slug )
    {
        return self::SLUG_PREFIX.$slug;
    }

    public static function init()
    {

        add_action('admin_menu', function () 
        {
            $mainPageSlug = self::createSlug("template"); // lub użyj static::SLUG_PREFIX, jeśli chcesz zachować późniejsze dziedziczenie


            // Title
            add_menu_page(
                'Alguin Plugin',             // Page title
                'Alguin Template 2025',      // Menu title
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

    private static function checkMenuPositions(){
        global $menu;
        echo '<script>console.log(' . json_encode($menu) . ');</script>';
    }

    public static function renderHomePage()
    {
        echo HtmlElementCreator::createDivWithReactId("admin-home-page");
    }

    public static function renderSettingsPage()
    {
        echo HtmlElementCreator::createDivWithReactId("admin-settings-page");
    }

    public static function renderApiPage()
    {
        echo HtmlElementCreator::createDivWithReactId("admin-api-page");
    }

    public static function renderDocumentationPage()
    {
        echo HtmlElementCreator::createDivWithReactId("admin-documentation-page");
    }
}