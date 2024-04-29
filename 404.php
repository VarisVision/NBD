<?php get_header();?>

<main class="no-bad-days-club nbdc-404">
    <?php
        $image_url = get_theme_mod('404_background_image', ''); 
        if ($image_url) {
            echo '<img src="' . esc_url($image_url) . '" alt="No Bad Days Club 404 Page background image"/>';
        }
        echo '<div class="nbdc-404__overlay"></div>';
        echo '<div class="nbdc-404__content">';
        echo '<h2>404 Page not found</h2>';
        echo '<p>' . get_theme_mod('404_text') . '</p>';

        $cta_text = get_theme_mod('404_btn_text');
        $cta_url = get_theme_mod('404_btn_url');

            echo '<a href="' . esc_url($cta_url) . '">';
                echo esc_html($cta_text);
            echo '</a>';
        echo '</div>';
    ?>
</main>

<?php get_footer();?>