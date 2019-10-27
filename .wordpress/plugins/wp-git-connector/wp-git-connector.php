<?php
/**
 * Plugin Name:     Wp Git Connector
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     wp-git-connector
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wp_Git_Connector
 */

// Your code starts here.
include( plugin_dir_path( __FILE__ ) . 'post-types/wp-git-conntector.php');
add_filter( 'page_template', 'wpa3396_page_template' );
function wpa3396_page_template( $page_template )
{
    if ( is_page( 'git-repo' ) ) {
        $page_template = dirname( __FILE__ ) . '/git-repo.php';
    }
    return $page_template;
}


