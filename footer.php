<div class="row">
	<div class="twelve columns">
		<div class="navbar" id="nav2" role="navigation">
			<div class="row">
				<a class="toggle" gumby-trigger="#nav2 ul.twelve" href="#"><i class="icon-menu"></i></a>
				<?php wp_nav_menu( array( 'theme_location' => 'footermenu', 'container' => false, 'menu_class' => 'twelve columns', 'walker' => new Walker_Page_Custom ) ); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">

	<div class="twelve columns">

		<ul>
			<?php dynamic_sidebar( 'footer' ); ?>
		</ul>

	</div>

</div>

<footer>
	<div class="row" id="footer">

		<div class="eight columns">
			<p>&copy; <?php echo date('Y'); ?> <span itemprop="name"><?php bloginfo('name'); ?></span></p>
			<ul>
				<?php dynamic_sidebar( 'company' ); ?>
			</ul>
		</div>

		<div class="four columns right">
			<p>Site by <img src="<?php bloginfo( 'template_url' ); ?>/img/pd.png" alt="Prydonian Digital - web development, social media strategy and consulting." width="16" height="16" /> <a href="http://prydonian.digital/" target="_blank" rel="author" title="Prydonian Digital - web development, social media strategy and consulting.">Prydonian Digital</a></p>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
<?php //include_once('analytics.php') ?>
</body>
</html>