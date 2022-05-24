		

		<div id="call-to-action">
    		<a href="/index.php?page_id=104"> <i class="call-to-action-button"><p class="call-to-action-text"><?php pll_e('Nous contacter'); ?></p></i> </a>
		</div>

		<footer id="footer">
			
			<ul class="footer-info">
				<li><h4><?php pll_e('Notre société'); ?></h4></li>
				<li><?php echo get_theme_mod('footer_line_1') ?></li>
				<li><?php echo get_theme_mod('footer_line_2') ?></li>
				<li><?php echo get_theme_mod('footer_line_3') ?></li>
				<li><?php echo get_theme_mod('footer_line_4') ?></li>
				
			</ul>
			
			<div id="footer-logo"><img src="<?php bloginfo('template_url'); ?>/voyagelombok-logo.png"/></div>
			
			<nav class="nav-footer">
				<?php wp_nav_menu( array ( 
                	'theme_location' => 'footer',
                	'container' => '', 
                	'container_class' => ''
            	)); ?>
			</nav>
		</footer>	

		<script type="text/javascript">
			// On vérifie que le footer est visible pour positionner le bouton "call to action" en fonction
			var win = $(window);
	
			var viewport = {
				top : win.scrollTop(),
				left : win.scrollLeft()
			};
			viewport.right = viewport.left + win.width();
			viewport.bottom = viewport.top + win.height();
	
			var bounds = $('#footer').offset();
    		bounds.right = bounds.left + $('#footer').outerWidth();
    		bounds.bottom = bounds.top + $('#footer').outerHeight();

			if (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom)) {
				$('#call-to-action').css('bottom', $('#footer').height());
			}
			else {
				$('#call-to-action').css('bottom', 0);
			}
		</script>

</div>

<?php wp_footer(); ?>

</body>
</html>
