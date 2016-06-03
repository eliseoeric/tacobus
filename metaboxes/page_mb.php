<?php 
function page_mb( $meta_boxes ) {
	$prefix = "_TB_";

	$page_details = new_cmb2_box(
		array(
			'id' 			=> 'header_details',
			'title'      	=> 'Header Options',
            'object_types'  => array( 'page' ),
            'context'    	=> 'normal',
            'priority'   	=> 'high',
            'show_names' 	=> true,
		)
	);

	$page_details->add_field( array(
		'name'    => 'Header Height',
	    'default' => '500px',
	    'id'      => $prefix . 'header_height',
	    'type'    => 'text_small'	
	) );

	$page_details->add_field(
		array(
		    'name' => 'Header Image',
		    'desc' => 'Image to be displayed in the header, over the background image.',
		    'id' => $prefix . 'header_image',
		    'type' => 'file',
		    'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
		) );
}
