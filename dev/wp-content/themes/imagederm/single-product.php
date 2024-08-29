<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="breadcrumbs">

				<a href="/products/">Products</a> <span class="separator">></span> <?php the_title(); ?>

			</div>

			<div id="main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="content">

						<div class="hero">

							<img src="<?php the_field('product_hero'); ?>" alt="" />

						</div>

						<h1><?php the_title(); ?></h1>

						<?php the_field('product_description'); ?>

						<?php if(get_field('product_views')): ?>

							<div class="views">

								<ul>

									<?php while(has_sub_field('product_views')): ?>

										<li>

											<img src="<?php the_sub_field('product_views_image'); ?>" alt="<?php the_sub_field('product_views_description'); ?>" />

										</li>

									<?php endwhile; ?>

								</ul>

							</div>

						<?php endif; ?>

						<?php if(get_field('product_additional_notes')): ?>

							<div class="additional-notes">

								<?php if(get_field('product_additional_notes_title')): ?>

									<h2><?php the_field('product_additional_notes_title'); ?></h2>

								<?php endif; ?>

								<ul>

									<?php while(has_sub_field('product_additional_notes')): ?>

										<li><?php the_sub_field('product_additional_note'); ?></li>

									<?php endwhile; ?>

								</ul>

							</div>

						<?php endif; ?>

						<?php if (get_field('product_financing')): ?>

							<div class="financing-available">

								<p>Financing Available</p>

								<ul>

									<li class="mastercard">MasterCard</li>

									<li class="visa">Visa</li>

									<li class="american-express">American Express</li>

									<li class="discover">Discover</li>

								</ul>

							</div>

						<?php endif; ?>

					</div>

				<?php endwhile; endif; ?>

			</div>

		</div>

	</div>

<?php get_footer(); ?>