<?php get_header(); ?>

<div class="row">

	<div class="nine columns">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class('row'); ?>>

			<div class="twelve columns">

				<div class="row">

					<div class="twelve columns">

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<h5><?php the_date(); ?></h5>

						<?php the_content(); ?>

						<?php comments_template(); ?>

					</div>

				</div>

			</div>

		</div>

		<?php endwhile; ?>

		<?php endif; ?>

	</div>

	<div class="three columns">
		<ul>
			<?php dynamic_sidebar( 'mainsidebar' ); ?>
		</ul>
	</div>

</div>

<?php get_footer(); ?>