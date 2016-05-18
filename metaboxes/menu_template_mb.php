<?php

function menu_template_mb( $meta_boxes ) {
	$prefix = "_TB_";

	$menu_tabs = new_cmb2_box(
		array(
			'id' 			=> 'menu_tabs',
			'title'      	=> 'Menu Tabs',
            'object_types'  => array( 'page' ),
            'show_on'      => array( 'key' => 'page-template', 'value' => 'template-menu.php' ),
            'context'    	=> 'normal',
            'priority'   	=> 'high',
            'show_names' 	=> true,
		)
	);

	$menu_tabs_group = $menu_tabs->add_field( array(
		'id'          => $prefix . 'menu_tabs',
	    'type'        => 'group',
	    'description' => __( 'Menu Tabs', 'cmb2' ),
	    'options'     => array(
	        'group_title'   => __( 'Menu Tab {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Menu Tab', 'cmb2' ),
	        'remove_button' => __( 'Remove Menu Tab', 'cmb2' ),
	        'sortable'      => false, // beta
	        // 'closed'     => true, // true to have the groups closed by default
	    ),
	) );

	$menu_tabs->add_group_field( $menu_tabs_group, array(
	    'name' => 'Tab Title',
	    'id'   => 'tab_title',
	    'type' => 'text',
	    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$menu_tabs->add_group_field( $menu_tabs_group, array(
	    'name' => 'Tab ID',
	    'id'   => 'tab_id',
	    'type' => 'text',
	    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$menu_tabs->add_group_field( $menu_tabs_group, array(
	    'name' => 'Tab Content',
	    'id'   => 'tab_content',
	    'type' => 'wysiwyg',
	    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
}