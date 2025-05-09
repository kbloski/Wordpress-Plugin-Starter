<?php
namespace Inc\Templates\Shortcodes;

use Inc\Database\Services\ExampleService;

class ExampleList {
    public const SHORTCODE_NAME = "example-list";

    public static function initShortcode() {
        add_shortcode(self::SHORTCODE_NAME, [self::class, 'renderShortcode']);
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

        <style>
            .example-list li {
                display: flex;
                justify-content: space-between;
                border-bottom: 2px solid black;
            }

        </style>

        <div>
            <?php self::deleteSubmit() ?>
            <div>
                <h3><?php echo esc_html($atts['icon']); ?> <?php echo esc_html($atts['title']); ?></h3>
            </div>
            <div></div>
            <div><?php echo do_shortcode($content); ?></div>
            <div class="example-list">
                <?php 
                    foreach ($records as $record) {
                        ?>
                            <li>
                                <span><?php echo $record->header; ?></span>
                                <span><?php echo $record->description; ?></span>
                                <form method="POST">
                                <input hidden='false' name='el_id' value="<?php echo $record->id; ?>" />
                                <button type='submit'>DELETE</button>
                                </form>
                            </li>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    private static function deleteSubmit()
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
