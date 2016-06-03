<?php  

	$locations = new WP_QUERY( array( 
		'post_type' => 'location', 
		'post_per_page' => -1,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order'	=>	'ASC'
	) );
	
?>


<section>
	<?php while( $locations->have_posts() ) : $locations->the_post(); ?>
		<?php 
			$street_address = get_post_meta( $post->ID, '_TB_street_address', true ); 
			$city = get_post_meta( $post->ID, '_TB_city', true ); 
			$state = get_post_meta( $post->ID, '_TB_state', true ); 
			$zipcode = get_post_meta( $post->ID, '_TB_zipcode', true ); 
			$phone = get_post_meta( $post->ID, '_TB_phone', true ); 
			$src = get_post_meta( $post->ID, '_TB_thumbnail_url', true );
			$hours = get_post_meta( $post->ID, '_TB_location_hours', true);
			$ext_url = get_post_meta( $post->ID, '_TB_external_url', true );
		 ?>
		<article class="panel panel-default panel--location">
			<div class="divider-rivets"></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<img src="<?= get_template_directory_uri() .  $src ?>">
					</div>
					<div class="col-md-4 location--details">
						<address>
						  <h3><a href="<?= get_the_permalink(); ?>"><?php echo the_title(); ?></a></h3><br>
						  <?= $street_address . ', ' . $city . ', ' . $state . ' ' . $zipcode?><br>
						  <abbr title="Phone">Phone:</abbr> <a href="tel:<?= $phone ?>"><?= $phone ?></a>
						</address>
						<ul class="pd-l-0">
							<?php foreach ($hours as $h): ?>
								<?php $time = ( $h['hour_override'] !== '' ? $h['hour_override'] : $h['open_time'] . $h['close_time']) ?>
								<li><?= $h['start_day'] . " - " .  $h['end_day'] . ": " . $time ?></li>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="col-md-4 location--link">
						<ul>
							<li><?= do_shortcode('[button title="Online Ordering"]' . $ext_url . '[/button]')  ?></li>
							<li><?= do_shortcode('[button title="Store Webpage"]' . get_the_permalink() . '[/button]');  ?></li>
						</ul>
					</div>
				</div>
			</div>
		</article>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</section>