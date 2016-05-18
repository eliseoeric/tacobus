
<?php $menu_tabs = get_post_meta($post->ID, '_TB_menu_tabs', true); ?>
<!-- Nav tabs -->
  <ul class="nav nav-tabs menu-tabs" role="tablist">
  	<?php foreach ($menu_tabs as $tab ) : ?>
  		<li role="presentation" class=""><a href="#<?= $tab['tab_id']; ?>" aria-controls="<?= $tab['tab_id']; ?>" role="tab" data-toggle="tab"><?= $tab['tab_title'] ?></a></li>
  	<?php endforeach; ?>
  </ul>