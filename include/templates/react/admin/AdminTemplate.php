<?php 

namespace Inc\Templates\React\Admin;

use Inc\Templates\Helpers\HtmlElementCreator;

class AdminTemplate
{
    public static function init()
    {

        add_action('admin_menu', function () 
        {
            $slugPrefix = "alguin";
            $mainPageSlug = "$slugPrefix-template";

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
                "$slugPrefix-settings",           //  Slug page
                [self::class, "renderSettingsPage"]
            );

            add_submenu_page(
                $mainPageSlug,
                'Test Api',
                'Test Api',
                'manage_options',
                "$slugPrefix-api",                //  Slug page
                [self::class, "renderApiPage"]
            );

            add_submenu_page(
                $mainPageSlug,
                'Documentation',
                'Documentation',
                'manage_options',
                "$slugPrefix-documentation",                //  Slug page
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
        echo HtmlElementCreator::createReactDiv("admin-home-page");
    }

    public static function renderSettingsPage()
    {
        echo HtmlElementCreator::createReactDiv("admin-settings-page");
    }

    public static function renderApiPage()
    {
        echo HtmlElementCreator::createReactDiv("admin-api-page");
    }

    public static function renderDocumentationPage()
    {
        echo HtmlElementCreator::createReactDiv("admin-documentation-page");
    }
}