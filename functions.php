<?php

function scripts()
{
    wp_enqueue_style('nbd-style', get_template_directory_uri() . '/dist/nbd-style.css', [], 1, 'all');
    wp_enqueue_style('drawer-style', get_template_directory_uri() . '/dist/vendors/slide-out-panel.min.css', [], 1, 'all');
    wp_enqueue_style('slick-carousel', get_template_directory_uri() . '/dist/vendors/slick.css');
    
    wp_enqueue_script('nbd-script', get_template_directory_uri() . '/dist/scripts/nbd-script.js', ['jquery'], 1, true);
    wp_enqueue_script('drawer-script', get_template_directory_uri() . '/dist/vendors/slide-out-panel.min.js', ['jquery'], 1, true);
    wp_enqueue_script('slick-carousel', get_template_directory_uri() . '/dist/vendors/slick.min.js', array('jquery'), '1.9.0', true);
}
add_action('wp_enqueue_scripts', 'scripts');

function enqueue_nbd_script() {
    wp_enqueue_script('nbd-script', get_template_directory_uri() . '/dist/nbd-script.js', ['jquery'], 1, true);

    wp_localize_script('nbd-script', 'my_ajax_object', array(
        'nonce' => wp_create_nonce('my_nonce_action'),
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}



add_action('wp_enqueue_scripts', 'enqueue_nbd_script');

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

add_action('wp_ajax_add_variation_to_cart', 'add_variation_to_cart');
add_action('wp_ajax_nopriv_add_variation_to_cart', 'add_variation_to_cart');

function add_variation_to_cart() {
    if (isset($_POST['product_id']) && isset($_POST['variation_id'])) {
        $product_id = intval($_POST['product_id']);
        $variation_id = intval($_POST['variation_id']);

        WC()->cart->add_to_cart($product_id, 1, $variation_id);
        
        echo 'Variation added to cart successfully.';
    }
    wp_die();
}

function nbd_customize_register($wp_customize) {
    $wp_customize->add_panel('nbd_panel', array(
        'title'    => __('No Bad Days Theme', 'no-bad-days'),
        'priority' => 30,
    ));

    $wp_customize->add_section('nbd_footer', array(
        'title'        => __('Footer', 'no-bad-days'),
        'priority'     => 10,
        'panel'        => 'nbd_panel',
    ));

    $wp_customize->add_setting('nbd_instagram_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbd_instagram_control', array(
        'label'    => __('Instagram URL', 'no-bad-days'),
        'section'  => 'nbd_footer',
        'settings' => 'nbd_instagram_setting',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbd_facebook_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbd_facebook_control', array(
        'label'    => __('Facebook URL', 'no-bad-days'),
        'section'  => 'nbd_footer',
        'settings' => 'nbd_facebook_setting',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbd_tiktok_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbd_tiktok_control', array(
        'label'    => __('TikTok URL', 'no-bad-days'),
        'section'  => 'nbd_footer',
        'settings' => 'nbd_tiktok_setting',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'nbd_customize_register');

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

require_once get_template_directory() . '/components/single-product.php';