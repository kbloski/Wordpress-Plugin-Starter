<?php

/**
 * Plugin Name: Alguin Template 2025
 * Description: WordPress plugin using Composer autoload wit namespaces and ReactApp
 * Version: 1.0.0
 * Author: Kamil Błoński
 */

use Inc\Templates\Admin\AdminTemplate;
use Inc\Api\ApiManager;
use Inc\PluginManager;
use Inc\ScriptsManager;
use Inc\Templates\Shortcodes\ShortcodesManager;
use Inc\Templates\React\ShortcodesReact;

if (!defined('ABSPATH')) exit;
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

register_activation_hook(__FILE__, 'Inc\PluginManager::onActivatePlugin');
register_deactivation_hook(__FILE__, 'Inc\PluginManager::onDactivatePlugin');

AdminTemplate::init();
ShortcodesReact::init();
ApiManager::init();
ScriptsManager::init();
ShortcodesManager::init();


add_shortcode('test-blog', 'custom_all_blog_posts_shortcode');

function custom_all_blog_posts_shortcode() {
    $query = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => -1, // bez limitu
        'post_status'    => 'publish',
    ) );

    ob_start();

    if ( $query->have_posts() ) {
        echo '<ul class="custom-blog-posts">';
        while ( $query->have_posts() ) {
            $query->the_post();

             // Sprawdzanie, czy post ma obrazek wyróżniający
            if ( has_post_thumbnail() ) {
                // Wyświetlanie obrazka wyróżniającego (możesz dostosować rozmiar)
                echo '<div class="post-thumbnail">';
                echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); // Zmien "thumbnail" na inny rozmiar, np. "medium", "large"
                echo '</div>';
            }

            echo '<li>';
            echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            echo '<p>' . get_the_excerpt() . '</p>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Brak wpisów do wyświetlenia.</p>';
    }

    wp_reset_postdata();

    return ob_get_clean();
}