<div id="featured-products">

	<div class="wrap">

		<div class="flexslider">

			<?php if( have_rows('featured_slides') ): ?>

				<ul class="slides">

					<?php while( have_rows('featured_slides') ): the_row();

						// Image

						// $slide_image = get_sub_field('slide_image');


						$attachment_id = get_sub_field('slide_image');

						$full = "full";
						$large = "slide_large";
						$medium = "slide_medium";

						// Full Size

						$slide_full = wp_get_attachment_image_src( $attachment_id, $full );

						// Large

						$slide_large = wp_get_attachment_image_src( $attachment_id, $large );

						// Medium

						$slide_medium = wp_get_attachment_image_src( $attachment_id, $medium );



						// Title

						$slide_title = get_sub_field('slide_title');

						// Description

						$slide_description = get_sub_field('slide_description');

					?>

						<li>

							<span data-picture data-alt="<?php echo $slide_title; ?>">

								<!-- 600 x 400 -->

								<span data-src="<?php echo $slide_medium[0]; ?>"></span>

								<!-- 900 x 400 -->

								<span data-src="<?php echo $slide_large[0]; ?>" data-media="(min-width: 640px)"></span>

								<!-- 1200 x 400 -->

								<span data-src="<?php echo $slide_full[0]; ?>" data-media="(min-width: 940px)"></span>

								<!--[if (lt IE 9) & (!IEMobile)]>

									<span data-src="http://placeimg.com/1200/400/any"></span>

								<![endif]-->

								<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->

								<noscript>

									<img src="<?php echo $slide_medium[0]; ?>" alt="<?php echo $slide_title; ?>" />

								</noscript>

							</span>

							<div class="overlay">

								<div class="inner-wrap">

									<div class="title">

										<?php echo $slide_title; ?>

									</div>

									<div class="headline"><?php echo $slide_description; ?></div>

								</div>

							</div>

						</li>

					<?php endwhile; ?>

				</ul>

			<?php endif; ?>

		</div>

	</div>

</div>