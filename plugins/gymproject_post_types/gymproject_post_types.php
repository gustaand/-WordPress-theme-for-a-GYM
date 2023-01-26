<?php 
/*
  Plugin Name: Gym Project - Post Types
  Plugin URI: 
  Description: Añade Post Types al sitio Gym Project
  Version: 1.0.0
  Author: Gustavo Andrew Marques
  Author URI: https://www.gustaand.com
  Text Domain: gymproject
*/ 

if(!defined('ABSPATH')) die(); //prevee a que nadie pueda ver el código abriendo en algun otro sitio.

// Register Custom Post Type
function gymproject_clases() {

	$labels = array(
		'name'                  => _x( 'Clases', 'Post Type General Name', 'gymproject' ),
		'singular_name'         => _x( 'Clase', 'Post Type Singular Name', 'gymproject' ),
		'menu_name'             => __( 'Clases', 'gymproject' ),
		'name_admin_bar'        => __( 'Clase', 'gymproject' ),
		'archives'              => __( 'Archivo', 'gymproject' ),
		'attributes'            => __( 'Atributos', 'gymproject' ),
		'parent_item_colon'     => __( 'Clase Padre', 'gymproject' ),
		'all_items'             => __( 'Todas Las Clases', 'gymproject' ),
		'add_new_item'          => __( 'Agregar Clase', 'gymproject' ),
		'add_new'               => __( 'Agregar Clase', 'gymproject' ),
		'new_item'              => __( 'Nueva Clase', 'gymproject' ),
		'edit_item'             => __( 'Editar Clase', 'gymproject' ),
		'update_item'           => __( 'Actualizar Clase', 'gymproject' ),
		'view_item'             => __( 'Ver Clase', 'gymproject' ),
		'view_items'            => __( 'Ver Clases', 'gymproject' ),
		'search_items'          => __( 'Buscar Clase', 'gymproject' ),
		'not_found'             => __( 'No Encontrado', 'gymproject' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'gymproject' ),
		'featured_image'        => __( 'Imagen Destacada', 'gymproject' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'gymproject' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'gymproject' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'gymproject' ),
		'insert_into_item'      => __( 'Insertar en Clase', 'gymproject' ),
		'uploaded_to_this_item' => __( 'Agregado en Clase', 'gymproject' ),
		'items_list'            => __( 'Lista de Clases', 'gymproject' ),
		'items_list_navigation' => __( 'Navegación de Clases', 'gymproject' ),
		'filter_items_list'     => __( 'Filtrar Clases', 'gymproject' ),
	);
	$args = array(
		'label'                 => __( 'Clases', 'gymproject' ),
		'description'           => __( 'Clases para el Sitio Web', 'gymproject' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'          => true, //true = posts, false = páginas
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'clases', $args );

}
add_action( 'init', 'gymproject_clases', 0 );

// Register Custom Post Type
function gymproject_instructores() {

	$labels = array(
		'name'                  => _x( 'Instructores', 'Post Type General Name', 'gymproject' ),
		'singular_name'         => _x( 'Instructor', 'Post Type Singular Name', 'gymproject' ),
		'menu_name'             => __( 'Instructores', 'gymproject' ),
		'name_admin_bar'        => __( 'Instructor', 'gymproject' ),
		'archives'              => __( 'Archivo', 'gymproject' ),
		'attributes'            => __( 'Atributos', 'gymproject' ),
		'parent_item_colon'     => __( 'Instructor Padre', 'gymproject' ),
		'all_items'             => __( 'Todas Las Instructores', 'gymproject' ),
		'add_new_item'          => __( 'Agregar Instructor', 'gymproject' ),
		'add_new'               => __( 'Agregar Instructor', 'gymproject' ),
		'new_item'              => __( 'Nueva Instructor', 'gymproject' ),
		'edit_item'             => __( 'Editar Instructor', 'gymproject' ),
		'update_item'           => __( 'Actualizar Instructor', 'gymproject' ),
		'view_item'             => __( 'Ver Instructor', 'gymproject' ),
		'view_items'            => __( 'Ver Instructores', 'gymproject' ),
		'search_items'          => __( 'Buscar Instructor', 'gymproject' ),
		'not_found'             => __( 'No Encontrado', 'gymproject' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'gymproject' ),
		'featured_image'        => __( 'Imagen Destacada', 'gymproject' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'gymproject' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'gymproject' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'gymproject' ),
		'insert_into_item'      => __( 'Insertar en Instructor', 'gymproject' ),
		'uploaded_to_this_item' => __( 'Agregado en Instructor', 'gymproject' ),
		'items_list'            => __( 'Lista de Instructores', 'gymproject' ),
		'items_list_navigation' => __( 'Navegación de Instructores', 'gymproject' ),
		'filter_items_list'     => __( 'Filtrar Instructores', 'gymproject' ),
	);
	$args = array(
		'label'                 => __( 'Instructores', 'gymproject' ),
		'description'           => __( 'Instructores para el Sitio Web', 'gymproject' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'instructores', $args );

}
add_action( 'init', 'gymproject_instructores', 0 );


function gymproject_testimoniales() {

	$labels = array(
		'name'                  => _x( 'Testimoniales', 'Post Type General Name', 'gymproject' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'gymproject' ),
		'menu_name'             => __( 'Testimoniales', 'gymproject' ),
		'name_admin_bar'        => __( 'Testimonial', 'gymproject' ),
		'archives'              => __( 'Archivo', 'gymproject' ),
		'attributes'            => __( 'Atributos', 'gymproject' ),
		'parent_item_colon'     => __( 'Testimonial Padre', 'gymproject' ),
		'all_items'             => __( 'Todas Las Testimoniales', 'gymproject' ),
		'add_new_item'          => __( 'Agregar Testimonial', 'gymproject' ),
		'add_new'               => __( 'Agregar Testimonial', 'gymproject' ),
		'new_item'              => __( 'Nueva Testimonial', 'gymproject' ),
		'edit_item'             => __( 'Editar Testimonial', 'gymproject' ),
		'update_item'           => __( 'Actualizar Testimonial', 'gymproject' ),
		'view_item'             => __( 'Ver Testimonial', 'gymproject' ),
		'view_items'            => __( 'Ver Testimoniales', 'gymproject' ),
		'search_items'          => __( 'Buscar Testimonial', 'gymproject' ),
		'not_found'             => __( 'No Encontrado', 'gymproject' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'gymproject' ),
		'featured_image'        => __( 'Imagen Destacada', 'gymproject' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'gymproject' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'gymproject' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'gymproject' ),
		'insert_into_item'      => __( 'Insertar en Testimonial', 'gymproject' ),
		'uploaded_to_this_item' => __( 'Agregado en Testimonial', 'gymproject' ),
		'items_list'            => __( 'Lista de Testimoniales', 'gymproject' ),
		'items_list_navigation' => __( 'Navegación de Testimoniales', 'gymproject' ),
		'filter_items_list'     => __( 'Filtrar Testimoniales', 'gymproject' ),
	);
	$args = array(
		'label'                 => __( 'Testimoniales', 'gymproject' ),
		'description'           => __( 'Testimoniales para el Sitio Web', 'gymproject' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-editor-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimoniales', $args );

}
add_action( 'init', 'gymproject_testimoniales', 0 );