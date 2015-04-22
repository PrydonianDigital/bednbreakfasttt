<?php get_header(); ?>

<div class="row">

	<div class="nine columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div <?php post_class('row'); ?>

				<div class="twelve columns">

					<div class="row">

						<div class="twelve columns">

							<?php the_content(); ?>

						</div>

					</div>

				</div>

			</div>

		<?php endwhile; ?>

		<?php endif; ?>


	<div class="three columns">
		<ul>
			<?php dynamic_sidebar( 'mainsidebar' ); ?>
		</ul>
	</div>

</div>

<?php get_footer(); ?>