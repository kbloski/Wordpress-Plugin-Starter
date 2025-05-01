<?php 

namespace Inc\Templates\Admin;



// add_action('admin_menu', function () {
//     global $menu;

//     echo '<pre>';
//     foreach ($menu as $item) {
//         echo "Pozycja: {$item[2]} | Nazwa: {$item[0]} | Uprawnienia: {$item[1]} | Numer pozycji: {$item[1]}\n";
//     }
//     echo '</pre>';
// });



class AdminTemplate
{
    public static function init()
    {

        add_action('admin_menu', function () 
        {
            $mainPageSlug = "alguin-plugin-template";

            // Title
            add_menu_page(
                'Alguin Plugin',             // Page title
                'Alguin Template 2025',      // Menu title
                'manage_options',            // Permissions
                $mainPageSlug,               // Unique Slug Page
                [self::class, "render_home_page"],  // Callback page
                'dashicons-admin-generic',          // Icon
                66                                  // Position in Menu (optional)
            );
        
            
            add_submenu_page( 
                'alguin-plugin-template',           // Parent slug
                'Home',                             // Page title
                'Home',                             // Menu title
                'manage_options',
                $mainPageSlug,                      //  Slug page
                [self::class, "render_home_page"],  // Page Callback
            );
        
            
            add_submenu_page(
                'alguin-plugin-template',
                'Settings',
                'Settings',
                'manage_options',
                'alguin-plugin-settings',           //  Slug page
                [self::class, "render_settings_page"]
            );

            add_submenu_page(
                'alguin-plugin-template',
                'Test Api',
                'Test Api',
                'manage_options',
                'alguin-plugin-api',                //  Slug page
                [self::class, "render_api_page"]
            );
    
        });
    }

    private static function check_menu_positions(){
        global $menu;
        echo '<script>console.log(' . json_encode($menu) . ');</script>';
    }

    public static function render_home_page()
    {
        self::check_menu_positions();
        echo '<div data-react-id="admin-home-page">React Component</div>';
    }

    public static function render_settings_page()
    {
        echo '<div data-react-id="admin-settings-page">React Component</div>';
    }

    public static function render_api_page()
    {
        echo '<div data-react-id="admin-api-page">React Component</div>';
    }
}