<!-- Page Banner -->
<?php $image = get_post_meta( get_the_ID(), '_TB_header_image', true); ?>
<?php $banner = get_template_directory_uri() . "/dist/images/img--locaFlavorFeature.jpg";  ?>
<div class="banner">
  <div class="jumbotron page-title" style="background-image:url(<?= $banner; ?>)">
    <div class="container">
      <?php if($image): ?>
        <div class="col-md-4"><img src="<?= $image; ?>"></div>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="banner bg-dark-rivets"></div>