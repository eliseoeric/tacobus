<?php

// let's create the function for the custom type
function register_menus() {
    // creating (registering) the custom type
    register_post_type( 'menu_section', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array ( 'labels'              => array (
            'name'               => __( 'Menus', 'Tacos' ), /* This is the Title of the Group */
            'singular_name'      => __( 'Menu', 'Tacos' ), /* This is the individual type */
            'all_items'          => __( 'All Menus', 'Tacos' ), /* the all items menu item */
            'add_new'            => __( 'Add New', 'Tacos' ), /* The add new menu item */
            'add_new_item'       => __( 'Add New Menu', 'Tacos' ), /* Add New Display Title */
            'edit'               => __( 'Edit', 'Tacos' ), /* Edit Dialog */
            'edit_item'          => __( 'Edit Menu', 'Tacos' ), /* Edit Display Title */
            'new_item'           => __( 'New Menu', 'Tacos' ), /* New Display Title */
            'view_item'          => __( 'View Menu', 'Tacos' ), /* View Display Title */
            'search_items'       => __( 'Search Menus', 'Tacos' ), /* Search Custom Type Title */
            'not_found'          => __( 'Nothing found in the Database.', 'Tacos' ), /* This displays if there are no entries yet */
            'not_found_in_trash' => __( 'Nothing found in Trash', 'Tacos' ), /* This displays if there is nothing in the trash */
            'parent_item_colon'  => ''
        ), /* end of arrays */
                'description'         => __( 'Post type that holds menu items. For instance, sandwiches are a menu, that has burgers, chix sandwich, etc.', 'Tacos' ), /* Custom Type Description */
                'public'              => true,
                'publicly_queryable'  => true,
                'exclude_from_search' => false,
                'show_ui'             => true,
                'query_var'           => true,
                'menu_position'       => 8, /* this is what order you want it to appear in on the left hand side menu */
                'menu_icon'           => 'dashicons-feedback', /* the icon for the custom post type menu */
                'rewrite'             => array ( 'slug' => 'menu', 'with_front' => false ), /* you can specify its url slug */
                'has_archive'         => 'menu', /* you can rename the slug here */
                'capability_type'     => 'post',
                'hierarchical'        => false,
            /* the next one is important, it tells what's enabled in the post editor */
                'supports'            => array ( 'title', 'editor', 'thumbnail', 'excerpt' )
        ) /* end of options */
    ); /* end of register post type */

    /* this adds your post categories to your custom post type */
    // register_taxonomy_for_object_type( 'category', 'edu_program' );

}

// adding the function to the Wordpress init
add_action( 'init', 'register_menus' );


