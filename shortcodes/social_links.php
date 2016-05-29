<?php

function get_social_links( $atts, $content ) {

	$a = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	ob_start();
	?>
		<div class="social-links__footer">
			<ul>
				<li><a href="https://www.facebook.com/TacoBus"><i class="fa fa-facebook" aria-hidden="true"></i>facebook.com/TacoBus</a></li>
            <li><a href="https://twitter.com/officialtacobus"><i class="fa fa-twitter" aria-hidden="true"></i>twitter.com/OfficalTacoBus</a></li>
            <li><a href="http://instagram.com/officialtacobus"><i class="fa fa-instagram" aria-hidden="true"></i>instagram.com/OfficalTacoBus</a></li>
            <li><a href="https://plus.google.com/111456829313134988133/about"><i class="fa fa-google-plus" aria-hidden="true"></i>Google+</a></li>
			</ul>
		</div>
	<?php
	$html = ob_get_clean();

	return $html;
}

add_shortcode('social_links', 'get_social_links');