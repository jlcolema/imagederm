<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="content">

						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

						<ol class="questions">

							<?php

								$posts = get_field('faqs');

								if( $posts ): ?>

								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

								<?php setup_postdata($post); ?>

								<li>

									<a href="#faq-<?php echo get_the_ID(); ?>">

										<?php the_title(); ?>

									</a>

								</li>

								<?php endforeach; ?>

								<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

							<?php endif; ?>

						</ol>

					</div>

					<div class="faqs">

						<ol>

							<?php

								$posts = get_field('faqs');

								if( $posts ): ?>

								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

								<?php setup_postdata($post); ?>

								<li id="faq-<?php echo get_the_ID(); ?>">

									<h2 class="question"><?php the_title(); ?></h2>

									<div class="answer">

										<?php the_field('faq_answer'); ?>

									</div>

								</li>

								<?php endforeach; ?>

								<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

							<?php endif; ?>

						</ol>

					</div>

				<?php endwhile; endif; ?>

			</div>

		</div>

	</div>

<?php get_footer(); ?>