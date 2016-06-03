<?php use Roots\Sage\Titles; ?>


<header class="header">
  <div class="banner bg-yellow-rivets"></div>
  <div class="banner bg-brand-yellow header__banner">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-10 col-md-2">
          <ul class="social-links__header">
            <li><a href="https://www.facebook.com/TacoBus" target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/officialtacobus" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://plus.google.com/111456829313134988133/about" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="http://www.taco-bus.com/tacobus/email-club" ><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <a class="brand header__logo" href="<?= esc_url(home_url('/')); ?>">
          <img src="<?= get_template_directory_uri()?>/dist/images/logo--tacobus.png">
        </a>
        <div class="brokenEnglish col-md-offset-3 col-md-7">
          <img src="<?= get_template_directory_uri()?>/dist/images/img--brokenEnglish.png">
        </div>
      </div>
    </div>
  </div>
  <div class="banner bg-yellow-rivets"></div>
  <div class="banner bg-dark-rivets">
    <div class="container">
      <nav class="nav-primary col-md-offset-3">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'container_class'   => 'collapse navbar-collapse', 'container'         => 'div', 'menu_class' => 'nav navbar-nav', 'walker' => new wp_bootstrap_navwalker()]);
        endif;
        ?>
      </nav>
    </div>
  </div>
</header>
<?php 
  if( get_page_template_slug( $post->ID ) === 'template-locations.php') {
    get_template_part( 'templates/banner', 'menu' ); 
  
  } else if ( !is_front_page()  ){
     get_template_part('templates/banner', get_post_type() != 'post' ? get_post_type() : get_post_format()); 
  } else {
    get_template_part( 'templates/banner', 'frontpage' ); 
  }
?>