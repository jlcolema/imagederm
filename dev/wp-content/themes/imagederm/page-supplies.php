<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="content">

						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

					</div>

					<div class="supplies">

						<ul>

							<?php

								/* Individual Products */

							?>

							<?php

								$args = array(

									'numberposts'	=> -1,
									'post_type'	=> 'supply',
									'orderby'		=> 'menu_order',
									'post_status'	=> 'publish'

								);

								$items = get_posts($args);

							?>

							<?php foreach($items as $item): ?>

								<?php

									/* Thumbnail */

									$supply_thumbnail = get_field('supply_thumbnail', $item->ID);

									/* Description */

									$supply_description = get_field('supply_description', $item->ID);

								?>

								<li>

									<div class="photo">

										<img src="<?php echo $supply_thumbnail; ?>" alt="<?php echo $item->post_title; ?>" />

									</div>

									<div class="details">

										<h2><?php echo $item->post_title; ?></h2>

										<p><?php echo $supply_description; ?></p>

										<div class="more">

											<a href="/contact/">Get More Info</a>

										</div>

									</div>

								</li>

							<?php endforeach; ?>

						</ul>

					</div>

				<?php endwhile; endif; ?>

			</div>

		</div>

	</div>

<?php get_footer(); ?>