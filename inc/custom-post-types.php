<?php
/**
 * Declare custom post types for the theme.
 * Yes, this is "supposed" to be in a plugin. ¯\_(ツ)_/¯
 *
 * @package uds-wordpress-child-theme
 */

// Necessary to allow thumbnails to show up in block editor.
add_theme_support( 'post-thumbnails' );

/**
 * Register post type: Reference Guide (reference-guide)
 * Register associated taxonomy: Guide tag (guide-tag)
 */
function pitchfork_lth_cpt_qrg() {
	$labels = array(
		'name'                  => _x( 'Guides', 'Post Type General Name', 'pitchfork_lth' ),
		'singular_name'         => _x( 'Guide', 'Post Type Singular Name', 'pitchfork_lth' ),
		'menu_name'             => __( 'Reference Guides', 'pitchfork_lth' ),
		'name_admin_bar'        => __( 'Reference Guides', 'pitchfork_lth' ),
		'archives'              => __( 'Guide Archives', 'pitchfork_lth' ),
		'attributes'            => __( 'Guide Attributes', 'pitchfork_lth' ),
		'parent_item_colon'     => __( 'Parent Guide:', 'pitchfork_lth' ),
		'all_items'             => __( 'All Guides', 'pitchfork_lth' ),
		'add_new_item'          => __( 'Add New Guide', 'pitchfork_lth' ),
		'add_new'               => __( 'Add New', 'pitchfork_lth' ),
		'new_item'              => __( 'New Guide', 'pitchfork_lth' ),
		'edit_item'             => __( 'Edit Guide', 'pitchfork_lth' ),
		'update_item'           => __( 'Update Guide', 'pitchfork_lth' ),
		'view_item'             => __( 'View Guide', 'pitchfork_lth' ),
		'view_items'            => __( 'View Guides', 'pitchfork_lth' ),
		'search_items'          => __( 'Search Guides', 'pitchfork_lth' ),
		'not_found'             => __( 'Not found', 'pitchfork_lth' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pitchfork_lth' ),
		'featured_image'        => __( 'Featured Image', 'pitchfork_lth' ),
		'set_featured_image'    => __( 'Set featured image', 'pitchfork_lth' ),
		'remove_featured_image' => __( 'Remove featured image', 'pitchfork_lth' ),
		'use_featured_image'    => __( 'Use as featured image', 'pitchfork_lth' ),
		'insert_into_item'      => __( 'Insert into guide', 'pitchfork_lth' ),
		'uploaded_to_this_item' => __( 'Uploaded to this guide', 'pitchfork_lth' ),
		'items_list'            => __( 'Guides list', 'pitchfork_lth' ),
		'items_list_navigation' => __( 'Guides list navigation', 'pitchfork_lth' ),
		'filter_items_list'     => __( 'Filter guides list', 'pitchfork_lth' ),
	);
	$args = array(
		'label'                 => __( 'Guide', 'pitchfork_lth' ),
		'description'           => __( 'Quick reference guides', 'pitchfork_lth' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'guide-tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'reference-guide', $args );

}
add_action( 'init', 'pitchfork_lth_cpt_qrg', 0 );

// Associated taxonomy for reference-guide
function pitchfork_lth_tax_guidetag() {

	$labels = array(
		'name'                       => _x( 'Guide tags', 'Taxonomy General Name', 'pitchfork_lth' ),
		'singular_name'              => _x( 'Guide tag', 'Taxonomy Singular Name', 'pitchfork_lth' ),
		'menu_name'                  => __( 'Guide tags', 'pitchfork_lth' ),
		'all_items'                  => __( 'All tags', 'pitchfork_lth' ),
		'parent_item'                => __( 'Parent tag', 'pitchfork_lth' ),
		'parent_item_colon'          => __( 'Parent tag:', 'pitchfork_lth' ),
		'new_item_name'              => __( 'New tag name', 'pitchfork_lth' ),
		'add_new_item'               => __( 'Add New tag', 'pitchfork_lth' ),
		'edit_item'                  => __( 'Edit tag', 'pitchfork_lth' ),
		'update_item'                => __( 'Update tag', 'pitchfork_lth' ),
		'view_item'                  => __( 'View tag', 'pitchfork_lth' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'pitchfork_lth' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'pitchfork_lth' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pitchfork_lth' ),
		'popular_items'              => __( 'Popular tags', 'pitchfork_lth' ),
		'search_items'               => __( 'Search tags', 'pitchfork_lth' ),
		'not_found'                  => __( 'Not Found', 'pitchfork_lth' ),
		'no_terms'                   => __( 'No tags', 'pitchfork_lth' ),
		'items_list'                 => __( 'Tags list', 'pitchfork_lth' ),
		'items_list_navigation'      => __( 'Tags list navigation', 'pitchfork_lth' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'          	 => true,
	);
	register_taxonomy( 'guide-tag', array( 'reference-guide' ), $args );

}
add_action( 'init', 'pitchfork_lth_tax_guidetag', 0 );



/**
 * Register post type: Learning Technologies (learningtechnology)
 * Register associated taxonomy: Guide tag (edtech-tag)
 */
function pitchfork_lth_cpt_learn_tech() {

	$labels = array(
		'name'                  => _x( 'Learning Technologies', 'Post Type General Name', 'pitchfork_lth' ),
		'singular_name'         => _x( 'Learning Technology', 'Post Type Singular Name', 'pitchfork_lth' ),
		'menu_name'             => __( 'Learning Technologies', 'pitchfork_lth' ),
		'name_admin_bar'        => __( 'Learning Technologies', 'pitchfork_lth' ),
		'archives'              => __( 'Item Archives', 'pitchfork_lth' ),
		'attributes'            => __( 'Item Attributes', 'pitchfork_lth' ),
		'parent_item_colon'     => __( 'Parent Item:', 'pitchfork_lth' ),
		'all_items'             => __( 'All Items', 'pitchfork_lth' ),
		'add_new_item'          => __( 'Add New Item', 'pitchfork_lth' ),
		'add_new'               => __( 'Add New', 'pitchfork_lth' ),
		'new_item'              => __( 'New Item', 'pitchfork_lth' ),
		'edit_item'             => __( 'Edit Item', 'pitchfork_lth' ),
		'update_item'           => __( 'Update Item', 'pitchfork_lth' ),
		'view_item'             => __( 'View Item', 'pitchfork_lth' ),
		'view_items'            => __( 'View Items', 'pitchfork_lth' ),
		'search_items'          => __( 'Search Item', 'pitchfork_lth' ),
		'not_found'             => __( 'Not found', 'pitchfork_lth' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pitchfork_lth' ),
		'featured_image'        => __( 'Featured Image', 'pitchfork_lth' ),
		'set_featured_image'    => __( 'Set featured image', 'pitchfork_lth' ),
		'remove_featured_image' => __( 'Remove featured image', 'pitchfork_lth' ),
		'use_featured_image'    => __( 'Use as featured image', 'pitchfork_lth' ),
		'insert_into_item'      => __( 'Insert into item', 'pitchfork_lth' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'pitchfork_lth' ),
		'items_list'            => __( 'Items list', 'pitchfork_lth' ),
		'items_list_navigation' => __( 'Items list navigation', 'pitchfork_lth' ),
		'filter_items_list'     => __( 'Filter items list', 'pitchfork_lth' ),
	);
	$args = array(
		'label'                 => __( 'Learning Technology', 'pitchfork_lth' ),
		'description'           => __( 'Technologies that you can use to help facilitate learning', 'pitchfork_lth' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt' ),
		'taxonomies'            => array( 'edtech-tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'show_in_rest'          => true,
	);
	register_post_type( 'learning-technology', $args );

}
add_action( 'init', 'pitchfork_lth_cpt_learn_tech', 0 );

// Associated taxonomy for learning-technology
function pitchfork_lth_tax_edtech_tag() {

	$labels = array(
		'name'                       => _x( 'Technology tags', 'Taxonomy General Name', 'pitchfork_lth' ),
		'singular_name'              => _x( 'Technology  tag', 'Taxonomy Singular Name', 'pitchfork_lth' ),
		'menu_name'                  => __( 'Technology  tags', 'pitchfork_lth' ),
		'all_items'                  => __( 'All tags', 'pitchfork_lth' ),
		'parent_item'                => __( 'Parent tag', 'pitchfork_lth' ),
		'parent_item_colon'          => __( 'Parent tag:', 'pitchfork_lth' ),
		'new_item_name'              => __( 'New tag name', 'pitchfork_lth' ),
		'add_new_item'               => __( 'Add New tag', 'pitchfork_lth' ),
		'edit_item'                  => __( 'Edit tag', 'pitchfork_lth' ),
		'update_item'                => __( 'Update tag', 'pitchfork_lth' ),
		'view_item'                  => __( 'View tag', 'pitchfork_lth' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'pitchfork_lth' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'pitchfork_lth' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pitchfork_lth' ),
		'popular_items'              => __( 'Popular tags', 'pitchfork_lth' ),
		'search_items'               => __( 'Search tags', 'pitchfork_lth' ),
		'not_found'                  => __( 'Not Found', 'pitchfork_lth' ),
		'no_terms'                   => __( 'No tags', 'pitchfork_lth' ),
		'items_list'                 => __( 'Tags list', 'pitchfork_lth' ),
		'items_list_navigation'      => __( 'Tags list navigation', 'pitchfork_lth' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'          	 => true,
	);
	register_taxonomy( 'edtech-tag', array( 'learning-technology' ), $args );

}
add_action( 'init', 'pitchfork_lth_tax_edtech_tag', 0 );
