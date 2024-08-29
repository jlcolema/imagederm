<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="content">

						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

					</div>

					<div class="product-manuals">

						<ul>

							<?php

								/* Individual Products */

							?>

							<?php

								$args = array(

									'numberposts'	=> -1,
									'post_type'	=> 'product',
									'orderby'		=> 'menu_order',
									'post_status'	=> 'publish'

								);

								$items = get_posts($args);

							?>

							<?php foreach($items as $item): ?>

								<?php

									/* Thumbnail */

									$product_thumbnail = get_field('product_thumbnail', $item->ID);

									/* Border Color */

									$product_thumbnail_border_color = get_field('product_thumbnail_border_color', $item->ID);

									/* Manual */

									$product_manual = get_field('product_manual', $item->ID);

								?>

								<li>

									<a href="<?php echo $product_manual; ?>">

										<div class="photo" style="border-color: <?php echo $product_thumbnail_border_color; ?>">

											<img src="<?php echo $product_thumbnail; ?>" alt="<?php echo $item->post_title; ?>" />

										</div>

										<div class="details">

											<h3><?php echo $item->post_title; ?></h3>

											<div class="more">

												<span>Download Manual</span>

											</div>

										</div>

									</a>

								</li>

							<?php endforeach; ?>

						</ul>

					</div>

				<?php endwhile; endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>