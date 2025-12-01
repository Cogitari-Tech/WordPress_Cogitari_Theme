<?php
/**
 * Elementor Compatibility
 */
if (!defined('ABSPATH')) { exit; }

function cogitari_elementor_support() {
    add_theme_support('elementor-header-footer');
}
add_action('after_setup_theme', 'cogitari_elementor_support');

// Registra locais para o Theme Builder
function cogitari_register_elementor_locations(\) {
    \->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'cogitari_register_elementor_locations');
