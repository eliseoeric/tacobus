 <?php $menu_tabs = get_post_meta($post->ID, '_TB_menu_tabs', true); ?>

 <!-- Tab panes -->
  <div class="tab-content">
  	<?php $first = 0; ?>
  	<?php foreach ($menu_tabs as $tab): ?>
  		<div role="tabpanel" class="tab-pane <?= ($first === 0 ? 'active' : '' );  ?>" id="<?= $tab['tab_id'] ?>">
  			<?php echo apply_filters( 'the_content', $tab['tab_content'] ); ?>
  		</div>
  		<?php $first = 1; ?>
  	<?php endforeach ?>
  </div>