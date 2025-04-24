<?php
namespace Inc\Templates\Shortcodes;

use Inc\Database\Services\FeatureService;

class FeatureList {
    public static function init_shortcode() {
        add_shortcode('feature_list', [self::class, 'render_shortcode']);
    }

    public static function render_shortcode($atts = [], $content = null) {
        $featureService = new FeatureService();

        $featureService->create([
            "header" => "Example header",
            "description" => "Example Description"
        ]);

        $records = $featureService->get_all();

        $atts = shortcode_atts([
            'title' => 'Feature List',
            'icon' => '⭐',
        ], $atts, 'feature_box');

        ob_start();
        ?>
        <div class="feature-box">
            <div>
                <h3 class="feature-title"><?php echo esc_html($atts['icon']); ?> <?php echo esc_html($atts['title']); ?></h3>
            </div>
            <div class="feature-icon"></div>
            <div class="feature-content"><?php echo do_shortcode($content); ?></div>
            <div class="feature-list">
                <?php 
                    foreach ($records as $record) {
                        echo "<li>{$record->title}</li>"; 
                    }
                ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
