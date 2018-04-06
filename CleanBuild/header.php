<!doctype html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title(''); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <meta name="theme-color" content="#fff">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>
	</head>

	<?php edit_post_link(); ?>

	<body <?php body_class(); ?> >

		<div class="mobile-menu"><?php wp_nav_menu(array('menu' => 'Main Menu', 'container' => false)); ?></div>
		<div class="darkness"></div>

		<div id="container">

			<header class="main-header">
				<div class="container table">

					<div class="logo td vm">
						<a href="/" title="Return to the homepage">
							<img src="<?= get_stylesheet_directory_uri(); ?>/assets/graphics/logo.png" alt="Site Logo">
						</a>
					</div>

					<div class="desk-menu td vm">
						<?php wp_nav_menu(array('menu' => 'Main Menu', 'container' => false)); ?>
					</div>

					<div class="mobile-buttons vm">
						<a href="<?= do_shortcode('[phone link="true"]'); ?>" title="Call us today"><i class="fa fa-phone" aria-hidden="true"></i></a>
						<a href="<?= do_shortcode('[email link="true"]'); ?>" title="Email us today"><i class="fa fa-envelope" aria-hidden="true"></i></a>
						<div id="mob-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>

				</div>
			</header>

			<div class="header-space"></div>