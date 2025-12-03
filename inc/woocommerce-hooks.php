<?php
/**
 * ============================================
 * /inc/woocommerce-hooks.php
 * ============================================
 */
if (!defined('ABSPATH')) { exit; }

/**
 * Adiciona suporte ao WooCommerce
 */
function cogitari_add_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'cogitari_add_woocommerce_support');

/**
 * Enfileira CSS customizado do WooCommerce
 */
function cogitari_woocommerce_scripts() {
    if (class_exists('WooCommerce')) {
        wp_enqueue_style(
            'cogitari-woocommerce', 
            get_template_directory_uri() . '/assets/css/woocommerce.css', 
            array(), 
            '1.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'cogitari_woocommerce_scripts');