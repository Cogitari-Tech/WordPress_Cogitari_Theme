<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        .text-logo { font-family: 'Inter', sans-serif; font-weight: 800; font-size: 1.8rem; color: white; display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .text-logo span { color: #2F80ED; font-size: 2rem; line-height: 1; }
        .text-logo:hover { opacity: 0.9; }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="nav-container">
        <div class="logo-area">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-logo">
                    <span>&lt;/&gt;</span> <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div>

        <nav class="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>', // CORRIGIDO AQUI
            ));
            ?>
        </nav>

        <div class="header-actions">
            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo admin_url(); ?>" class="btn-gradient" style="font-size:0.8rem; padding:8px 20px;">Painel</a>
            <?php else : ?>
                <a href="<?php echo wp_login_url(); ?>" class="btn-gradient" style="font-size:0.8rem; padding:8px 20px;">Entrar</a>
            <?php endif; ?>
        </div>
    </div>
</header>