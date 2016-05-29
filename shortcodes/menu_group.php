<?php 
function get_menu_group( $atts, $content = null ) {
	$a = shortcode_atts(
		array(
			'menu_id'	=> '',
			'title'	=> ''
		), $atts 
	);

	$menu = get_post( $a['menu_id'] );
	$content = $menu->post_content;
	// dd($a['menu_id']);

	ob_start();
	?>
	<div class="menu_group">
		<div class="menu_group__title"><?= $a['title'] ?></div>
		<?php echo apply_filters( 'the_content', $content ); ?>
	</div>

	<?php
	$html = ob_get_clean();

	return $html;
}

add_shortcode( 'menu_card', 'get_menu_group');