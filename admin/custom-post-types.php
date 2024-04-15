<?php
function create_custom_post_type() {
    register_post_type('gallery',
        array(
            'labels'      => array(
                'name'          => __('Gallery', 'textdomain'),
                'singular_name' => __('Gallery', 'textdomain'),
                'menu_name'     => __('Galleries', 'text-domain'),
                'add_new'       => __('Add New Gallery', 'text-domain'),
                'add_new_item'  => __('Add New Gallery', 'text-domain'),
            ),
            'menu_icon' => 'dashicons-format-gallery',
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'gallery', 'with_front' => true),
            'supports'    => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_custom_post_type');