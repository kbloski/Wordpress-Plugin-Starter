<?php
namespace Inc\Templates\Shortcodes;

use Inc\Database\Services\FeatureService;

class FeatureList {
    public static function init_shortcode() {
        add_shortcode('feature_list', [self::class, 'render_shortcode']);
    }

    public static function render_shortcode($atts = [], $content = null) {
        $featureService = new FeatureService();

        $records = $featureService->get_all();

        $atts = shortcode_atts([
            'title' => 'Feature List',
            'icon' => '⭐',
        ], $atts, 'feature_box');

        ob_start();
        ?>
        <div class="feature-box">
            <?php self::delete_submit() ?>
            <div>
                <h3 class="feature-title"><?php echo esc_html($atts['icon']); ?> <?php echo esc_html($atts['title']); ?></h3>
            </div>
            <div class="feature-icon"></div>
            <div class="feature-content"><?php echo do_shortcode($content); ?></div>
            <div class="feature-list">
                <?php 
                    foreach ($records as $record) {
                        echo "<li>
                            <span>{$record->header}</span>
                            <span>{$record->description}</span>
                            <form method=\"POST\">
                            <input hidden='false' name='el_id' value='$record->id' />
                            <button type='submit'>DELETE</button>
                            </form>
                            <hr />
                        </li>"; 
                    }
                ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    public static function delete_submit()
    {
        $el_id = $_POST["el_id"];
        if ($_SERVER["REQUEST_METHOD"] === "POST" && $el_id)
        {
            $featureService = new FeatureService();
            $featureService->delete($el_id);

            // Redirect to current url with get method 
            wp_redirect($_SERVER['REQUEST_URI']);
        }
    }
}
