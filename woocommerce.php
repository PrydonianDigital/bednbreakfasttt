<?php get_header(); ?>

<div class="row">

	<div class="nine columns">

		<?php woocommerce_content(); ?>

	</div>

	<div class="three columns">
		<ul>
			<?php dynamic_sidebar( 'mainsidebar' ); ?>
		</ul>
	</div>

</div>

<?php get_footer(); ?>