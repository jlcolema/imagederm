<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="content">

						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

					</div>

					<div class="form">

						<?php gravity_form(

							// $id_or_title

							"Contact",

							// $display_title

							false,

							// $display_description

							true,

							// $display inactive

							false,

							// $field_values

							null,

							// $ajax

							false,

							// $tabindex

							1

						); ?>

					</div>

				<?php endwhile; endif; ?>

			</div>

			<div id="secondary" role="complementary">

				<h3>Contact Information</h3>

				<div class="map">

					<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?client=safari&amp;q=632+W.+Elk+Ave.Glendale,+CA+91204&amp;oe=UTF-8&amp;ie=UTF8&amp;hq=&amp;hnear=632+W+Elk+Ave,+Glendale,+California+91204&amp;t=m&amp;z=14&amp;ll=34.141442,-118.268538&amp;output=embed"></iframe>

				</div>

				<div id="" class="vcard">

					<div class="fn n org">Imagederm</div>

					<div class="adr">

						<div class="street-address">632 W. Elk Ave.</div>

						<span class="locality">Glendale</span>,

						<span class="region">CA</span>

						<span class="postal-code">91204</span>

					</div>

					<div class="tel">(818) 500-9034</div>

					<div class="toll-free">(818) 500-9034</div>

					<div class="email">

						<a href="mailto:sales@imagederm.com">sales@imagederm.com</a>

					</div>

				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>