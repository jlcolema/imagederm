<section class="products">

	<div class="wrap">

		<header>

			<h2>Our Products</h2>

		</header>

		<div class="container">

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

						/* Headline */

						$product_headline = get_field('product_headline', $item->ID);

					?>

					<li>

						<a href="<?php echo get_permalink($item->ID); ?>">

							<div class="photo" style="border-color: <?php echo $product_thumbnail_border_color; ?>">

								<img src="<?php echo $product_thumbnail; ?>" alt="<?php echo $item->post_title; ?>" />

							</div>

							<div class="details">

								<h3><?php echo $item->post_title; ?></h3>

								<p><?php echo $product_headline; ?></p>

							</div>

						</a>

					</li>

				<?php endforeach; ?>

			</ul>

		</div>

	</div>

</section>