<?php
/**
 * Cogitari Tec Theme Functions - v5.0
 * 
 * NOVIDADES v5.0:
 * - ✅ Áreas de widget para AdSense
 * - ✅ Suporte a logo personalizada
 * - ✅ Customizer com opções de redes sociais
 * - ✅ Handler de newsletter
 * - ✅ Compatibilidade Elementor
 * 
 * @package Cogitari_Tec
 * @since 5.0.0
 */

if (!defined('ABSPATH')) { exit; }

// ==========================================
// 1. SETUP DO TEMA
// ==========================================
function cogitari_tec_setup() {
    // Traduções
    load_theme_textdomain('cogitari-tec', get_template_directory() . '/languages');

    // Suporte Nativo
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    
    // Tamanhos de Imagem
    add_image_size('cogitari-featured', 1200, 600, true);
    add_image_size('cogitari-card', 800, 400, true);
    add_image_size('cogitari-thumbnail', 400, 250, true);
    
    // HTML5
    add_theme_support('html5', array(
        'search-form', 
        'comment-form', 
        'comment-list', 
        'gallery', 
        'caption', 
        'style', 
        'script'
    ));
    
    // Logo Personalizada
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    
    // Menus
    register_nav_menus(array(
        'primary' => esc_html__('Menu Principal', 'cogitari-tec'),
        'footer'  => esc_html__('Menu Footer', 'cogitari-tec'),
    ));

    // Elementor Compatibility
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'cogitari_tec_setup');

// ==========================================
// 2. CONTENT WIDTH (Para Elementor)
// ==========================================
if (!isset($content_width)) {
    $content_width = 1200;
}

