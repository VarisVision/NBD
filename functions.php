<?php
require_once get_template_directory() . '/admin/customize.php';
require_once get_template_directory() . '/admin/lookbook-gallery.php';
require_once get_template_directory() . '/admin/wpml-strings.php';

require_once get_template_directory() . '/components/single-product.php';

function scripts()
{
    wp_enqueue_style('nbd-style', get_template_directory_uri() . '/dist/nbdc-styles.css', [], 'all');
    wp_enqueue_style('drawer-style', get_template_directory_uri() . '/dist/vendors/slide-out-panel.min.css', [], 1, 'all');
    wp_enqueue_style('slick-carousel', get_template_directory_uri() . '/dist/vendors/slick.css');
    wp_enqueue_style('slick-lightgallery', get_template_directory_uri() . 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/css/lightgallery.min.css');
    
    wp_enqueue_script('nbd-script', get_template_directory_uri() . '/dist/scripts/nbdc-scripts.js', ['jquery'], true);

    wp_localize_script('nbd-script', 'nbdAjaxObject', array(
        'nonce' => wp_create_nonce('my_nonce_action'),
        'ajaxUrl' => admin_url('admin-ajax.php'),
    ));
    
    wp_enqueue_script('header', get_template_directory_uri() . '/dist/scripts/header.js', ['jquery'], 1, true);

    if (is_checkout()){
        wp_enqueue_script('checkout', get_template_directory_uri() . '/dist/scripts/checkout.js', ['jquery'], true);
    }

    if (is_singular('gallery')) {
        wp_enqueue_script('masonry-js', get_template_directory_uri() . '/dist/vendors/masonry.min.js', array('jquery'), null, true);
        wp_enqueue_script('fluidbox-js', get_template_directory_uri() . '/dist/vendors/fluidbox.min.js', array('jquery'), null, false);
        wp_enqueue_script('imagesloaded-js', get_template_directory_uri() . '/dist/vendors/imagesloaded.min.js', array('jquery'), null, false);
        wp_enqueue_style('fluidbox-css', get_template_directory_uri() . '/dist/vendors/fluidbox.min.css');
        wp_enqueue_script('lookbook', get_template_directory_uri() . '/dist/scripts/lookbook.js', ['jquery'], true);
    }

    wp_enqueue_script('drawer-script', get_template_directory_uri() . '/dist/vendors/slide-out-panel.min.js', ['jquery'], 1, true);
    wp_enqueue_script('slick-carousel', get_template_directory_uri() . '/dist/vendors/slick.min.js', array('jquery'), '1.9.0', true);
    wp_enqueue_script('lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/lightgallery.min.js', array('jquery'), null, true);
    wp_enqueue_script('lgzoom', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/plugins/zoom/lg-zoom.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'scripts');

add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

add_theme_support('menus');

add_theme_support('post-thumbnails');

register_nav_menus (
    array(
        'main-nav-left' => 'Main Navigation Left Location',
        'main-nav-right' => 'Main Navigation Right Location',
        'main-nav-mobile' => 'Main Navigation Mobile Location',
        'footer-menu-one' => 'Footer One Location',
        'footer-menu-two' => 'Footer Two Location',
    )
);

function nobaddays_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'nobaddays_add_woocommerce_support' );

function add_variation_to_cart() {
    if (isset($_POST['product_id']) && isset($_POST['variation_id'])) {
        $product_id = intval($_POST['product_id']);
        $variation_id = intval($_POST['variation_id']);

        WC()->cart->add_to_cart($product_id, 1, $variation_id);
        
        echo woocommerce_mini_cart();
    }
    wp_die();
}

add_action('wp_ajax_add_variation_to_cart', 'add_variation_to_cart');
add_action('wp_ajax_nopriv_add_variation_to_cart', 'add_variation_to_cart');

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function get_cart_count() {
    echo WC()->cart->get_cart_contents_count();
    die();
}

add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');

function update_cart_item_quantity() {
    $cart_item_key = $_POST['cart_item_key'];
    $new_quantity = $_POST['quantity'];

    WC()->cart->set_quantity($cart_item_key, $new_quantity);

    $subtotal = WC()->cart->get_cart_subtotal();

    $items = WC()->cart->get_cart();

    $product_prices = array();

    foreach ($items as $item) {
        $product_id = $item['variation_id'];
        $product = wc_get_product($product_id);
        $product_price = $product->get_price();

        $product_prices[$product_id] = array(
            'price' => $product_price,
            'subtotal' => wc_price($product_price * $item['quantity']),
        );
    }

    $response = array(
        'subtotal' => $subtotal,
        'product_prices' => $product_prices,
    );

    echo json_encode($response);
    exit;
}

add_action('wp_ajax_update_cart_item_quantity', 'update_cart_item_quantity');
add_action('wp_ajax_nopriv_update_cart_item_quantity', 'update_cart_item_quantity');


remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
add_action( 'woocommerce_checkout_before_customer_details', 'woocommerce_order_review', 10 );

function ajax_apply_coupon() {
    if ( ! empty( $_POST['coupon_code'] ) ) {
        $coupon_code = sanitize_text_field( $_POST['coupon_code'] );

        if ( WC()->cart->has_discount( $coupon_code ) ) {
            wp_send_json_error( 'Coupon is already applied!' );
        } else {
            WC()->cart->apply_coupon( $coupon_code );
            WC()->cart->calculate_totals();

            if ( WC()->cart->has_discount( $coupon_code ) ) {
                wp_send_json_success( 'Coupon applied successfully!' );
            } else {
                wp_send_json_error( 'Invalid coupon code!' );
            }
        }
    } else {
        wp_send_json_error( 'No coupon code entered!' );
    }

    wp_die();
}
add_action( 'wp_ajax_apply_coupon', 'ajax_apply_coupon' );
add_action( 'wp_ajax_nopriv_apply_coupon', 'ajax_apply_coupon' ); 


function override_checkout_fields( $fields ) {
    $fields['address_1']['placeholder'] = '';
    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'override_checkout_fields');


function remove_checkout_fields( $fields ) {
    unset($fields['billing']['billing_address_2']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['billing']['billing_company']);
    unset($fields['shipping']['shipping_company']);
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_fields' );

function custom_remove_order_comments_placeholder( $fields ) {
    $fields['order']['order_comments']['placeholder'] = '';
    $fields['order']['order_comments']['type'] = 'text';
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_remove_order_comments_placeholder' );

function add_break_field( $fields ) {
    $fields['break-field'] = array(
        'type'        => 'text',
        'label'       => __( '', 'woocommerce' ),
        'placeholder' => __( '', 'woocommerce' ),
        'required'    => false,
        'class'       => array('form-row-wide'),
        'clear'       => true,
        'priority'    => 95
    );
    return $fields;
}
add_filter( 'woocommerce_billing_fields', 'add_break_field' );

function my_custom_image_sizes() {
    add_image_size( 'mobile', 880, 0, true );
    add_image_size( 'tablet', 1224, 0, true );
    add_image_size( 'laptop', 1750, 0, true );
}
add_action( 'after_setup_theme', 'my_custom_image_sizes' );

function na_remove_slug( $post_link, $post, $leavename ) {

    if ( 'gallery' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

function na_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'gallery', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'na_parse_request' );