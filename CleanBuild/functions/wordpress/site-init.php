<?php

// ADD THUMBNAIL SUPPORT
add_theme_support( 'post-thumbnails' );

// INITIATE MENUS
register_nav_menus( array(
	'Main Navigation' => 'Main Menu',
) );

// INITIATE SIDEBARS
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Main Sidebar', 'theme-slug' ),
    'id' => 'sidebar-1',
    'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ) );
}

?>
