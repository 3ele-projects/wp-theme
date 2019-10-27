<?php

/**
 * Registers the `wp_projects` post type.
 */
function wp_projects_init() {
	register_post_type( 'projects', array(
		'labels'                => array(
			'name'                  => __( 'Wp projects', 'wp-projects' ),
			'singular_name'         => __( 'Wp projects', 'wp-projects' ),
			'all_items'             => __( 'All Wp projects', 'wp-projects' ),
			'archives'              => __( 'Wp projects Archives', 'wp-projects' ),
			'attributes'            => __( 'Wp projects Attributes', 'wp-projects' ),
			'insert_into_item'      => __( 'Insert into wp projects', 'wp-projects' ),
			'uploaded_to_this_item' => __( 'Uploaded to this wp projects', 'wp-projects' ),
			'featured_image'        => _x( 'Featured Image', 'wp-projects', 'wp-projects' ),
			'set_featured_image'    => _x( 'Set featured image', 'wp-projects', 'wp-projects' ),
			'remove_featured_image' => _x( 'Remove featured image', 'wp-projects', 'wp-projects' ),
			'use_featured_image'    => _x( 'Use as featured image', 'wp-projects', 'wp-projects' ),
			'filter_items_list'     => __( 'Filter wp projects list', 'wp-projects' ),
			'items_list_navigation' => __( 'Wp projects list navigation', 'wp-projects' ),
			'items_list'            => __( 'Wp projects list', 'wp-projects' ),
			'new_item'              => __( 'New Wp projects', 'wp-projects' ),
			'add_new'               => __( 'Add New', 'wp-projects' ),
			'add_new_item'          => __( 'Add New Wp projects', 'wp-projects' ),
			'edit_item'             => __( 'Edit Wp projects', 'wp-projects' ),
			'view_item'             => __( 'View Wp projects', 'wp-projects' ),
			'view_items'            => __( 'View Wp projects', 'wp-projects' ),
			'search_items'          => __( 'Search wp projects', 'wp-projects' ),
			'not_found'             => __( 'No wp projects found', 'wp-projects' ),
			'not_found_in_trash'    => __( 'No wp projects found in trash', 'wp-projects' ),
			'parent_item_colon'     => __( 'Parent Wp projects:', 'wp-projects' ),
			'menu_name'             => __( 'Wp projects', 'wp-projects' ),
		),
		'public'                 => true,
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
		1  => sprintf( __( 'Wp projects updated. <a target="_blank" href="%s">View wp projects</a>', 'wp-projects' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-projects' ),
		3  => __( 'Custom field deleted.', 'wp-projects' ),
		4  => __( 'Wp projects updated.', 'wp-projects' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Wp projects restored to revision from %s', 'wp-projects' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Wp projects published. <a href="%s">View wp projects</a>', 'wp-projects' ), esc_url( $permalink ) ),
		7  => __( 'Wp projects saved.', 'wp-projects' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Wp projects submitted. <a target="_blank" href="%s">Preview wp projects</a>', 'wp-projects' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Wp projects scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview wp projects</a>', 'wp-projects' ),
		date_i18n( __( 'M j, Y @ G:i', 'wp-projects' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Wp projects draft updated. <a target="_blank" href="%s">Preview wp projects</a>', 'wp-projects' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'wp_projects_updated_messages' );
