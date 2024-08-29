	<div id="pre-footer">

		<div class="wrap">

			<nav class="links" role="navigation">

				<?php $defaults = array(

					'theme_location'  => 'pre-footer',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul>%3$s</ul>',
					'depth'           => '',
					'walker'          => ''

				); ?>

				<?php wp_nav_menu( $defaults ); ?>

			</nav>

		</div>

	</div>

	<footer id="footer" role="contentinfo">

		<div class="wrap">

			<?php

				/* Copyright */

			?>

			<p id="copyright">&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?>. All rights reserved.</p>

			<p id="distributed-by">Products distributed by Lard Medical and Equipment Enterprise</p>

			<?php

				/* Created By */

			?>

			<div id="created-by">

				<a href="http://www.techyscouts.com" rel="external">A Techy Scout Creation</a>

			</div>

		</div>

	</footer>

	<?php wp_footer(); ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

	<script>

		window.jQuery || document.write("<script src='<?php bloginfo("template_directory"); ?>/a/js/jquery.js'>\x3C/script>")

	</script>

	<!--[if lt IE 9]>

		<script src="<?php bloginfo('template_directory'); ?>/a/js/selectivizr.js"></script>

	<![endif]-->

	<?php

		/* Plugins */

	?>

	<script src="<?php bloginfo('template_directory'); ?>/a/js/matchmedia.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/a/js/picturefill.js"></script>

	<?php if ( is_page( 'home' ) ) { ?>

	<script src="<?php bloginfo('template_directory'); ?>/a/js/flexslider.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/a/js/fitvids.js"></script>

	<script>

		/* FitVids */

		$(".training-video").find("figure").fitVids();

	</script>

	<?php } ?>

	<?php

		/* Functions */

	?>

	<script src="<?php bloginfo('template_directory'); ?>/a/js/functions.js"></script>

	<?php

		/* Analytics */

	?>

	<script>

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php the_field("google_analytics", "option"); ?>']);
		_gaq.push(['_trackPageview']);

		(function() {

			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

		})();

	</script>

</body>

</html>