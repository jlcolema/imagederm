<section class="testimonials">

	<div class="wrap">

		<header>

			<h2>Testimonials</h2>

		</header>

		<div class="container">

			<div class="flexslider">

				<div class="slides">

					<li>

						<?php

							/* Individual Products */

						?>

						<?php

							$args = array(

								'numberposts'	=> -1,
								'post_type'	=> 'testimonial',
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

								<h3 class="headline"><?php echo $testimonial_headline; ?></h3>

								<div class="quote">

									<?php echo $testimonial_quote; ?>

								</div>

								<div class="more">

									<a href="/about/testimonials/">View More</a>

								</div>

							</blockquote>

						<?php endforeach; ?>

					</li>

				</div>

			</div>

		</div>

	</div>

</section>