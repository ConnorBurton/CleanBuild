<?php


// WORDPRESS FUNCTIONS
require_once('functions/wordpress/site-init.php');


// STYLES / SCRIPTS
require_once('functions/wordpress/site-dequeue.php');
require_once('functions/wordpress/site-enqueue.php');


// ACF FUNCTIONS
require_once('functions/acf/acf-functions.php');
require_once('functions/acf/acf-shortcodes.php');

// CUSTOM
require_once('functions/wordpress/wordpress-custom.php');
require_once('functions/custom/svg-shortcode.php');

?>
