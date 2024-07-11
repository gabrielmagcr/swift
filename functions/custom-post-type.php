<?php
/* joints Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
function products_cpt() { 
	// creating (registering) the custom type 
	register_post_type( 'products', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Products', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Product', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Products', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Product', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Products', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Product', 'jointswp'), /* New Display Title */
			'view_item' => __('View Product', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Product', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'products', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'product', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'custom_type');
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type('post_tag', 'custom_type');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'products_cpt');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'meat_type', 
    	array('products'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Meat Types', 'jointswp' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Meat Type', 'jointswp' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Meat Types', 'jointswp' ), /* search title for taxomony */
    			'all_items' => __( 'All Meat Types', 'jointswp' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Meat Type', 'jointswp' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Meat Type:', 'jointswp' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Meat Type', 'jointswp' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Meat Type', 'jointswp' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Meat Type', 'jointswp' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Meat Type Name', 'jointswp' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'meat-type' ),
    	)
    );   
    
	// now let's add custom tags (these act like categories)
    register_taxonomy( 'cooking_methods', 
    	array('products'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Cooking Methods', 'jointswp' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Cooking Method', 'jointswp' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Cooking Methods', 'jointswp' ), /* search title for taxomony */
    			'all_items' => __( 'All Cooking Methods', 'jointswp' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Cooking Method', 'jointswp' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Cooking Method:', 'jointswp' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Cooking Method', 'jointswp' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Cooking Method', 'jointswp' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Cooking Method', 'jointswp' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Cooking Method Name', 'jointswp' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 

    register_taxonomy( 'meat_cuts', 
    	array('products'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Meat Cuts', 'jointswp' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Meat Cut', 'jointswp' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Meat Cuts', 'jointswp' ), /* search title for taxomony */
    			'all_items' => __( 'All Meat Cuts', 'jointswp' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Meat Cut', 'jointswp' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Meat Cut:', 'jointswp' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Meat Cut', 'jointswp' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Meat Cut', 'jointswp' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Meat Cut', 'jointswp' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Meat Cut Name', 'jointswp' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/CMB2/CMB2
    */


	// let's create the function for the custom type
function tips_cpt() { 
	// creating (registering) the custom type 
	register_post_type( 'tips', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Tips', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Tip', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Tips', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Tip', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Tips', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Tip', 'jointswp'), /* New Display Title */
			'view_item' => __('View Tip', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Tip', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'tips-recipes', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'tip', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'custom_type');
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type('post_tag', 'custom_type');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'tips_cpt');