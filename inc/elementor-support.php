<?php
if (!defined('ABSPATH')) { exit; }
function cogitari_elementor_support() {
    add_theme_support('elementor-header-footer');
}
add_action('after_setup_theme', 'cogitari_elementor_support');
