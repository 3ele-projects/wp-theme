<?php

/**
 * Registers the `repo` post type.
 */
function repo_init() {
	register_post_type( 'repo', array(
		'labels'                => array(
			'name'                  => __( 'Repos', 'wp-git-connector' ),
			'singular_name'         => __( 'Repo', 'wp-git-connector' ),
			'all_items'             => __( 'All Repos', 'wp-git-connector' ),
			'archives'              => __( 'Repo Archives', 'wp-git-connector' ),
			'attributes'            => __( 'Repo Attributes', 'wp-git-connector' ),
			'insert_into_item'      => __( 'Insert into repo', 'wp-git-connector' ),
			'uploaded_to_this_item' => __( 'Uploaded to this repo', 'wp-git-connector' ),
			'featured_image'        => _x( 'Featured Image', 'repo', 'wp-git-connector' ),
			'set_featured_image'    => _x( 'Set featured image', 'repo', 'wp-git-connector' ),
			'remove_featured_image' => _x( 'Remove featured image', 'repo', 'wp-git-connector' ),
			'use_featured_image'    => _x( 'Use as featured image', 'repo', 'wp-git-connector' ),
			'filter_items_list'     => __( 'Filter repos list', 'wp-git-connector' ),
			'items_list_navigation' => __( 'Repos list navigation', 'wp-git-connector' ),
			'items_list'            => __( 'Repos list', 'wp-git-connector' ),
			'new_item'              => __( 'New Repo', 'wp-git-connector' ),
			'add_new'               => __( 'Add New', 'wp-git-connector' ),
			'add_new_item'          => __( 'Add New Repo', 'wp-git-connector' ),
			'edit_item'             => __( 'Edit Repo', 'wp-git-connector' ),
			'view_item'             => __( 'View Repo', 'wp-git-connector' ),
			'view_items'            => __( 'View Repos', 'wp-git-connector' ),
			'search_items'          => __( 'Search repos', 'wp-git-connector' ),
			'not_found'             => __( 'No repos found', 'wp-git-connector' ),
			'not_found_in_trash'    => __( 'No repos found in trash', 'wp-git-connector' ),
			'parent_item_colon'     => __( 'Parent Repo:', 'wp-git-connector' ),
			'menu_name'             => __( 'Repos', 'wp-git-connector' ),
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
		'rest_base'             => 'repo',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'repo_init' );

/**
 * Sets the post updated messages for the `repo` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `repo` post type.
 */
function repo_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['repo'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Repo updated. <a target="_blank" href="%s">View repo</a>', 'wp-git-connector' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-git-connector' ),
		3  => __( 'Custom field deleted.', 'wp-git-connector' ),
		4  => __( 'Repo updated.', 'wp-git-connector' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Repo restored to revision from %s', 'wp-git-connector' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Repo published. <a href="%s">View repo</a>', 'wp-git-connector' ), esc_url( $permalink ) ),
		7  => __( 'Repo saved.', 'wp-git-connector' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Repo submitted. <a target="_blank" href="%s">Preview repo</a>', 'wp-git-connector' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Repo scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview repo</a>', 'wp-git-connector' ),
		date_i18n( __( 'M j, Y @ G:i', 'wp-git-connector' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Repo draft updated. <a target="_blank" href="%s">Preview repo</a>', 'wp-git-connector' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'repo_updated_messages' );