// ==========================================
// 3. SCRIPTS E ESTILOS
// ==========================================
function cogitari_tec_scripts() {
    // CSS Principal
    wp_enqueue_style('cogitari-tec-style', get_stylesheet_uri(), array(), '5.0.0');
    
    // Tailwind CSS (CDN - Opcional, remova se preferir compilar localmente)
    // wp_enqueue_style('tailwindcss', 'https://cdn.tailwindcss.com', array(), null);
    
    // Fontes Google
    wp_enqueue_style(
        'cogitari-tec-fonts', 
        'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;700&display=swap', 
        array(), 
        null
    );
    
    // JavaScript de Navegação
    if (file_exists(get_template_directory() . '/js/navigation.js')) {
        wp_enqueue_script(
            'cogitari-tec-navigation', 
            get_template_directory_uri() . '/js/navigation.js', 
            array(), 
            '5.0.0', 
            true
        );
    }

    // JavaScript de Internacionalização
    if (file_exists(get_template_directory() . '/js/i18n.js')) {
        wp_enqueue_script(
            'cogitari-tec-i18n', 
            get_template_directory_uri() . '/js/i18n.js', 
            array(), 
            '5.0.0', 
            true
        );
    }

    // Comentários threaded
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cogitari_tec_scripts');

// ==========================================
// 4. REGISTRO DE WIDGETS (SIDEBARS + ADSENSE)
// ==========================================
function cogitari_tec_widgets_init() {
    // Sidebar Principal
    register_sidebar(array(
        'name'          => esc_html__('Sidebar Principal', 'cogitari-tec'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Adicione widgets aqui.', 'cogitari-tec'),
        'before_widget' => '<section id="%1$s" class="widget glass-card rounded-xl p-6 mb-6 %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title text-white font-bold text-lg mb-4">',
        'after_title'   => '</h2>',
    ));

    // Footer Widgets (4 colunas)
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer Coluna %d', 'cogitari-tec'), $i),
            'id'            => 'footer-' . $i,
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="text-white font-semibold mb-4">',
            'after_title'   => '</h4>',
        ));
    }

    // ========== ÁREAS PARA ADSENSE ==========
    
    // AdSense - Topo (728x90 ou 970x90)
    register_sidebar(array(
        'name'          => esc_html__('AdSense - Topo', 'cogitari-tec'),
        'id'            => 'adsense-top',
        'description'   => esc_html__('Banner horizontal no topo (728x90 ou 970x90)', 'cogitari-tec'),
        'before_widget' => '<div id="%1$s" class="adsense-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="screen-reader-text">',
        'after_title'   => '</h3>',
    ));

    // AdSense - Feed (Native Ads 300x250)
    register_sidebar(array(
        'name'          => esc_html__('AdSense - Feed de Notícias', 'cogitari-tec'),
        'id'            => 'adsense-feed',
        'description'   => esc_html__('Anúncios nativos entre posts (300x250)', 'cogitari-tec'),
        'before_widget' => '<div id="%1$s" class="adsense-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="screen-reader-text">',
        'after_title'   => '</h3>',
    ));

    // AdSense - Sidebar (Rectangle 336x280)
    register_sidebar(array(
        'name'          => esc_html__('AdSense - Sidebar', 'cogitari-tec'),
        'id'            => 'adsense-sidebar',
        'description'   => esc_html__('Retângulo grande na sidebar (336x280)', 'cogitari-tec'),
        'before_widget' => '<div id="%1$s" class="adsense-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="screen-reader-text">',
        'after_title'   => '</h3>',
    ));

    // AdSense - Skyscraper (160x600)
    register_sidebar(array(
        'name'          => esc_html__('AdSense - Skyscraper', 'cogitari-tec'),
        'id'            => 'adsense-skyscraper',
        'description'   => esc_html__('Banner vertical (160x600)', 'cogitari-tec'),
        'before_widget' => '<div id="%1$s" class="adsense-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="screen-reader-text">',
        'after_title'   => '</h3>',
    ));

    // AdSense - In-Content (Responsivo)
    register_sidebar(array(
        'name'          => esc_html__('AdSense - Dentro do Artigo', 'cogitari-tec'),
        'id'            => 'adsense-content',
        'description'   => esc_html__('Anúncio responsivo dentro do conteúdo do post', 'cogitari-tec'),
        'before_widget' => '<div id="%1$s" class="adsense-widget adsense-in-content %2$s" style="margin: 2rem 0;">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="screen-reader-text">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'cogitari_tec_widgets_init');

// ==========================================
// 5. CUSTOMIZER (Opções de Personalização)
// ==========================================
function cogitari_tec_customize_register($wp_customize) {
    
    // ========== SEÇÃO: BRANDING ==========
    $wp_customize->add_section('cogitari_branding', array(
        'title'    => __('Branding Cogitari', 'cogitari-tec'),
        'priority' => 25,
    ));
    
    // Slogan
    $wp_customize->add_setting('cogitari_slogan', array(
        'default'           => 'Tecnologia e Automações',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cogitari_slogan', array(
        'label'   => __('Slogan', 'cogitari-tec'),
        'section' => 'cogitari_branding',
        'type'    => 'text',
    ));

    // CNPJ
    $wp_customize->add_setting('company_cnpj', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_cnpj', array(
        'label'   => __('CNPJ da Empresa', 'cogitari-tec'),
        'section' => 'cogitari_branding',
        'type'    => 'text',
    ));

    // ========== SEÇÃO: HERO ==========
    $wp_customize->add_section('cogitari_hero', array(
        'title'    => __('Hero Section', 'cogitari-tec'),
        'priority' => 30,
    ));
    
    // Mostrar Hero
    $wp_customize->add_setting('show_hero', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('show_hero', array(
        'label'   => __('Mostrar Hero', 'cogitari-tec'),
        'section' => 'cogitari_hero',
        'type'    => 'checkbox',
    ));
    
    // Título Hero
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'O Futuro da Automação Começa Aqui',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Título', 'cogitari-tec'),
        'section' => 'cogitari_hero',
        'type'    => 'text',
    ));

    // Subtítulo Hero
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Explore as últimas tendências em IA, automação e marketing digital',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Subtítulo', 'cogitari-tec'),
        'section' => 'cogitari_hero',
        'type'    => 'textarea',
    ));

    // ========== SEÇÃO: REDES SOCIAIS ==========
    $wp_customize->add_section('cogitari_social', array(
        'title'    => __('Redes Sociais', 'cogitari-tec'),
        'priority' => 40,
    ));

    $social_networks = array(
        'linkedin'  => 'LinkedIn',
        'twitter'   => 'Twitter',
        'youtube'   => 'YouTube',
        'instagram' => 'Instagram',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_' . $network, array(
            'label'   => sprintf(__('URL %s', 'cogitari-tec'), $label),
            'section' => 'cogitari_social',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'cogitari_tec_customize_register');

// ==========================================
// 6. TEMPLATE TAGS (Funções Auxiliares)
// ==========================================

