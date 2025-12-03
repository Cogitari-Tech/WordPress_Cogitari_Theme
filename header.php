<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="nav-container">
        <div class="logo-area">
            <a href="<?php echo home_url(); ?>" style="display:flex; align-items:center; gap:8px;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cogitarilogo.png" class="logo-img-icon" alt="Logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cogitariwordmark.png" class="logo-img-text" alt="Cogitari"> 
            </a>
        </div>

        <nav class="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
            ?>
        </nav>

        <div class="header-actions">
            <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo admin_url(); ?>" class="btn-gradient" style="font-size:0.8rem; padding:8px 20px;">Painel</a>
            <?php else : ?>
                <a href="<?php echo site_url('/entrar'); ?>" class="btn-gradient" style="font-size:0.8rem; padding:8px 20px;">Entrar</a>
            <?php endif; ?>
        </div>
    </div>
</header>