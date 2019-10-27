<?php

/**
 * Registers the `wp_services` post type.
 */
function wp_services_init() {
	register_post_type( 'wp-services', array(
		'labels'                => array(
			'name'                  => __( 'Wp services', 'wp-services' ),
			'singular_name'         => __( 'Wp services', 'wp-services' ),
			'all_items'             => __( 'All Wp services', 'wp-services' ),
			'archives'              => __( 'Wp services Archives', 'wp-services' ),
			'attributes'            => __( 'Wp services Attributes', 'wp-services' ),
			'insert_into_item'      => __( 'Insert into wp services', 'wp-services' ),
			'uploaded_to_this_item' => __( 'Uploaded to this wp services', 'wp-services' ),
			'featured_image'        => _x( 'Featured Image', 'wp-services', 'wp-services' ),
			'set_featured_image'    => _x( 'Set featured image', 'wp-services', 'wp-services' ),
			'remove_featured_image' => _x( 'Remove featured image', 'wp-services', 'wp-services' ),
			'use_featured_image'    => _x( 'Use as featured image', 'wp-services', 'wp-services' ),
			'filter_items_list'     => __( 'Filter wp services list', 'wp-services' ),
			'items_list_navigation' => __( 'Wp services list navigation', 'wp-services' ),
			'items_list'            => __( 'Wp services list', 'wp-services' ),
			'new_item'              => __( 'New Wp services', 'wp-services' ),
			'add_new'               => __( 'Add New', 'wp-services' ),
			'add_new_item'          => __( 'Add New Wp services', 'wp-services' ),
			'edit_item'             => __( 'Edit Wp services', 'wp-services' ),
			'view_item'             => __( 'View Wp services', 'wp-services' ),
			'view_items'            => __( 'View Wp services', 'wp-services' ),
			'search_items'          => __( 'Search wp services', 'wp-services' ),
			'not_found'             => __( 'No wp services found', 'wp-services' ),
			'not_found_in_trash'    => __( 'No wp services found in trash', 'wp-services' ),
			'parent_item_colon'     => __( 'Parent Wp services:', 'wp-services' ),
			'menu_name'             => __( 'Wp services', 'wp-services' ),
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
		'rest_base'             => 'wp-services',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'wp_services_init' );

/**
 * Sets the post updated messages for the `wp_services` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `wp_services` post type.
 */
function wp_services_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['wp-services'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Wp services updated. <a target="_blank" href="%s">View wp services</a>', 'wp-services' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-services' ),
		3  => __( 'Custom field deleted.', 'wp-services' ),
		4  => __( 'Wp services updated.', 'wp-services' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Wp services restored to revision from %s', 'wp-services' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Wp services published. <a href="%s">View wp services</a>', 'wp-services' ), esc_url( $permalink ) ),
		7  => __( 'Wp services saved.', 'wp-services' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Wp services submitted. <a target="_blank" href="%s">Preview wp services</a>', 'wp-services' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Wp services scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview wp services</a>', 'wp-services' ),
		date_i18n( __( 'M j, Y @ G:i', 'wp-services' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Wp services draft updated. <a target="_blank" href="%s">Preview wp services</a>', 'wp-services' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'wp_services_updated_messages' );
