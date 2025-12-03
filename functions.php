<?php
function cogitari_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array( 'primary' => __( 'Menu Principal', 'cogitari' ) ) );
}
add_action( 'after_setup_theme', 'cogitari_theme_setup' );
add_filter('show_admin_bar', '__return_false');
?>