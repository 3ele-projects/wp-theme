<?php

/**
 * Registers the `git_tools` post type.
 */
function git_tools_init() {
	register_post_type( 'git-tools', array(
		'labels'                => array(
			'name'                  => __( 'Git tools', 'wp-git-tools' ),
			'singular_name'         => __( 'Git tools', 'wp-git-tools' ),
			'all_items'             => __( 'All Git tools', 'wp-git-tools' ),
			'archives'              => __( 'Git tools Archives', 'wp-git-tools' ),
			'attributes'            => __( 'Git tools Attributes', 'wp-git-tools' ),
			'insert_into_item'      => __( 'Insert into git tools', 'wp-git-tools' ),
			'uploaded_to_this_item' => __( 'Uploaded to this git tools', 'wp-git-tools' ),
			'featured_image'        => _x( 'Featured Image', 'git-tools', 'wp-git-tools' ),
			'set_featured_image'    => _x( 'Set featured image', 'git-tools', 'wp-git-tools' ),
			'remove_featured_image' => _x( 'Remove featured image', 'git-tools', 'wp-git-tools' ),
			'use_featured_image'    => _x( 'Use as featured image', 'git-tools', 'wp-git-tools' ),
			'filter_items_list'     => __( 'Filter git tools list', 'wp-git-tools' ),
			'items_list_navigation' => __( 'Git tools list navigation', 'wp-git-tools' ),
			'items_list'            => __( 'Git tools list', 'wp-git-tools' ),
			'new_item'              => __( 'New Git tools', 'wp-git-tools' ),
			'add_new'               => __( 'Add New', 'wp-git-tools' ),
			'add_new_item'          => __( 'Add New Git tools', 'wp-git-tools' ),
			'edit_item'             => __( 'Edit Git tools', 'wp-git-tools' ),
			'view_item'             => __( 'View Git tools', 'wp-git-tools' ),
			'view_items'            => __( 'View Git tools', 'wp-git-tools' ),
			'search_items'          => __( 'Search git tools', 'wp-git-tools' ),
			'not_found'             => __( 'No git tools found', 'wp-git-tools' ),
			'not_found_in_trash'    => __( 'No git tools found in trash', 'wp-git-tools' ),
			'parent_item_colon'     => __( 'Parent Git tools:', 'wp-git-tools' ),
			'menu_name'             => __( 'Git tools', 'wp-git-tools' ),
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
		'rest_base'             => 'git-tools',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'git_tools_init' );

/**
 * Sets the post updated messages for the `git_tools` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `git_tools` post type.
 */
function git_tools_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['git-tools'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Git tools updated. <a target="_blank" href="%s">View git tools</a>', 'wp-git-tools' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-git-tools' ),
		3  => __( 'Custom field deleted.', 'wp-git-tools' ),
		4  => __( 'Git tools updated.', 'wp-git-tools' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Git tools restored to revision from %s', 'wp-git-tools' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Git tools published. <a href="%s">View git tools</a>', 'wp-git-tools' ), esc_url( $permalink ) ),
		7  => __( 'Git tools saved.', 'wp-git-tools' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Git tools submitted. <a target="_blank" href="%s">Preview git tools</a>', 'wp-git-tools' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Git tools scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview git tools</a>', 'wp-git-tools' ),
		date_i18n( __( 'M j, Y @ G:i', 'wp-git-tools' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Git tools draft updated. <a target="_blank" href="%s">Preview git tools</a>', 'wp-git-tools' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'git_tools_updated_messages' );
