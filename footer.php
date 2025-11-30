<?php
/**
 * Footer do Tema Cogitari Tec - v5.1 FIXED
 * 
 * CORREÇÕES v5.1:
 * - ✅ Grid responsivo 4 colunas funcionando
 * - ✅ Layout fluido para mobile
 * - ✅ Links sociais alinhados
 * - ✅ Copyright dinâmico + CNPJ
 * - ✅ Structured data para SEO
 * 
 * @package Cogitari_Tec
 * @since 5.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

    </div><!-- #content -->

    <!-- ============================================
         FOOTER GLASSMORPHISM - ESTRUTURA CORRIGIDA
    ============================================ -->
    <footer id="colophon" class="site-footer relative" role="contentinfo">
        <div class="container mx-auto max-w-6xl">
            
            <!-- Footer Widgets Grid (4 Colunas) -->
            <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                    
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
            <?php else : ?>
                <!-- Footer Padrão (caso não haja widgets configurados) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                    
                    <!-- Coluna 1: Sobre -->
                    <div>
                        <div class="text-2xl font-bold gradient-text mb-4">
                            <?php bloginfo('name'); ?>
                        </div>
                        <p class="text-slate-400 text-sm">
                            <?php 
                            $description = get_bloginfo('description');
                            echo $description ? esc_html($description) : esc_html__('Seu portal de referência em automação, IA e marketing digital.', 'cogitari-tec'); 
                            ?>
                        </p>
                    </div>
                    
                    <!-- Coluna 2: Conteúdo -->
                    <div>
                        <h4 class="text-white font-semibold mb-4"><?php esc_html_e('Conteúdo', 'cogitari-tec'); ?></h4>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'container' => false,
                            'menu_class' => 'space-y-2 text-slate-400 text-sm',
                            'fallback_cb' => function() {
                                echo '<ul class="space-y-2 text-slate-400 text-sm">';
                                echo '<li><a href="' . home_url('/category/automacao/') . '" class="hover:text-white transition">' . esc_html__('Automação', 'cogitari-tec') . '</a></li>';
                                echo '<li><a href="' . home_url('/category/ia/') . '" class="hover:text-white transition">' . esc_html__('Inteligência Artificial', 'cogitari-tec') . '</a></li>';
                                echo '<li><a href="' . home_url('/category/marketing/') . '" class="hover:text-white transition">' . esc_html__('Marketing Digital', 'cogitari-tec') . '</a></li>';
                                echo '<li><a href="' . home_url('/category/ferramentas/') . '" class="hover:text-white transition">' . esc_html__('Ferramentas', 'cogitari-tec') . '</a></li>';
                                echo '</ul>';
                            },
                        ));
                        ?>
                    </div>
                    
                    <!-- Coluna 3: Empresa -->
                    <div>
                        <h4 class="text-white font-semibold mb-4"><?php esc_html_e('Empresa', 'cogitari-tec'); ?></h4>
                        <ul class="space-y-2 text-slate-400 text-sm">
                            <li><a href="<?php echo home_url('/sobre/'); ?>" class="hover:text-white transition"><?php esc_html_e('Sobre Nós', 'cogitari-tec'); ?></a></li>
                            <li><a href="<?php echo home_url('/equipe/'); ?>" class="hover:text-white transition"><?php esc_html_e('Equipe', 'cogitari-tec'); ?></a></li>
                            <li><a href="<?php echo home_url('/contato/'); ?>" class="hover:text-white transition"><?php esc_html_e('Contato', 'cogitari-tec'); ?></a></li>
                            <li><a href="<?php echo home_url('/anuncie/'); ?>" class="hover:text-white transition"><?php esc_html_e('Anuncie', 'cogitari-tec'); ?></a></li>
                        </ul>
                    </div>
                    
                    <!-- Coluna 4: Social -->
                    <div>
                        <h4 class="text-white font-semibold mb-4"><?php esc_html_e('Social', 'cogitari-tec'); ?></h4>
                        <ul class="space-y-2 text-slate-400 text-sm">
                            <?php
                            $social_links = array(
                                'linkedin' => get_theme_mod('social_linkedin', '#'),
                                'twitter' => get_theme_mod('social_twitter', '#'),
                                'youtube' => get_theme_mod('social_youtube', '#'),
                                'instagram' => get_theme_mod('social_instagram', '#'),
                            );
                            
                            $social_labels = array(
                                'linkedin' => 'LinkedIn',
                                'twitter' => 'Twitter',
                                'youtube' => 'YouTube',
                                'instagram' => 'Instagram',
                            );

                            foreach ($social_links as $network => $url) :
                                if ($url && $url !== '#') :
                            ?>
                                    <li>
                                        <a href="<?php echo esc_url($url); ?>" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="hover:text-white transition flex items-center gap-2">
                                            <?php echo esc_html($social_labels[$network]); ?>
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        </a>
                                    </li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    
                </div>
            <?php endif; ?>
            
            <!-- Linha Divisória -->
            <div class="border-t border-white/10 pt-8">
                
                <!-- Copyright + Links Legais (CORRIGIDO) -->
                <div class="site-info">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                        
                        <!-- Copyright -->
                        <div class="text-slate-500 text-sm text-center md:text-left">
                            <p class="mb-2">
                                &copy; <?php echo date('Y'); ?> 
                                <strong class="text-slate-400"><?php bloginfo('name'); ?></strong>. 
                                <?php esc_html_e('Todos os direitos reservados.', 'cogitari-tec'); ?>
                            </p>
                            <?php
                            $company_cnpj = get_theme_mod('company_cnpj', '');
                            if ($company_cnpj) :
                            ?>
                                <p class="text-xs text-slate-600">
                                    <?php esc_html_e('CNPJ:', 'cogitari-tec'); ?> <?php echo esc_html($company_cnpj); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Links Legais -->
                        <div class="flex gap-4 text-sm">
                            <a href="<?php echo home_url('/privacidade/'); ?>" class="text-slate-400 hover:text-white transition">
                                <?php esc_html_e('Privacidade', 'cogitari-tec'); ?>
                            </a>
                            <span class="text-slate-600">|</span>
                            <a href="<?php echo home_url('/termos/'); ?>" class="text-slate-400 hover:text-white transition">
                                <?php esc_html_e('Termos de Uso', 'cogitari-tec'); ?>
                            </a>
                            <span class="text-slate-600">|</span>
                            <a href="<?php echo home_url('/cookies/'); ?>" class="text-slate-400 hover:text-white transition">
                                <?php esc_html_e('Cookies', 'cogitari-tec'); ?>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- ============================================
     SCRIPTS INTERATIVOS (Menu Mobile, Lang Dropdown)
============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== MOBILE MENU TOGGLE ==========
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu-wrapper');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });
    }

    // ========== LANGUAGE DROPDOWN ==========
    const langToggle = document.querySelector('.lang-toggle');
    const langDropdown = document.querySelector('.lang-dropdown');
    
    if (langToggle && langDropdown) {
        langToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            langDropdown.classList.toggle('hidden');
        });

        // Fecha ao clicar fora
        document.addEventListener('click', function(e) {
            if (!langToggle.contains(e.target) && !langDropdown.contains(e.target)) {
                langToggle.setAttribute('aria-expanded', 'false');
                langDropdown.classList.add('hidden');
            }
        });
    }

    // ========== SMOOTH SCROLL PARA ÂNCORAS ==========
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#0') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // ========== HEADER STICKY COM SHADOW NO SCROLL ==========
    const header = document.querySelector('.glass-header');
    if (header) {
        let lastScroll = 0;
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                header.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.3)';
            } else {
                header.style.boxShadow = 'none';
            }
            
            lastScroll = currentScroll;
        });
    }
});
</script>

</body>
</html>