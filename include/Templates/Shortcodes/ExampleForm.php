<?php
namespace Inc\Templates\Shortcodes;

use Inc\Database\Services\exampleService;
use Inc\Config\Config;

class ExampleForm {
    use Config;
    

    public static function getShortcodeName() : string 
    {
        return self::$PLUGIN_SLUG. '-example-form';
    }

    public static function initShortcode() {
        add_shortcode(self::getShortcodeName(), [self::class, 'renderShortcode']);
    }

    public static function renderShortcode($atts = [], $content = null) {
        $atts = shortcode_atts([
            'title' => 'Example Form Create',
            'icon' => '⭐',
        ], $atts, 'example_box');

        self::postSubmit();

        ob_start();
        ?>
            <div class="example-box">
                <div>
                    <h3 class="example-title"><?php echo esc_html($atts['icon']); ?> <?php echo esc_html($atts['title']); ?></h3>
                </div>
                <div class="example-icon"></div>
                <form onsubmit="" action="" method="post">
                    <div>
                        Header: <input type="text" name="header" required />
                    </div>
                    <div>
                        Description: <input type="text" name="description" required />
                    </div>
                    <button type="submit">Wyślij</button>
                </form>
            </div>
        <?php
        return ob_get_clean();
    }

    private static function postSubmit(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (true) {
                if ($_POST["header"] && $_POST["description"]){
                    $exampleService = new exampleService();

                    try {
                        $exampleService->create([
                            "header" => $_POST['header'],
                            "description" => $_POST["description"]
                        ]);
                        
                        // Redirect to current url with get method 
                        wp_redirect($_SERVER['REQUEST_URI']);
                    } catch (Exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
            } else {
                echo '<div class="notice notice-error">Błąd weryfikacji formularza.</div>';
            }
        }
    }
}
