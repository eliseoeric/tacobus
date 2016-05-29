<?php 
function location_mb( $meta_boxes ) {
	$prefix = "_TB_";

	$page_details = new_cmb2_box(
		array(
			'id' 			=> 'page_details',
			'title'      	=> 'Page Details',
            'object_types'  => array( 'page' ),
            'context'    	=> 'normal',
            'priority'   	=> 'high',
            'show_names' 	=> true,
		)
	);

	$page_details->add_field( array(
		'name'    => 'Full Width Template',
	    'default' => '126 Street N',
	    'id'      => $prefix . 'street_address',
	    'type'    => 'text_medium'	
	) );
