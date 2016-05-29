
<?php $menu_tabs = get_post_meta($post->ID, '_TB_menu_tabs', true); ?>
<div class="banner bg-yellow-rivets"></div>
<!-- Nav tabs -->
<div class="banner bg-brand-yellow">
<div class="container">
  <ul class="nav nav-tabs menu-tabs" role="tablist">
  	<?php $first = 0; ?>
  	<?php foreach ($menu_tabs as $tab ) : ?>
  		<li role="presentation" class="<?= ($first === 0 ? 'active' : '' );  ?>"><a href="#<?= $tab['tab_id']; ?>" aria-controls="<?= $tab['tab_id']; ?>" role="tab" data-toggle="tab" ><?= $tab['tab_title'] ?></a></li>
  		<?php $first = 1; ?>
  	<?php endforeach; ?>
  </ul>
</div>
</div>