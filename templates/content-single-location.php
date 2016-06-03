<?php while (have_posts()) : the_post(); ?>
  <?php 
    $street_address = get_post_meta( $post->ID, '_TB_street_address', true ); 
    $city = get_post_meta( $post->ID, '_TB_city', true ); 
    $state = get_post_meta( $post->ID, '_TB_state', true ); 
    $zipcode = get_post_meta( $post->ID, '_TB_zipcode', true ); 
    $phone = get_post_meta( $post->ID, '_TB_phone', true ); 
    $src = get_post_meta( $post->ID, '_TB_thumbnail_url', true );
    $hours = get_post_meta( $post->ID, '_TB_location_hours', true);
    $ext_url = get_post_meta( $post->ID, '_TB_external_url', true );
    $managers = get_post_meta( $post->ID, '_TB_location_managers', true );
    $gmap_lat = get_post_meta($post->ID, '_TB_gmap_lat', true );
    $gmap_long = get_post_meta($post->ID, '_TB_gmap_long', true );
  ?>
  <article <?php post_class('col-md-9'); ?>>
    <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  </article>
  <aside class="location-aside col-md-3">
    <div class="location-details">
      <?php echo do_shortcode('[g_map loc="' . $gmap_lat . ', ' . $gmap_long . '"]'); ?>
    </div>
    <div class="location--details">
      <div class="col-md-3 location--pin">
        <img src="<?= get_template_directory_uri() . "/dist/images/img--marker.png" ?>">
      </div>
      <address class="col-md-9">
        <?= $street_address . ', ' . $city . ', ' . $state . ' ' . $zipcode?><br>
        <abbr title="Phone">Phone:</abbr> <a href="tel:<?= $phone ?>"><?= $phone ?></a>
      </address>
    </div>
    <div class="location--details">
      <?= do_shortcode('[button title="Online Ordering"]' . $ext_url . '[/button]')  ?>
    </div>
    <div class="location--details">
      <h4>Hours of Operation</h4>
      <ul class="pd-l-0">
        <?php foreach ($hours as $h): ?>
          <?php $time = ( $h['hour_override'] !== '' ? $h['hour_override'] : $h['open_time'] . $h['close_time']) ?>
          <li><?= $h['start_day'] . " - " .  $h['end_day'] . ": " . $time ?></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="location--details">
      <h4>Store Managers</h4>
      <ul class="pd-l-0">
        <?php foreach ($managers as $manager): ?>
          
          <li><?= $manager['_TB_manager_name'] . ' '  . $manager['_TB_manager_position']?></li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="location--details">
      <h4>Payments Accepted</h4>
      <img src="<?= get_template_directory_uri() . "/dist/images/icon--creditcards.jpg" ?>">
    </div>
    <div class="location--details">
      <h4>Now Hiring</h4>
      <a href="https://workforcenow.adp.com/jobs/apply/posting.html?client=tacobus">Click Here for Job Openings</a>
    </div>
    <div class="banner bg-yellow-rivets"></div>
  </aside>
<?php endwhile; ?>
