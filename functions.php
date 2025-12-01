<?php
/**
 * Cogitari Portal - Functions
 * @package Cogitari
 * @version 17.0 FINAL
 */

if (!defined('ABSPATH')) { exit; }

// 1. SETUP DO TEMA
function cogitari_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array('height' => 55, 'width' => 200, 'flex-height' => true, 'flex-width' => true));
    
    register_nav_menus(array('primary' => esc_html__('Menu Principal', 'cogitari')));
    
    add_image_size('cogitari-featured', 1200, 675, true);
    add_image_size('cogitari-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'cogitari_theme_setup');

// 2. SCRIPTS E ESTILOS
function cogitari_scripts() {
    wp_enqueue_style('cogitari-style', get_stylesheet_uri(), array(), '17.0');
    wp_enqueue_style('cogitari-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null);
    
    // Carrega JS apenas se existirem
    if (file_exists(get_template_directory() . '/js/navigation.js')) {
        wp_enqueue_script('cogitari-nav', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true);
    }
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cogitari_scripts');

// 3. CARREGAR MÓDULOS (A "COLA" QUE FALTAVA)
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

// Carrega suporte a Elementor e Woo apenas se existirem os arquivos
if (file_exists(get_template_directory() . '/inc/woocommerce-hooks.php')) {
    require get_template_directory() . '/inc/woocommerce-hooks.php';
}
if (file_exists(get_template_directory() . '/inc/elementor-support.php')) {
    require get_template_directory() . '/inc/elementor-support.php';
}
