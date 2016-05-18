<?php use Roots\Sage\Titles; ?>


<header class="header">
  <div class="banner">
    <div class="container"> 
      <a class="brand header__logo" href="<?= esc_url(home_url('/')); ?>">
        <img src="<?= get_template_directory_uri()?>/dist/images/logo--tacobus.png">
      </a>
    </div>
  </div>
  <div class="banner">
    <div class="container">
      <nav class="nav-primary">
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
  <div class="jumbotron" style="background-image:url(<?= $banner; ?>)">
    <div class="container">
      <h1><?= Titles\title(); ?></h1>
    </div>
  </div>
</div>
