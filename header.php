<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COGITARI | Portal de Notícias</title>
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="nav-container">
            <div class="logo-area">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cogitarilogo.png" alt="Icone Cogitari" class="logo-img-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cogitariwordmark.png" alt="Cogitari" class="logo-img-text"> 
            </div>

            <nav class="main-menu">
                <?php
                // Menu dinâmico do WordPress
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => '__return_false', 
                    'items_wrap'     => '<ul>%3$s</ul>',
                ) );
                ?>
                <?php if ( ! has_nav_menu( 'primary' ) ) : ?>
                <ul>
                    <li><a href="<?php echo home_url(); ?>" class="active">Home</a></li>
                    <li><a href="#">Inteligência Artificial</a></li>
                    <li><a href="#">Automação</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Ferramentas</a></li>
                </ul>
                <?php endif; ?>
            </nav>

            <div style="display: flex; gap: 15px; color: var(--text-white); align-items: center;">
                
                <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                    <input type="search" class="search-input" placeholder="Pesquisar..." value="<?php echo get_search_query(); ?>" name="s">
                    <button type="submit" class="search-btn"><i class="ph ph-magnifying-glass" style="font-size: 20px;"></i></button>
                </form>

                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo admin_url(); ?>" class="btn-gradient" style="padding: 10px 24px; font-size: 0.9rem;">Painel</a>
                <?php else : ?>
                    <a href="<?php echo wp_login_url(); ?>" class="btn-gradient" style="padding: 10px 24px; font-size: 0.9rem;">Entrar</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div class="ads-wrapper">
        <span class="ads-label">Publicidade</span>
        <div class="banner-placeholder glass-hover-effect">Banner 970x90 - Anúncio Horizontal</div>
    </div>