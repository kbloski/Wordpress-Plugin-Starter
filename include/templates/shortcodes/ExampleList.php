<?php
namespace Inc\Templates\Shortcodes;

use Inc\Database\Services\ExampleService;

class ExampleList {
    public static function initShortcode() {
        add_shortcode('example-list', [self::class, 'renderShortcode']);
    }

    public static function renderShortcode($atts = [], $content = null) {
        $exampleService = new ExampleService();

        $records = $exampleService->getAll();

        $atts = shortcode_atts([
            'title' => 'Examples List',
            'icon' => '⭐',
        ], $atts, 'example_box');

        ob_start();
        ?>
        <div class="example-box">
            <?php self::deleteSubmit() ?>
            <div>
                <h3 class="example-title"><?php echo esc_html($atts['icon']); ?> <?php echo esc_html($atts['title']); ?></h3>
            </div>
            <div class="example-icon"></div>
            <div class="example-content"><?php echo do_shortcode($content); ?></div>
            <div class="example-list">
                <?php 
                    foreach ($records as $record) {
                        ?>
                            <li>
                                <span>{$record->header}</span>
                                <span>{$record->description}</span>
                                <form method="POST">
                                <input hidden='false' name='el_id' value='$record->id' />
                                <button type='submit'>DELETE</button>
                                </form>
                                <hr />
                            </li>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    public static function deleteSubmit()
    {
        $el_id = $_POST["el_id"] ?? null;
        if ($_SERVER["REQUEST_METHOD"] === "POST" && $el_id)
        {
            $exampleService = new exampleService();
            $exampleService->delete($el_id);

            // Redirect to current url with get method 
            wp_redirect($_SERVER['REQUEST_URI']);
        }
    }
}
