<?php

/**
 * Registers the `wp_time_line` post type.
 */
function wp_time_line_init() {
	register_post_type( 'time-line', array(
		'labels'                => array(
			'name'                  => __( 'Wp time lines', 'wp-time-line' ),
			'singular_name'         => __( 'Wp time line', 'wp-time-line' ),
			'all_items'             => __( 'All Wp time lines', 'wp-time-line' ),
			'archives'              => __( 'Wp time line Archives', 'wp-time-line' ),
			'attributes'            => __( 'Wp time line Attributes', 'wp-time-line' ),
			'insert_into_item'      => __( 'Insert into wp time line', 'wp-time-line' ),
			'uploaded_to_this_item' => __( 'Uploaded to this wp time line', 'wp-time-line' ),
			'featured_image'        => _x( 'Featured Image', 'wp-time-line', 'wp-time-line' ),
			'set_featured_image'    => _x( 'Set featured image', 'wp-time-line', 'wp-time-line' ),
			'remove_featured_image' => _x( 'Remove featured image', 'wp-time-line', 'wp-time-line' ),
			'use_featured_image'    => _x( 'Use as featured image', 'wp-time-line', 'wp-time-line' ),
			'filter_items_list'     => __( 'Filter wp time lines list', 'wp-time-line' ),
			'items_list_navigation' => __( 'Wp time lines list navigation', 'wp-time-line' ),
			'items_list'            => __( 'Wp time lines list', 'wp-time-line' ),
			'new_item'              => __( 'New Wp time line', 'wp-time-line' ),
			'add_new'               => __( 'Add New', 'wp-time-line' ),
			'add_new_item'          => __( 'Add New Wp time line', 'wp-time-line' ),
			'edit_item'             => __( 'Edit Wp time line', 'wp-time-line' ),
			'view_item'             => __( 'View Wp time line', 'wp-time-line' ),
			'view_items'            => __( 'View Wp time lines', 'wp-time-line' ),
			'search_items'          => __( 'Search wp time lines', 'wp-time-line' ),
			'not_found'             => __( 'No wp time lines found', 'wp-time-line' ),
			'not_found_in_trash'    => __( 'No wp time lines found in trash', 'wp-time-line' ),
			'parent_item_colon'     => __( 'Parent Wp time line:', 'wp-time-line' ),
			'menu_name'             => __( 'Wp time lines', 'wp-time-line' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'wp-time-line',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'wp_time_line_init' );

/**
 * Sets the post updated messages for the `wp_time_line` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `wp_time_line` post type.
 */
function wp_time_line_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['wp-time-line'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Wp time line updated. <a target="_blank" href="%s">View wp time line</a>', 'wp-time-line' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-time-line' ),
		3  => __( 'Custom field deleted.', 'wp-time-line' ),
		4  => __( 'Wp time line updated.', 'wp-time-line' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Wp time line restored to revision from %s', 'wp-time-line' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Wp time line published. <a href="%s">View wp time line</a>', 'wp-time-line' ), esc_url( $permalink ) ),
		7  => __( 'Wp time line saved.', 'wp-time-line' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Wp time line submitted. <a target="_blank" href="%s">Preview wp time line</a>', 'wp-time-line' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Wp time line scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview wp time line</a>', 'wp-time-line' ),
		date_i18n( __( 'M j, Y @ G:i', 'wp-time-line' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Wp time line draft updated. <a target="_blank" href="%s">Preview wp time line</a>', 'wp-time-line' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'wp_time_line_updated_messages' );
