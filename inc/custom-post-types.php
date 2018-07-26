<?php 
	add_action('init', function(){
		$labels = array(
			'name'          => 'Viajes',
			'singular_name' => 'Viaje',
			'add_new'       => 'Nuevo Viaje',
			'add_new_item'  => 'Nuevo Viaje',
			'edit_item'     => 'Editar Viaje',
			'new_item'      => 'Nuevo Viaje',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Viaje',
			'search_items'  => 'Buscar Viaje',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Viajes'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'viajes' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'menu_icon'			 => 'dashicons-palmtree',
			'hierarchical'       => false,
			'menu_position'      => 2,
			'show_in_rest'		 => true,
			'rest_base'			 => 'viajes',
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' )
		);
		register_post_type('viajes', $args);

	});