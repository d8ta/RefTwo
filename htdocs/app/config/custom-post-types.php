<?php

$config["customPostTypes"][\A365\Wordpress\Models\Section::POST_TYPE]['public'] = true;

$config = [
	"customPostTypes" => [
		/* ======== Location  ======== */
		"location" => [
			'label'               => 'Standort',
			'description'         => 'Post Type für Standort',
			'labels'              => [
				'name'                => 'Standort',
				'singular_name'       => 'Standort',
				'menu_name'           => 'Standorte',
				'name_admin_bar'      => 'Standort',
				'parent_item_colon'   => 'Parent Item:',
				'all_items'           => 'Alle Standorte',
				'add_new_item'        => 'Neuen Standort erstellen',
				'add_new'             => 'Neuen Standort erstellen',
				'new_item'            => 'Neuer Standort',
				'edit_item'           => 'Standort bearbeiten',
				'update_item'         => 'Standort bearbeiten',
				'view_item'           => 'Standort anzeigen',
				'search_items'        => 'Standort suchen',
				'not_found'           => 'Keine Standorte gefunden',
				'not_found_in_trash'  => 'Nicht im Papierkorb gefunden',
			],
			'supports'            => array('title'),
			'taxonomies'          => array( '' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 20,
			'menu_icon'			  => 'dashicons-location-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,		
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'capability_type'     => 'post',
		],


	]
];
