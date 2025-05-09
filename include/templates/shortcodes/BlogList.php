<?php
namespace Inc\Templates\Shortcodes;
use WP_Query;

class BlogList {
    public const SHORTCODE_NAME = "blog-list";

    public static function initShortcode() {
        add_shortcode(self::SHORTCODE_NAME, [self::class, 'renderShortcode']);
    }

    public static function renderShortcode() {
        $query = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => -1, 
            'post_status'    => 'publish',
        ) );
    
        ob_start();
    
        if ( $query->have_posts() ) {
            echo '<ul class="custom-blog-posts">';
            while ( $query->have_posts() ) {
                $query->the_post();
    
                if ( has_post_thumbnail() ) {
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

}
