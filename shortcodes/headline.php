<?php

function get_headline( $atts, $content = null ) {
		$a = shortcode_atts( 
			array( 
				'tag' => 'h3',
				'align' => 'text-left',
				'color' => 'text-primary',
				'class' => ''
			), 
			$atts 
		);

	return "<{$a['tag']} class='{$a['class']} {$a['color']} {$a['align']}'>" . $content . "</{$a['tag']}>";
}
add_shortcode('headline', 'get_headline');