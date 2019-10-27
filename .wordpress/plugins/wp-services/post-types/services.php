<?php

/**
 * Registers the `services` post type.
 */
function services_init() {
	register_post_type( 'services', array(
		'labels'                => array(
			'name'                  => __( 'Services', 'wp-services' ),
			'singular_name'         => __( 'Services', 'wp-services' ),
			'all_items'             => __( 'All Services', 'wp-services' ),
			'archives'              => __( 'Services Archives', 'wp-services' ),
			'attributes'            => __( 'Services Attributes', 'wp-services' ),
			'insert_into_item'      => __( 'Insert into services', 'wp-services' ),
			'uploaded_to_this_item' => __( 'Uploaded to this services', 'wp-services' ),
			'featured_image'        => _x( 'Featured Image', 'services', 'wp-services' ),
			'set_featured_image'    => _x( 'Set featured image', 'services', 'wp-services' ),
			'remove_featured_image' => _x( 'Remove featured image', 'services', 'wp-services' ),
			'use_featured_image'    => _x( 'Use as featured image', 'services', 'wp-services' ),
			'filter_items_list'     => __( 'Filter services list', 'wp-services' ),
			'items_list_navigation' => __( 'Services list navigation', 'wp-services' ),
			'items_list'            => __( 'Services list', 'wp-services' ),
			'new_item'              => __( 'New Services', 'wp-services' ),
			'add_new'               => __( 'Add New', 'wp-services' ),
			'add_new_item'          => __( 'Add New Services', 'wp-services' ),
			'edit_item'             => __( 'Edit Services', 'wp-services' ),
			'view_item'             => __( 'View Services', 'wp-services' ),
			'view_items'            => __( 'View Services', 'wp-services' ),
			'search_items'          => __( 'Search services', 'wp-services' ),
			'not_found'             => __( 'No services found', 'wp-services' ),
			'not_found_in_trash'    => __( 'No services found in trash', 'wp-services' ),
			'parent_item_colon'     => __( 'Parent Services:', 'wp-services' ),
			'menu_name'             => __( 'Services', 'wp-services' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor','thumbnail' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'services',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'services_init' );

/**
 * Sets the post updated messages for the `services` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `services` post type.
 */
function services_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['services'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Services updated. <a target="_blank" href="%s">View services</a>', 'wp-services' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-services' ),
		3  => __( 'Custom field deleted.', 'wp-services' ),
		4  => __( 'Services updated.', 'wp-services' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Services restored to revision from %s', 'wp-services' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Services published. <a href="%s">View services</a>', 'wp-services' ), esc_url( $permalink ) ),
		7  => __( 'Services saved.', 'wp-services' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Services submitted. <a target="_blank" href="%s">Preview services</a>', 'wp-services' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Services scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview services</a>', 'wp-services' ),
		date_i18n( __( 'M j, Y @ G:i', 'wp-services' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Services draft updated. <a target="_blank" href="%s">Preview services</a>', 'wp-services' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'services_updated_messages' );
