<?php
/**
 * ============================================
 * /inc/elementor-support.php
 * ============================================
 */
if (!defined('ABSPATH')) { exit; }

/**
 * Adiciona suporte ao Elementor
 */
function cogitari_elementor_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'cogitari_elementor_support');

/**
 * Registra localizações do Elementor Theme Builder
 */
function cogitari_register_elementor_locations($manager) {
    $manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'cogitari_register_elementor_locations');