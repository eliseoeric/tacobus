<?php use Roots\Sage\Titles; ?>

<?php if( !substr( basename( get_page_template( $post->ID ) ), 0, -4 ) === 'template-menu' ): ?>
<div class="container">
  <h1><?= Titles\title(); ?></h1>
</div>
<?php endif; ?>
