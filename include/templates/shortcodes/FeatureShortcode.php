<?php
namespace Inc\Templates\Shortcodes;

// Using shortcode
// [feature_box title="Twój tytuł" icon="🔥"]Tutaj treść pudełka[/feature_box]

class FeatureShortcode {
    public static function init_shortcode() {
        add_shortcode('feature_box', [self::class, 'render_shortcode']);
    }

    public static function render_shortcode($atts = [], $content = null) {
        $atts = shortcode_atts([
            'title' => 'Domyślny tytuł',
            'icon' => '⭐',
        ], $atts, 'feature_box');

        ob_start();
        ?>
        <div class="feature-box">
            <div class="feature-icon"><?php echo esc_html($atts['icon']); ?></div>
            <h3 class="feature-title"><?php echo esc_html($atts['title']); ?></h3>
            <div class="feature-content"><?php echo do_shortcode($content); ?></div>
        </div>
        <?php
        return ob_get_clean();
    }
}
