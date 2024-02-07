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
            'rewrite'     => array('slug' => 'gallery', 'with_front' => false),
            'supports'    => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_custom_post_type');


function remove_slug_from_permalink_string( $post_link, $post ) {

	if ( 'publish' !== $post->post_status ) {
		return $post_link;
	}

	if ( 'gallery' === $post->post_type ) {
		$post_link = str_replace(
			'/' . $post->post_type . '/',
			'/',
			$post_link
		);
	}

	return $post_link;
}
add_filter( 'post_type_link', 'remove_slug_from_permalink_string', 10, 2 );


function add_post_type_to_query( $query ) {

	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( empty( $query->query['name'] ) ) {
		return;
	}

	$query->set(
		'post_type',
		[
			'post',
			'page',
			'gallery',
		]
	);
}
add_action( 'pre_get_posts', 'add_post_type_to_query' );
?>