<?php

/**
 * Registers the `wp_projects` post type.
 */
function wp_projects_init() {
	register_post_type( 'projects', array(
		'labels'                => array(
			'name'                  => __( 'Wp projects', 'wp-customer' ),
			'singular_name'         => __( 'Wp projects', 'wp-customer' ),
			'all_items'             => __( 'All Wp projects', 'wp-customer' ),
			'archives'              => __( 'Wp projects Archives', 'wp-customer' ),
			'attributes'            => __( 'Wp projects Attributes', 'wp-customer' ),
			'insert_into_item'      => __( 'Insert into wp projects', 'wp-customer' ),
			'uploaded_to_this_item' => __( 'Uploaded to this wp projects', 'wp-customer' ),
			'featured_image'        => _x( 'Featured Image', 'wp-projects', 'wp-customer' ),
			'set_featured_image'    => _x( 'Set featured image', 'wp-projects', 'wp-customer' ),
			'remove_featured_image' => _x( 'Remove featured image', 'wp-projects', 'wp-customer' ),
			'use_featured_image'    => _x( 'Use as featured image', 'wp-projects', 'wp-customer' ),
			'filter_items_list'     => __( 'Filter wp projects list', 'wp-customer' ),
			'items_list_navigation' => __( 'Wp projects list navigation', 'wp-customer' ),
			'items_list'            => __( 'Wp projects list', 'wp-customer' ),
			'new_item'              => __( 'New Wp projects', 'wp-customer' ),
			'add_new'               => __( 'Add New', 'wp-customer' ),
			'add_new_item'          => __( 'Add New Wp projects', 'wp-customer' ),
			'edit_item'             => __( 'Edit Wp projects', 'wp-customer' ),
			'view_item'             => __( 'View Wp projects', 'wp-customer' ),
			'view_items'            => __( 'View Wp projects', 'wp-customer' ),
			'search_items'          => __( 'Search wp projects', 'wp-customer' ),
			'not_found'             => __( 'No wp projects found', 'wp-customer' ),
			'not_found_in_trash'    => __( 'No wp projects found in trash', 'wp-customer' ),
			'parent_item_colon'     => __( 'Parent Wp projects:', 'wp-customer' ),
			'menu_name'             => __( 'Wp projects', 'wp-customer' ),
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
		'rest_base'             => 'wp-projects',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'wp_projects_init' );

/**
 * Sets the post updated messages for the `wp_projects` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `wp_projects` post type.
 */
function wp_projects_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['wp-projects'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Wp projects updated. <a target="_blank" href="%s">View wp projects</a>', 'wp-customer' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-customer' ),
		3  => __( 'Custom field deleted.', 'wp-customer' ),
		4  => __( 'Wp projects updated.', 'wp-customer' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Wp projects restored to revision from %s', 'wp-customer' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Wp projects published. <a href="%s">View wp projects</a>', 'wp-customer' ), esc_url( $permalink ) ),
		7  => __( 'Wp projects saved.', 'wp-customer' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Wp projects submitted. <a target="_blank" href="%s">Preview wp projects</a>', 'wp-customer' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Wp projects scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview wp projects</a>', 'wp-customer' ),
		date_i18n( __( 'M j, Y @ G:i', 'wp-customer' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Wp projects draft updated. <a target="_blank" href="%s">Preview wp projects</a>', 'wp-customer' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'wp_projects_updated_messages' );
