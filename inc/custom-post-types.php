<?php 
	add_action('init', function(){
		$labels = array(
			'name'          => 'Podcasts',
			'singular_name' => 'Podcast',
			'add_new'       => 'Nuevo Podcast',
			'add_new_item'  => 'Nuevo Podcast',
			'edit_item'     => 'Editar Podcast',
			'new_item'      => 'Nuevo Podcast',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Podcast',
			'search_items'  => 'Buscar Podcast',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Podcasts'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'podcasts' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'menu_icon'			 => 'dashicons-admin-network',
			'hierarchical'       => false,
			'menu_position'      => 2,
			'show_in_rest'		 => true,
			'rest_base'			 => 'podcasts',
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' )
		);
		register_post_type('podcasts', $args);

	});