<?php
// Configurações do Tema COGITARI

function cogitari_theme_setup() {
    // Permite que o WordPress gerencie o título da página (<title>)
    add_theme_support( 'title-tag' );

    // Habilita imagens destacadas (thumbnails) nos posts
    add_theme_support( 'post-thumbnails' );

    // Registra o Menu Principal
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'cogitari' ),
    ) );
}
add_action( 'after_setup_theme', 'cogitari_theme_setup' );

// Remove a barra de administração do topo quando você está logado vendo o site (opcional, para limpar o design)
add_filter('show_admin_bar', '__return_false');
?>