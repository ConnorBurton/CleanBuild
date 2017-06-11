<!doctype html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title(''); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#fff">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>
	</head>

	<?php edit_post_link(); ?>

	<body <?php body_class(); ?> >

		<div id="container">

			<header class="main-header">
				<?php wp_nav_menu(array('menu' => 'Main Menu')); ?>
			</header>
