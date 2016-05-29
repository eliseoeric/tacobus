<?php
/**
 * Template Name: Menu Template
 */
?>

<?php $full_width = true; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part( 'templates/page', 'header'); ?>
  <?php get_template_part( 'templates/menu', 'tab_list'); ?>
  <div class="container">
  	<div class="row">
  		<?php get_template_part( 'templates/content', 'page'); ?>
  	</div>
  	<div class="row">
  		<?php get_template_part( 'templates/menu', 'tabs'); ?>
  	</div>
  </div>
<?php endwhile; ?>
