<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="hentry">

						<h1><?php the_title(); ?></h1>

						<footer>

							<time datetime="<?php echo date(DATE_W3C); ?>"><?php the_time('j F Y') ?></time>

							<p class="author">by <?php the_author() ?></p>

						</footer>

						<?php the_content(); ?>

					</article>

					<?php comments_template(); ?>

				<?php endwhile; endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>