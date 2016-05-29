<article <?php post_class(); ?>>
  <header>
  	<div class="col-md-2">
    	<?php get_template_part('templates/entry-meta'); ?>
  	</div>
  	<div class="col-md-10">
  		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  	</div>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <div class="divider-rivets"></div>
</article>
