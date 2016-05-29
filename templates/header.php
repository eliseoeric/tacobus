<?php use Roots\Sage\Titles; ?>


<header class="header">
  <div class="banner bg-yellow-rivets"></div>
  <div class="banner bg-brand-yellow header__banner">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-10 col-md-2">
          <ul class="social-links__header">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
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
<!-- Page Banner -->
<?php $banner = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() )); ?>
<div class="banner">
  <div class="jumbotron page-title" style="background-image:url(<?= $banner; ?>)">
    <div class="container">
    </div>
  </div>
</div>
<div class="banner bg-dark-rivets"></div>
