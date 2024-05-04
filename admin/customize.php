<?php
/* 
    These custom fields are in /wp-admin/ -> Appearance -> Customize
*/

function nbdc_customize_register($wp_customize) {
    $wp_customize->add_panel('nbdc_panel', array(
        'title'    => __('No Bad Days Theme', 'no-bad-days-club'),
        'priority' => 30,
    ));

    $wp_customize->add_section('nbdc_footer_middle', array(
        'title'        => __('Footer Middle', 'no-bad-days-club'),
        'priority'     => 10,
        'panel'        => 'nbdc_panel',
    ));

    $wp_customize->add_setting('nbdc_offer_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_offer_title_control', array(
        'label'    => __('Offer Title', 'no-bad-days-club'),
        'section'  => 'nbdc_footer_middle',
        'settings' => 'nbdc_offer_title',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbdc_offer_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_offer_text_control', array(
        'label'    => __('Offer Text', 'no-bad-days-club'),
        'section'  => 'nbdc_footer_middle',
        'settings' => 'nbdc_offer_text',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbdc_input_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_input_text_control', array(
        'label'    => __('Input Text', 'no-bad-days-club'),
        'section'  => 'nbdc_footer_middle',
        'settings' => 'nbdc_input_text',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbdc_cta_text', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_cta_text_control', array(
        'label'    => __('CTA Text', 'no-bad-days-club'),
        'section'  => 'nbdc_footer_middle',
        'settings' => 'nbdc_cta_text',
        'type'     => 'text',
    ));

    $wp_customize->add_section('nbdc_footer_socials', array(
        'title'        => __('Footer Socials', 'no-bad-days-club'),
        'priority'     => 10,
        'panel'        => 'nbdc_panel',
    ));

    $wp_customize->add_setting('nbdc_social_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_social_title_control', array(
        'label'    => __('Social Title', 'no-bad-days-club'),
        'section'  => 'nbdc_footer_socials',
        'settings' => 'nbdc_social_title',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbdc_instagram', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_instagram_control', array(
        'label'    => __('Instagram URL', 'no-bad-days-club'),
        'section'  => 'nbdc_footer_socials',
        'settings' => 'nbdc_instagram',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbdc_facebook', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_facebook_control', array(
        'label'    => __('Facebook URL', 'no-bad-days-club'),
        'section'  => 'nbdc_footer_socials',
        'settings' => 'nbdc_facebook',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('nbdc_tiktok', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('nbdc_tiktok_control', array(
        'label'    => __('TikTok URL', 'no-bad-days-club'),
        'section'  => 'nbdc_footer_socials',
        'settings' => 'nbdc_tiktok',
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