// Paginação
if (!function_exists('cogitari_tec_pagination')) {
    function cogitari_tec_pagination() {
        global $wp_query;
        if ($wp_query->max_num_pages <= 1) return;
        
        echo '<nav class="pagination flex justify-center gap-2 mt-12" aria-label="' . esc_attr__('Navegação de posts', 'cogitari-tec') . '">';
        echo paginate_links(array(
            'prev_text' => '← ' . __('Anterior', 'cogitari-tec'),
            'next_text' => __('Próximo', 'cogitari-tec') . ' →',
            'type'      => 'list',
        ));
        echo '</nav>';
    }
}

// Tempo de Leitura
if (!function_exists('cogitari_tec_reading_time')) {
    function cogitari_tec_reading_time() {
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200); // 200 palavras por minuto
        
        return sprintf(
            _n('%s min de leitura', '%s min de leitura', $reading_time, 'cogitari-tec'),
            number_format_i18n($reading_time)
        );
    }
}

// Menu Padrão Fallback
if (!function_exists('cogitari_tec_default_menu')) {
    function cogitari_tec_default_menu() {
        echo '<ul class="menu">';
        echo '<li><a href="' . home_url() . '">' . esc_html__('Início', 'cogitari-tec') . '</a></li>';
        echo '<li><a href="' . home_url('/blog/') . '">' . esc_html__('Blog', 'cogitari-tec') . '</a></li>';
        echo '<li><a href="' . home_url('/contato/') . '">' . esc_html__('Contato', 'cogitari-tec') . '</a></li>';
        echo '</ul>';
    }
}

// ==========================================
// 7. NEWSLETTER HANDLER
// ==========================================
function cogitari_tec_newsletter_signup() {
    // Verifica nonce
    if (!isset($_POST['newsletter_nonce']) || !wp_verify_nonce($_POST['newsletter_nonce'], 'newsletter_signup')) {
        wp_die(__('Ação de segurança falhou.', 'cogitari-tec'));
    }

    $email = sanitize_email($_POST['email']);

    if (!is_email($email)) {
        wp_redirect(add_query_arg('newsletter', 'invalid', wp_get_referer()));
        exit;
    }

    // Aqui você pode integrar com um serviço de email marketing
    // Exemplo: Mailchimp, SendGrid, etc.
    
    // Por enquanto, salva no banco (exemplo básico)
    $subscribers = get_option('cogitari_newsletter_subscribers', array());
    
    if (!in_array($email, $subscribers)) {
        $subscribers[] = $email;
        update_option('cogitari_newsletter_subscribers', $subscribers);
        
        wp_redirect(add_query_arg('newsletter', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('newsletter', 'exists', wp_get_referer()));
    }
    
    exit;
}
add_action('admin_post_nopriv_cogitari_newsletter_signup', 'cogitari_tec_newsletter_signup');
add_action('admin_post_cogitari_newsletter_signup', 'cogitari_tec_newsletter_signup');

// ==========================================
// 8. CARREGAMENTO SEGURO DE ARQUIVOS INC
// ==========================================
$includes = array(
    '/inc/template-tags.php',
    '/inc/customizer.php',
    '/inc/elementor-compatibility.php',
);

foreach ($includes as $file) {
    if (file_exists(get_template_directory() . $file)) {
        require get_template_directory() . $file;
    }
}

// ==========================================
// 9. ELEMENTOR COMPATIBILITY
// ==========================================
function cogitari_tec_elementor_support() {
    // Registra localizações de templates Elementor
    if (did_action('elementor/loaded')) {
        // Header & Footer Location
        add_theme_support('elementor-header-footer');
        
        // Elementor Pro Locations
        if (function_exists('elementor_pro_load_plugin')) {
            add_theme_support('elementor-location-api');
        }
    }
}
add_action('after_setup_theme', 'cogitari_tec_elementor_support');

// ==========================================
// 10. ADMIN NOTICES (Feedback Newsletter)
// ==========================================
function cogitari_tec_admin_newsletter_notice() {
    if (isset($_GET['newsletter'])) {
        $status = $_GET['newsletter'];
        
        switch ($status) {
            case 'success':
                echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__('Inscrição realizada com sucesso!', 'cogitari-tec') . '</p></div>';
                break;
            case 'exists':
                echo '<div class="notice notice-info is-dismissible"><p>' . esc_html__('Este email já está cadastrado.', 'cogitari-tec') . '</p></div>';
                break;
            case 'invalid':
                echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__('Email inválido.', 'cogitari-tec') . '</p></div>';
                break;
        }
    }
}
add_action('admin_notices', 'cogitari_tec_admin_newsletter_notice');