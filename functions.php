<?php

if(!function_exists('headless_setup')){
	function headless_setup(){
		/**
		 * Rquired files
		 * Custom post types && metaboxes
		 */
		require get_parent_theme_file_path('/inc/custom-post-types.php');
		require get_parent_theme_file_path('/inc/metaboxes.php');
	}

	add_theme_support('automatic-feed-links');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
add_action( 'after_setup_theme', 'headless_setup' );

function headless_add_support_for_cpt() {
	add_post_type_support( 'podcasts', 'custom-fields' );
}
add_action( 'init', 'headless_add_support_for_cpt' );

$object_type = 'post'; //must be 'post' for custom post types
$args1 = array( 
    'type'         => 'string',
    'description'  => 'A meta key associated with a string meta value.',
    'single'       => true,
    'show_in_rest' => true,
);
register_meta( $object_type, 'podcast_url_meta', $args1 );
register_meta( $object_type, 'podcast_dur_meta', $args1 );

register_meta( $object_type, 'podcast_video_url_meta', $args1 );
register_meta( $object_type, 'podcast_video_dur_meta', $args1 );