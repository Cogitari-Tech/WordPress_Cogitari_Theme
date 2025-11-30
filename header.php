<?php
/**
 * Header do Tema Cogitari Tec - v5.1 FIXED
 * 
 * CORREÇÕES v5.1:
 * - ✅ Logo renderiza corretamente (custom ou padrão SVG)
 * - ✅ Estrutura semântica HTML5 melhorada
 * - ✅ Menu mobile funcional
 * - ✅ Breadcrumbs otimizados
 * - ✅ Classes CSS consolidadas
 * 
 * @package Cogitari_Tec
 * @since 5.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Performance Optimization -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#020511">
    
    <!-- Open Graph (Para Single Posts) -->
    <?php if (is_single()) : ?>
        <meta property="og:title" content="<?php the_title(); ?>">
        <meta property="og:description" content="<?php echo wp_trim_words(get_the_excerpt(), 30); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'cogitari-featured'); ?>">
        <?php endif; ?>
        <meta property="og:url" content="<?php the_permalink(); ?>">
        <meta property="og:type" content="article">
    <?php endif; ?>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Background Orbs (Glassmorphism Effect) - CORRIGIDO -->
<div class="orb orb-1" aria-hidden="true"></div>
<div class="orb orb-2" aria-hidden="true"></div>
<div class="orb orb-3" aria-hidden="true"></div>

<div id="page" class="site">
    <!-- Skip Link (Acessibilidade) -->
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e('Pular para o conteúdo', 'cogitari-tec'); ?>
    </a>

    <!-- ============================================
         HEADER GLASSMORPHISM STICKY - CORRIGIDO
    ============================================ -->
    <header id="masthead" class="site-header glass-header" role="banner">
        <div class="container">
            <div class="header-inner">
                
                <!-- ============================================
                     LOGO / BRANDING - RENDERIZAÇÃO CORRIGIDA
                ============================================ -->
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <!-- Logo Customizada (Prioridade 1) -->
                        <div class="custom-logo-wrapper">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <!-- Logo Padrão SVG Cogitari (Prioridade 2) -->
                        <div class="logo-default">
                            <!-- SVG Logo Cogitari (Face Tech com < >) -->
                            <svg class="logo-icon" viewBox="0 0 512 512" aria-hidden="true">
                                <defs>
                                    <linearGradient id="logoGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" style="stop-color:#7B42F6;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#2F80ED;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <!-- Forma Externa (Face com "orelhas") -->
                                <path d="M256 32c-88 0-160 72-160 160v64c0 88 72 160 160 160s160-72 160-160v-64c0-88-72-160-160-160z" fill="url(#logoGrad)" stroke="none"/>
                                <!-- Olhos (Círculos brancos) -->
                                <circle cx="196" cy="300" r="40" fill="white"/>
                                <circle cx="316" cy="300" r="40" fill="white"/>
                                <!-- Símbolo < > acima dos olhos -->
                                <path d="M 200 230 L 160 200 L 200 170" stroke="white" stroke-width="20" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M 312 230 L 352 200 L 312 170" stroke="white" stroke-width="20" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    <?php endif; ?>

                    <!-- Nome do Site e Slogan -->
                    <div class="brand-text">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php 
                                $site_name = get_bloginfo('name');
                                echo esc_html($site_name ? $site_name : 'COGITARI'); 
                                ?>
                            </a>
                        </h1>
                        
                        <?php
                        $slogan = get_theme_mod('cogitari_slogan', 'Tecnologia e Automações');
                        if ($slogan) :
                        ?>
                            <p class="site-slogan">
                                <?php echo esc_html($slogan); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Breadcrumbs Desktop (Escondido no Mobile) -->
                    <?php if (!is_front_page() && !is_home()) : ?>
                        <div class="hidden lg:flex items-center text-sm text-gray-500 space-x-2 ml-6 border-l border-white/10 pl-6 h-8">
                            <a href="<?php echo home_url(); ?>" class="hover:text-white transition-colors">
                                <?php esc_html_e('Início', 'cogitari-tec'); ?>
                            </a>
                            
                            <?php if (is_single()) : ?>
                                <span class="text-gray-600">/</span>
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) :
                                ?>
                                    <a href="<?php echo get_category_link($categories[0]->term_id); ?>" class="hover:text-white transition-colors">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </a>
                                <?php endif; ?>
                                
                            <?php elseif (is_page()) : ?>
                                <span class="text-gray-600">/</span>
                                <span class="text-white"><?php the_title(); ?></span>
                                
                            <?php elseif (is_category()) : ?>
                                <span class="text-gray-600">/</span>
                                <span class="text-white"><?php single_cat_title(); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- ============================================
                     NAVEGAÇÃO PRINCIPAL + IDIOMA + CTA
                ============================================ -->
                <nav id="site-navigation" class="main-navigation hidden md:flex items-center gap-6" role="navigation" aria-label="<?php esc_attr_e('Menu Principal', 'cogitari-tec'); ?>">
                    
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'flex items-center space-x-6 text-sm font-semibold',
                        'fallback_cb'    => 'cogitari_tec_default_menu',
                    ));
                    ?>
                    
                    <!-- Seletor de Idioma -->
                    <div class="language-selector relative">
                        <button class="lang-toggle flex items-center gap-2 px-3 py-1.5 bg-white/5 rounded-lg border border-white/10 hover:border-cyan-500/50 transition-all text-white text-sm"
                                aria-label="<?php esc_attr_e('Selecionar idioma', 'cogitari-tec'); ?>"
                                aria-haspopup="true"
                                aria-expanded="false">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                            <span class="current-lang font-bold"><?php echo strtoupper(substr(get_locale(), 0, 2)); ?></span>
                        </button>
                        
                        <ul class="lang-dropdown absolute right-0 mt-2 w-48 bg-navy/95 backdrop-blur-xl border border-white/10 rounded-xl shadow-2xl hidden" role="menu">
                            <?php
                            $languages = array(
                                'pt_BR' => array('name' => 'Português', 'flag' => '🇧🇷'),
                                'en_US' => array('name' => 'English', 'flag' => '🇺🇸'),
                                'es_ES' => array('name' => 'Español', 'flag' => '🇪🇸'),
                            );
                            
                            foreach ($languages as $locale => $lang) :
                                $is_active = (get_locale() === $locale) ? 'aria-current="page"' : '';
                                $active_class = (get_locale() === $locale) ? 'bg-cyan-500/10 text-cyan-400' : 'text-slate-300';
                            ?>
                                <li role="none">
                                    <a href="<?php echo esc_url(add_query_arg('lang', $locale)); ?>" 
                                       role="menuitem"
                                       data-lang="<?php echo esc_attr($locale); ?>"
                                       class="flex items-center gap-3 px-4 py-3 hover:bg-white/5 transition-colors <?php echo $active_class; ?>"
                                       <?php echo $is_active; ?>>
                                        <span class="text-xl" aria-hidden="true"><?php echo $lang['flag']; ?></span>
                                        <span class="text-sm font-medium"><?php echo esc_html($lang['name']); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- CTA Newsletter -->
                    <a href="#newsletter" class="gradient-bg text-white px-6 py-2 rounded-full font-medium text-sm hover:opacity-90 transition-opacity whitespace-nowrap">
                        <?php esc_html_e('Assinar Newsletter', 'cogitari-tec'); ?>
                    </a>
                </nav>

                <!-- Mobile Menu Toggle -->
                <button class="menu-toggle md:hidden flex items-center gap-2 text-white bg-white/5 border border-white/10 px-3 py-2 rounded-lg" 
                        aria-controls="primary-menu" 
                        aria-expanded="false">
                    <span class="screen-reader-text"><?php esc_html_e('Menu', 'cogitari-tec'); ?></span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div class="mobile-menu-wrapper md:hidden hidden bg-navy/95 backdrop-blur-xl rounded-b-2xl border-t border-white/10 py-4">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'mobile-menu',
                    'container'      => false,
                    'menu_class'     => 'flex flex-col space-y-2',
                    'fallback_cb'    => 'cogitari_tec_default_menu',
                ));
                ?>
                <!-- CTA Mobile -->
                <div class="px-4 pt-4 border-t border-white/10 mt-4">
                    <a href="#newsletter" class="block w-full text-center gradient-bg text-white px-6 py-3 rounded-lg font-medium">
                        <?php esc_html_e('Assinar Newsletter', 'cogitari-tec'); ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <?php
    // ============================================
    // HERO SECTION (apenas na home)
    // ============================================
    if (is_front_page() && get_theme_mod('show_hero', true)) :
        $hero_title = get_theme_mod('hero_title', __('O Futuro da Automação Começa Aqui', 'cogitari-tec'));
        $hero_subtitle = get_theme_mod('hero_subtitle', __('Explore as últimas tendências em IA, automação e marketing digital', 'cogitari-tec'));
    ?>
        <section class="hero-section relative pt-32 pb-20 px-6">
            <div class="container mx-auto max-w-6xl relative z-10">
                <div class="text-center mb-12">
                    <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                        <?php 
                        $title_parts = explode(' ', $hero_title);
                        $last_word = array_pop($title_parts);
                        echo esc_html(implode(' ', $title_parts));
                        ?> 
                        <span class="gradient-text"><?php echo esc_html($last_word); ?></span>
                    </h1>
                    <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                        <?php echo esc_html($hero_subtitle); ?>
                    </p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <div id="content" class="site-content">