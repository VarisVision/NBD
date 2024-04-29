<?php
/* 
    These custom fields are in /wp-admin/ -> Appearance -> Customize
*/

function nbdc_customize_register($wp_customize) {
    $wp_customize->add_panel('nbdc_panel', array(
        'title'    => __('No Bad Days Theme', 'no-bad-days-club'),
        'priority' => 30,
    ));

    $wp_customize->add_section('nbdc_footer', array(
        'title'        => __('Footer', 'no-bad-days-club'),
        'priority'     => 10,
        'panel'        => 'nbdc_panel',
    ));

    $wp_customize->add_setting('nbdc_instagram_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_instagram_control', array(
        'label'    => __('Instagram URL', 'no-bad-days-club'),
        'section'  => 'nbdc_footer',
        'settings' => 'nbdc_instagram_setting',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbdc_facebook_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_facebook_control', array(
        'label'    => __('Facebook URL', 'no-bad-days-club'),
        'section'  => 'nbdc_footer',
        'settings' => 'nbdc_facebook_setting',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbdc_tiktok_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_tiktok_control', array(
        'label'    => __('TikTok URL', 'no-bad-days-club'),
        'section'  => 'nbdc_footer',
        'settings' => 'nbdc_tiktok_setting',
        'type'     => 'text',
    ));

    $wp_customize->add_section('nbdc_404', array(
        'title'        => __('404 Page', 'no-bad-days-club'),
        'priority'     => 10,
        'panel'        => 'nbdc_panel',
    ));

    $wp_customize->add_setting('404_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('404_text_control', array(
        'label'    => __('Text', 'no-bad-days-club'),
        'section'  => 'nbdc_404',
        'settings' => '404_text',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('404_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, '404_background_image_control', array(
        'label'    => __('Background Image', 'no-bad-days-club'),
        'section'  => 'nbdc_404',
        'settings' => '404_background_image',
    )));

    $wp_customize->add_setting('404_btn_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('404_btn_text_control', array(
        'label'    => __('Button Text', 'your-text-domain'),
        'section'  => 'nbdc_404',
        'settings' => '404_btn_text',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('404_btn_url', array(
        'default' => '', 
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('404_btn_url_control', array(
        'label'    => __('Button URL', 'your-text-domain'),
        'section'  => 'nbdc_404',
        'settings' => '404_btn_url',
        'type'     => 'url',
    ));
}

add_action('customize_register', 'nbdc_customize_register');
?>