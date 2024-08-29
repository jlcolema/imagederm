<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="content">

						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

					</div>

					<div class="testimonials">

						<?php

							/* Individual Testimonial */

						?>

						<?php

							$args = array(

								'numberposts'	=> -1,
								'post_type'		=> 'testimonial',
								'orderby'		=> 'menu_order',
								'post_status'	=> 'publish'

							);

							$items = get_posts($args);

						?>

						<?php foreach($items as $item): ?>

							<?php

								/* Heading */

								$testimonial_headline = get_field('testimonial_headline', $item->ID);

								/* Quote */

								$testimonial_quote = get_field('testimonial_quote', $item->ID);

							?>

							<blockquote>

								<h2 class="headline"><?php echo $testimonial_headline; ?></h2>

								<div class="quote">

									<?php echo $testimonial_quote; ?>

								</div>

							</blockquote>

						<?php endforeach; ?>

					</div>

				<?php endwhile; endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>