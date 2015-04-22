<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>

<body <?php body_class(); ?>>

<header>
	<div class="row">
		<div class="four columns center push_four">
			<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" width="500" height="151"></a></h1>
		</div>
	</div>
</header>

<nav class="row">
	<div class="navbar" id="nav1" role="navigation">
		<div class="row">
			<a class="toggle" gumby-trigger="#nav1 ul.eleven" href="#"><i class="icon-menu"></i></a>
			<h1 class="one columns logo">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/nav.png"></a></h1>
			<?php wp_nav_menu( array( 'theme_location' => 'bnbmenu', 'container' => false, 'menu_class' => 'eleven columns', 'walker' => new Walker_Page_Custom ) ); ?>
		</div>
	</div>
</nav>