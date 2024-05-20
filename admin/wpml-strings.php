<?php
function nbdc_add_to_cart_translations() {
    do_action('wpml_register_single_string', 'nbdc_theme', 'Select a size', 'Select a size');
    do_action('wpml_register_single_string', 'nbdc_theme', 'Add to cart', 'Add to cart');
    do_action('wpml_register_single_string', 'nbdc_theme', 'Product out of stock', 'Product out of stock');
}
add_action('init', 'nbdc_add_to_cart_translations');

function custom_enqueue_scripts() {
    if (is_product()) {
        wp_enqueue_script('single-product', get_template_directory_uri() . '/dist/scripts/single-product.js', ['jquery'], true);
    }

    $translations = array(
        'selectSizeText' => apply_filters('wpml_translate_single_string', 'Select a size', 'nbdc_theme', 'Select a size'),
        'addToCartText' => apply_filters('wpml_translate_single_string', 'Add to cart', 'nbdc_theme', 'Add to cart'),
        'outOfStockText' => apply_filters('wpml_translate_single_string', 'Product out of stock', 'nbdc_theme', 'Product out of stock')
    );

    wp_localize_script('single-product', 'addToCartTranslation', $translations);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');
?>