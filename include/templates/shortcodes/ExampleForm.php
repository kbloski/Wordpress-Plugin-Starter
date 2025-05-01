<?php
namespace Inc\Templates\Shortcodes;

use Inc\Database\Services\exampleService;

class ExampleForm {
    public static function init_shortcode() {
        add_shortcode('example-form', [self::class, 'render_shortcode']);
    }

    public static function render_shortcode($atts = [], $content = null) {
        $atts = shortcode_atts([
            'title' => 'Example Form Create',
            'icon' => '⭐',
        ], $atts, 'example_box');

        self::post_submit();

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

    public static function post_submit(){
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
