<?php
/**
 * Template Name: Menu Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part( 'templates/page', 'header'); ?>
  <?php get_template_part( 'templates/menu', 'tab_list'); ?>
  <?php get_template_part( 'templates/content', 'page'); ?>
  <?php get_template_part( 'templates/menu', 'tabs'); ?>
<?php endwhile; ?>
