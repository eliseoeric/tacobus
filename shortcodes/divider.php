<?php

function get_divider($atts, $content = null ) {

	$a = shortcode_atts(
		array(
			'top' => '20',
			'bottom' => '20'
		),
		$atts
	);

	return "<div class='divider mg-t-{$a['top']} mg-b-{$a['bottom']}'></div>";

}
add_shortcode('divider', 'get_divider');