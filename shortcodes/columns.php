<?php

function get_bootstrap_column( $tag ) {
	
	$column_map = array(
		'one_column' 		=> '1',
		'two_columns' 		=> '2',
		'three_columns' 	=> '3',
		'four_columns' 		=> '4',
		'five_columns' 		=> '5',
		'six_columns' 		=> '6',
		'seven_columns' 	=> '7',
		'eight_columns' 	=> '8',
		'nine_columns' 		=> '9',
		'ten_columns' 		=> '10',
		'eleven_columns' 	=> '11',
		'twelve_columns' 	=> '12',
		'row' 				=> 'container'
	);

	return $column_map[$tag];
}


function bootstap_column( $atts, $content = null, $tag ) {

	$column = get_bootstrap_column( $tag );
	
	$html = '<div class="' . $column . '">' . do_shortcode( $content ) . "</div>";

	if( $tag !== 'row' ) {
		$html = '<div class="col-sm-12 col-md-6 col-lg-' . $column . '">' . do_shortcode( $content ) . "</div>";
	}

	

	
	return $html;
}