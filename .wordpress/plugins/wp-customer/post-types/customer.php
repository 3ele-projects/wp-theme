<?php

/**
 * Registers the `customer` post type.
 */
function customer_init() {
	register_post_type( 'customer', array(
		'labels'                => array(
			'name'                  => __( 'Customers', 'wp-customer' ),
			'singular_name'         => __( 'Customer', 'wp-customer' ),
			'all_items'             => __( 'All Customers', 'wp-customer' ),
			'archives'              => __( 'Customer Archives', 'wp-customer' ),
			'attributes'            => __( 'Customer Attributes', 'wp-customer' ),
			'insert_into_item'      => __( 'Insert into customer', 'wp-customer' ),
			'uploaded_to_this_item' => __( 'Uploaded to this customer', 'wp-customer' ),
			'featured_image'        => _x( 'Featured Image', 'customer', 'wp-customer' ),
			'set_featured_image'    => _x( 'Set featured image', 'customer', 'wp-customer' ),
			'remove_featured_image' => _x( 'Remove featured image', 'customer', 'wp-customer' ),
			'use_featured_image'    => _x( 'Use as featured image', 'customer', 'wp-customer' ),
			'filter_items_list'     => __( 'Filter customers list', 'wp-customer' ),
			'items_list_navigation' => __( 'Customers list navigation', 'wp-customer' ),
			'items_list'            => __( 'Customers list', 'wp-customer' ),
			'new_item'              => __( 'New Customer', 'wp-customer' ),
			'add_new'               => __( 'Add New', 'wp-customer' ),
			'add_new_item'          => __( 'Add New Customer', 'wp-customer' ),
			'edit_item'             => __( 'Edit Customer', 'wp-customer' ),
			'view_item'             => __( 'View Customer', 'wp-customer' ),
			'view_items'            => __( 'View Customers', 'wp-customer' ),
			'search_items'          => __( 'Search customers', 'wp-customer' ),
			'not_found'             => __( 'No customers found', 'wp-customer' ),
			'not_found_in_trash'    => __( 'No customers found in trash', 'wp-customer' ),
			'parent_item_colon'     => __( 'Parent Customer:', 'wp-customer' ),
			'menu_name'             => __( 'Customers', 'wp-customer' ),
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
		'rest_base'             => 'customer',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'customer_init' );

/**
 * Sets the post updated messages for the `customer` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `customer` post type.
 */
function customer_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['customer'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Customer updated. <a target="_blank" href="%s">View customer</a>', 'wp-customer' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-customer' ),
		3  => __( 'Custom field deleted.', 'wp-customer' ),
		4  => __( 'Customer updated.', 'wp-customer' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Customer restored to revision from %s', 'wp-customer' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Customer published. <a href="%s">View customer</a>', 'wp-customer' ), esc_url( $permalink ) ),
		7  => __( 'Customer saved.', 'wp-customer' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Customer submitted. <a target="_blank" href="%s">Preview customer</a>', 'wp-customer' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Customer scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview customer</a>', 'wp-customer' ),
		date_i18n( __( 'M j, Y @ G:i', 'wp-customer' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Customer draft updated. <a target="_blank" href="%s">Preview customer</a>', 'wp-customer' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'customer_updated_messages' );
