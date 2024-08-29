<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<h1><?php the_field('error_title', 'option'); ?></h1>

				<?php the_field('error_details', 'option'); ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>