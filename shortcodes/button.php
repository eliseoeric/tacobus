<?php

function get_button( $atts, $content = null) {
	$a = shortcode_atts( 
		array(
			'class' => 'btn-ghost',
			'title' => ''
		),
		$atts
	);

	ob_start();
	?>
	<a class="btn <?= $a['class']; ?>" href="<?= $content; ?>">
		<span class="ghost-wrap"><?= $a['title']; ?></span>
	</a>
	<?php
	$html = ob_get_clean();

	return $html;
}

add_shortcode( 'button', 'get_button' );