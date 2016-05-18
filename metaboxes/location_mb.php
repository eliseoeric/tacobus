<?php 

function location_mb( $meta_boxes ) {
	$prefix = "_TB_";

	$location_address = new_cmb2_box(
		array(
			'id' 			=> 'location_address',
			'title'      	=> 'Location Address',
            'object_types'  => array( 'location' ),
            'context'    	=> 'normal',
            'priority'   	=> 'high',
            'show_names' 	=> true,
		)
	);

	$location_address->add_field( array(
		'name'    => 'Street Address',
	    'default' => '126 Street N',
	    'id'      => $prefix . 'street_address',
	    'type'    => 'text_medium'	
	) );

	$location_address->add_field( array(
		'name'    => 'City',
	    'default' => 'Tampa',
	    'id'      => $prefix . 'city',
	    'type'    => 'text_medium'	
	) );

	$location_address->add_field( array(
		'name'    => 'State',
	    'default' => 'FL',
	    'id'      => $prefix . 'state',
	    'type'    => 'text_small'	
	) );

	$location_address->add_field( array(
		'name'    => 'Zipcode',
	    'default' => '33710',
	    'id'      => $prefix . 'zipcode',
	    'type'    => 'text_small'	
	) );

	$location_address->add_field( array(
		'name'    => 'Phone Number',
	    'default' => 'xxx-xxx-xxxx',
	    'id'      => $prefix . 'phone',
	    'type'    => 'text_medium'	
	) );

	$location_hours = new_cmb2_box(
		array(
			'id' 			=> $prefix . 'location_hours',
			'title'      	=> 'Location Hours',
            'object_types'  => array( 'location' ),
            'context'    	=> 'normal',
            'priority'   	=> 'high',
            'show_names' 	=> true,
		)
	);

	$location_hours_group = $location_hours->add_field( array(
	    'id'          => $prefix . 'location_hours',
	    'type'        => 'group',
	    'description' => __( 'Location Hours', 'cmb2' ),
	    // 'repeatable'  => false, // use false if you want non-repeatable group
	    'options'     => array(
	        'group_title'   => __( 'Hours {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Hours Block', 'cmb2' ),
	        'remove_button' => __( 'Remove Hours Block', 'cmb2' ),
	        'sortable'      => false, // beta
	        // 'closed'     => true, // true to have the groups closed by default
	    ),
	) );

	$location_hours->add_group_field( $location_hours_group, array(
	    'name' => 'Start Day',
	    'id'   => 'start_day',
	    'type' => 'text',
	    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$location_hours->add_group_field( $location_hours_group, array(
	    'name' => 'End Day',
	    'id'   => 'end_day',
	    'type' => 'text',
	    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$location_hours->add_group_field( $location_hours_group, array(
	    'name' => 'Open From',
	    'id' => 'open_time',
	    'type' => 'text_time'
	    // 'time_format' => 'h:i:s A',
	) );

	$location_hours->add_group_field( $location_hours_group, array(
	    'name' => 'Closed At',
	    'id' => 'close_time',
	    'type' => 'text_time'
	    // 'time_format' => 'h:i:s A',
	) );

	$location_hours->add_group_field( $location_hours_group, array(
	    'name' => 'All Day Hours',
	    'id'   => 'hour_override',
	    'type' => 'text',
	    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$location_details = new_cmb2_box(
		array(
			'id' 			=> $prefix . 'location_details',
			'title'      	=> 'Location Details',
            'object_types'  => array( 'location' ),
            'context'    	=> 'side',
            'priority'   	=> 'default',
            'show_names' 	=> true,
		)
	);

	$location_details->add_field( array(
		'name'    => 'Location Thumbnail',
	    'desc'    => 'Upload an image or enter an URL.',
	    'id'      => $prefix . 'thumbnail_url',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => true, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
	    ),	
	) );

	$location_details->add_field( array(
		'name'    => 'Online Order URL',
	    'default' => '',
	    'id'      => $prefix . 'external_url',
	    'type'    => 'text_url'	
	) );

	$location_managers = new_cmb2_box(
		array(
			'id' 			=> $prefix . 'location_managers',
			'title'      	=> 'Location Managers',
            'object_types'  => array( 'location' ),
            'context'    	=> 'side',
            'priority'   	=> 'default',
            'show_names' 	=> true,
		)
	);

	$location_managers_group = $location_managers->add_field( array(
	    'id'          => $prefix . 'location_managers',
	    'type'        => 'group',
	    'description' => __( 'Location Managers', 'cmb2' ),
	    // 'repeatable'  => false, // use false if you want non-repeatable group
	    'options'     => array(
	        'group_title'   => __( 'Manager {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Manager', 'cmb2' ),
	        'remove_button' => __( 'Remove Manager', 'cmb2' ),
	        'sortable'      => false, // beta
	        // 'closed'     => true, // true to have the groups closed by default
	    ),
	) );

	$location_managers->add_group_field( $location_managers_group, array(
	    'name' => 'Full Name',
	    'id'   => $prefix . 'manager_name',
	    'type' => 'text',
	    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$location_managers->add_group_field( $location_managers_group, array(
	    'name' => 'Position',
	    'id'   => $prefix . 'manager_position',
	    'type' => 'text',
	    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

}