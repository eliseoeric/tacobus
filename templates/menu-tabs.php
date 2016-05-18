 <?php $menu_tabs = get_post_meta($post->ID, '_TB_menu_tabs', true); ?>

 <!-- Tab panes -->
  <div class="tab-content">
  	<?php foreach ($menu_tabs as $tab): ?>
  		<div role="tabpanel" class="tab-pane" id="<?= $tab['tab_id'] ?>">
  			<?= $tab['tab_content']; ?>
  		</div>
  	<?php endforeach ?>
  </div>