<?php get_template_part('templates/cta-banner' ); ?>
<footer class="page-footer">
  <div class="container page-footer__widgets">
  	<div class="col-md-3 page-footer__widget">
  		<?php dynamic_sidebar('sidebar-footer-1'); ?>
  	</div>
  	<div class="col-md-3 page-footer__widget">
  		<?php dynamic_sidebar('sidebar-footer-2'); ?>
  	</div>
  	<div class="col-md-3 page-footer__widget">
  		<?php dynamic_sidebar('sidebar-footer-3'); ?>
  	</div>
  	<div class="col-md-3 page-footer__widget">
  		<?php dynamic_sidebar('sidebar-footer-4'); ?>
  	</div>
  </div>
</footer>
<div class="banner page-footer__copywrite">
	<div class="container">
		<div class="col-md-9">
			<small>Website design by <a href="http:/socialfaucet.com">Social Faucet</a></small>
			<small><a href="/privacy-policy">Policy</a> <a href="/terms-of-use">Terms of Use</a></small>
		</div>
		<div class="col-md-3">
			<small itemprop="copyrightYear">&copy; <?php echo date( 'Y' ); ?></span><span itemprop="copyrightHolder"> Taco Bus</small>
		</div>
	</div>
</div>