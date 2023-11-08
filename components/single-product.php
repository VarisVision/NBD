<?php

function wrap_product_content_start() {
    if (is_product()) {
        echo '<main class="nbd-single-product">';
    }
}
add_action('woocommerce_before_single_product', 'wrap_product_content_start');

function wrap_product_content_end() {
    if (is_product()) {
        echo '</main>';
    }
}
add_action('woocommerce_after_single_product', 'wrap_product_content_end');

function nbd_container_class($classes) {
    if (is_product()) {
        $classes[] = 'nbd-single-product__container';
    }
    return $classes;
}

add_filter('post_class', 'nbd_container_class');

function remove_product_images() {
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
}

add_action('woocommerce_before_single_product', 'remove_product_images');

function custom_product_image_gallery() {
    global $product;
    $attachment_ids = $product->get_gallery_image_ids();

    if (!empty($attachment_ids)) {
        echo '<div class="product-images-slider">';

        echo wp_get_attachment_image(get_post_thumbnail_id(), 'woocommerce_single');

        foreach ($attachment_ids as $attachment_id) {
            echo wp_get_attachment_image($attachment_id, 'woocommerce_single');
        }
        echo '</div>';
    }
}
add_action('woocommerce_before_single_product_summary', 'custom_product_image_gallery');