<?php
function wrap_product_content_start() {
    if (is_product()) {
        echo '<main class="nbdc-single-product">';
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
        $classes[] = 'nbdc-single-product__container';
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

    echo '<div class="nbdc-single-product__carousel">';

    if (!empty($attachment_ids)) {
        echo '<div class="nbdc-single-product__slider">';

        $main_image_url = wp_get_attachment_image_url(get_post_thumbnail_id(), 'large');

        echo '<div class="nbdc-single-product__slide">';
        echo wp_get_attachment_image(get_post_thumbnail_id(), 'woocommerce_single', false, array('data-zoom-image' => esc_url($main_image_url)));
        echo '</div>';

        foreach ($attachment_ids as $attachment_id) {
            $image_url = wp_get_attachment_image_url($attachment_id, 'large');

            echo '<div class="nbdc-single-product__slide">';
            echo wp_get_attachment_image($attachment_id, 'woocommerce_single', false, array('data-zoom-image' => esc_url($image_url)));
            echo '</div>';
        }
        echo '</div>';
    }

    include get_template_directory() . '/components/carousel-buttons.php';

    echo '</div>';
}
add_action('woocommerce_before_single_product_summary', 'custom_product_image_gallery');
 
function before_product_title() {
   echo '<div class="nbdc-single-product__title">';
}
add_action( 'woocommerce_single_product_summary' , 'before_product_title', 4 );

function after_product_title() {
    echo '</div>';
 }
 add_action( 'woocommerce_before_add_to_cart_form' , 'after_product_title', 10 );

 add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
 function woocommerce_add_to_cart_button_text_single() {
     return __( 'Select a size', 'woocommerce' ); 
 }