<?php 

function get_accordion_group( $atts, $content = null, $tag ) {
	$a = shortcode_atts( 
		array( 
			'id' => 'accordion',
			'class' => ''
		), 
		$atts 
	);

	ob_start();
	?>
	<div class="panel-group <?= $a['class']; ?>" id="<?= $a['id'] ?>" role='tablist' aria-multiselectable='true'>
		<?= do_shortcode( $content ); ?>
	</div>
	<?php
	$html = ob_get_clean();

	// $html = "<div class='panel-group {$a['class']}' id='{$a['id']}' role='tablist' aria-multiselectable='true'>" . do_shortcode( $content ) . "</div>";

	return $html;

}
add_shortcode( 'accordion_group', 'get_accordion_group' );

function get_accordion_item( $atts, $content = null, $tag ) {
	$a = shortcode_atts( 
		array( 
			'parent' => 'accordion',
			'title' => '',
			'class' => '',
			'id' => '',
			'expanded' => 'false'
		), 
		$atts 
	);

	//generate an id if there is none set
	if( $a['id'] === '' ) {
		//convert title to camel case for id
		$str = preg_replace('/[^a-z0-9' . implode("", array()) . ']+/i', ' ', $a['title']);
	    $str = trim($str);
	    // uppercase the first character of each word
	    $str = ucwords($str);
	    $str = str_replace(" ", "", $str);
	    $a['id'] = lcfirst($str);
	}
	

	ob_start();
	?>
	<div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="<?= $a['id']; ?>">
	      <h4 class="panel-title">
	        <a role="button" data-toggle="collapse" data-parent="#<?= $a['parent']; ?>" href="#<?= $a['id'] . 'Collapse'; ?>" aria-expanded="<?= $a['expanded']; ?>" aria-controls="<?= $a['id'] . 'Collapse'; ?>">
	          <?= $a['title'];  ?>
	        </a>
	      </h4>
	    </div>
	    <div id="<?= $a['id'] . 'Collapse'; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?= $a['id']; ?>">
	      <div class="panel-body">
	        <?php echo do_shortcode( $content ); ?>
	      </div>
	    </div>
	  </div>
	<?php
	$html = ob_get_clean();

	return $html;
}

add_shortcode( 'accordion_item', 'get_accordion_item' );