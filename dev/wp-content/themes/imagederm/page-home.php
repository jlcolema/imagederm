<?php get_header(); ?>

	<?php

		/* Featured Slides */

	?>

	<?php include (TEMPLATEPATH . "/a/inc/featured-products.php" ); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<div class="content">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<h1><?php the_field('alternate_page_title'); ?></h1>

						<?php the_content(); ?>

					<?php endwhile; endif; ?>

				</div>

			</div>

			<div id="secondary" role="complementary">

				<div class="training-video">

					<figure>

						<iframe width="560" height="350" src="<?php the_field('training_video_url'); ?>" frameborder="0" allowfullscreen></iframe>

						<figcaption>

							<p><?php the_field('training_video_caption'); ?></p>

						</figcaption>

					</figure>

				</div>

			</div>

	<?php

		/* Products */

	?>

	<?php include (TEMPLATEPATH . "/a/inc/products.php" ); ?>

	<?php

		/* Testimonials */

	?>

		</div>

	</div>

	<?php include (TEMPLATEPATH . "/a/inc/testimonials.php" ); ?>

<?php get_footer(); ?>