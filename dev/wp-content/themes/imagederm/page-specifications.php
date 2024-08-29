<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="content">

						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

						<?php if(get_field('specifications')): ?>

							<ul>

								<?php while(has_sub_field('specifications')): ?>

									<li><?php the_sub_field('specifications_specification'); ?></li>

								<?php endwhile; ?>

							</ul>

						<?php endif; ?>

					</div>

				<?php endwhile; endif; ?>

			</div>

		</div>

	</div>

<?php get_footer(); ?>