## 3. `header.php` (FINAL)
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="nav-container">
        <div class="logo-area">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="display:flex; gap:10px; align-items:center;" aria-label="<?php bloginfo('name'); ?>">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cogitarilogo.png'); ?>" 
                         alt="<?php bloginfo('name'); ?> Logo" 
                         class="logo-img-icon">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cogitariwordmark.png'); ?>" 
                         alt="<?php bloginfo('name'); ?>" 
                         class="logo-img-text">
                <?php endif; ?>
            </a>
        </div>

        <nav class="main-menu" role="navigation" aria-label="<?php esc_attr_e('Menu Principal', 'cogitari'); ?>">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'depth'          => 1,
                ));
            } else {
                ?>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'cogitari'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/ia/')); ?>"><?php esc_html_e('IA', 'cogitari'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/automacao/')); ?>"><?php esc_html_e('Automação', 'cogitari'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/marketing/')); ?>"><?php esc_html_e('Marketing', 'cogitari'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/ferramentas/')); ?>"><?php esc_html_e('Ferramentas', 'cogitari'); ?></a></li>
                </ul>
                <?php
            }
            ?>
        </nav>

        <div class="header-actions">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <label for="search-input" class="screen-reader-text"><?php esc_html_e('Buscar', 'cogitari'); ?></label>
                <input type="search" 
                       id="search-input"
                       class="search-input" 
                       placeholder="<?php esc_attr_e('Buscar...', 'cogitari'); ?>" 
                       value="<?php echo get_search_query(); ?>" 
                       name="s"
                       aria-label="<?php esc_attr_e('Buscar', 'cogitari'); ?>">
                <button type="submit" class="search-btn" aria-label="<?php esc_attr_e('Enviar busca', 'cogitari'); ?>">
                    <i class="ph ph-magnifying-glass" style="font-size: 20px;" aria-hidden="true"></i>
                </button>
            </form>

            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo esc_url(admin_url()); ?>" class="btn-gradient" style="padding: 8px 20px; font-size: 0.85rem;">
                    <?php esc_html_e('Painel', 'cogitari'); ?>
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url(wp_login_url()); ?>" class="btn-gradient" style="padding: 8px 20px; font-size: 0.85rem;">
                    <?php esc_html_e('Entrar', 'cogitari'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<?php if (is_home() || is_front_page()) : ?>
<div class="ads-wrapper">
    <span class="ads-label"><?php esc_html_e('Publicidade', 'cogitari'); ?></span>
    <div class="banner-placeholder glass-hover-effect">
        <?php esc_html_e('Banner 970x90 - Anúncio Horizontal', 'cogitari'); ?>
    </div>
</div>
<?php endif; ?>
```
