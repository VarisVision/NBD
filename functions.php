<?php

function scripts()
{
    wp_register_style('style', get_template_directory_uri() . '/dist/nbd-style.css', [], 1, 'all');
    wp_enqueue_style('style');

    wp_enqueue_script('jquery');

    wp_register_script('script', get_template_directory_uri() . '/dist/nbd-script.js', ['jquery'], 1, true);
    wp_enqueue_script('script');
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

register_nav_menus (
    array(
        'main-nav-left' => 'Main Navigation Left Location',
        'main-nav-right' => 'Main Navigation Right Location',
        'main-nav-mobile' => 'Main Navigation Mobile Location',
    )
);