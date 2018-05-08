<?php /*
* Custom Post Types
*/



function avada_portfolio_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Portfolio', 'Post Type General Name', 'bigwaha' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'bigwaha' ),
		'menu_name'           => __( 'Portfolio', 'bigwaha' ),
		'parent_item_colon'   => __( 'Parent Portfolio', 'bigwaha' ),
		'all_items'           => __( 'Portfolio', 'bigwaha' ),
		'view_item'           => __( 'View Portfolio', 'bigwaha' ),
		'add_new_item'        => __( 'Add New Portfolio', 'bigwaha' ),
		'add_new'             => __( 'Add New', 'bigwaha' ),
		'edit_item'           => __( 'Edit Portfolio', 'bigwaha' ),
		'update_item'         => __( 'Update Portfolio', 'bigwaha' ),
		'search_items'        => __( 'Search Portfolio', 'bigwaha' ),
		'not_found'           => __( 'Not Found', 'bigwaha' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'bigwaha' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'portfolio', 'bigwaha' ),
		'description'         => __( 'Portfolio', 'bigwaha' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title','thumbnail', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'portfolio_category' ,'portfolio_skills', 'portfolio_tags' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'		      => get_template_directory_uri() . "/inc/images/portfolio.png",
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'avada_portfolio', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'avada_portfolio_post_type', 0 );



// register two taxonomies to go with the post type
function portfolio_category_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'Portfolio Categories',
		'singular_name'     => 'Portfolio Category',
		'search_items'      => 'Search Portfolio Categories',
		'all_items'         => 'All Portfolio Categories',
		'edit_item'         => 'Edit Portfolio Category',
		'update_item'       => 'Update Portfolio Categories',
		'add_new_item'      => 'Add New Portfolio Category',
		'new_item_name'     => 'New Portfolio Category',
		'menu_name'         => 'Portfolio Categories'
	);
	// register taxonomy
	register_taxonomy( 'portfolio_category', 'avada_portfolio', array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'portfolio_category_register_taxonomy' );

// register two taxonomies to go with the post type
function portfolio_skills_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'Portfolio Skills',
		'singular_name'     => 'Portfolio Skill',
		'search_items'      => 'Search Portfolio Skills',
		'all_items'         => 'All Portfolio Skills',
		'edit_item'         => 'Edit Portfolio Skill',
		'update_item'       => 'Update Portfolio Skills',
		'add_new_item'      => 'Add New Portfolio Skill',
		'new_item_name'     => 'New Portfolio Skill',
		'menu_name'         => 'Portfolio Skills'
	);
	// register taxonomy
	register_taxonomy( 'portfolio_skills', 'avada_portfolio', array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'portfolio_skills_register_taxonomy' );

// register two taxonomies to go with the post type
function portfolio_tags_register_taxonomy() {
	// set up labels
	$labels = array(
		'name'              => 'Portfolio Tags',
		'singular_name'     => 'Portfolio Tag',
		'search_items'      => 'Search Portfolio Tags',
		'all_items'         => 'All Portfolio Tags',
		'edit_item'         => 'Edit Portfolio Tag',
		'update_item'       => 'Update Portfolio Tags',
		'add_new_item'      => 'Add New Portfolio Tag',
		'new_item_name'     => 'New Portfolio Tag',
		'menu_name'         => 'Portfolio Tags'
	);
	// register taxonomy
	register_taxonomy( 'portfolio_tags', 'avada_portfolio', array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_admin_column' => true
	) );
}
add_action( 'init', 'portfolio_tags_register_taxonomy' );

function team_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Team', 'Post Type General Name', 'bigwaha' ),
		'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'bigwaha' ),
		'menu_name'           => __( 'Team', 'bigwaha' ),
		'parent_item_colon'   => __( 'Parent Team', 'bigwaha' ),
		'all_items'           => __( 'Team', 'bigwaha' ),
		'view_item'           => __( 'View Team', 'bigwaha' ),
		'add_new_item'        => __( 'Add New', 'bigwaha' ),
		'add_new'             => __( 'Add New', 'bigwaha' ),
		'edit_item'           => __( 'Edit', 'bigwaha' ),
		'update_item'         => __( 'Update Team', 'bigwaha' ),
		'search_items'        => __( 'Search Team', 'bigwaha' ),
		'not_found'           => __( 'Not Found', 'bigwaha' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'bigwaha' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'team', 'bigwaha' ),
		'description'         => __( 'Team', 'bigwaha' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title','thumbnail', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'team_category' ,'team_skills', 'team_tags' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		// 'rewrite'            => array( 'slug' => 'the-firm' ),
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'		      => get_template_directory_uri() . "/inc/images/team.png",
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'team', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'team_post_type', 0 );

function careers_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Careers', 'Post Type General Name', 'bigwaha' ),
		'singular_name'       => _x( 'Career', 'Post Type Singular Name', 'bigwaha' ),
		'menu_name'           => __( 'Careers', 'bigwaha' ),
		'parent_item_colon'   => __( 'Parent Career', 'bigwaha' ),
		'all_items'           => __( 'All Careers', 'bigwaha' ),
		'view_item'           => __( 'View Careers', 'bigwaha' ),
		'add_new_item'        => __( 'Add New Career', 'bigwaha' ),
		'add_new'             => __( 'Add New', 'bigwaha' ),
		'edit_item'           => __( 'Edit', 'bigwaha' ),
		'update_item'         => __( 'Update Career', 'bigwaha' ),
		'search_items'        => __( 'Search Careers', 'bigwaha' ),
		'not_found'           => __( 'Not Found', 'bigwaha' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'bigwaha' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'careers', 'bigwaha' ),
		'description'         => __( 'Careers', 'bigwaha' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor','thumbnail', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'career_category' ,'career_skills', 'career_tags' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'		      => get_template_directory_uri() . "/inc/images/career.png",
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'careers', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'careers_post_type', 0 );