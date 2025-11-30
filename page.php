<?php
/**
 * Template de Página Padrão
 * 
 * RECURSOS v5.1:
 * - ✅ Compatível com Elementor (container fluido)
 * - ✅ Layout limpo e legível
 * - ✅ Suporte a página builder
 * 
 * @package Cogitari_Tec
 * @since 5.1.0
 */

if (!defined('ABSPATH')) exit;

get_header();
?>

<main id="primary" class="site-main page-container relative" role="main">
    
    <?php
    while (have_posts()) : the_post();
    ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
            
            <!-- ============================================
                 HEADER DA PÁGINA
            ============================================ -->
            <header class="page-header relative pt-32 pb-12 px-6 text-center">
                <div class="container mx-auto max-w-4xl relative z-10">
                    <?php the_title('<h1 class="page-title text-5xl md:text-6xl font-bold text-white mb-6">', '</h1>'); ?>
                    
                    <?php if (get_the_excerpt()) : ?>
                        <div class="page-excerpt text-xl text-slate-300 max-w-2xl mx-auto">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </header>

            <!-- ============================================
                 CONTEÚDO DA PÁGINA
            ============================================ -->
            <div class="page-content-wrapper relative px-6 pb-20">
                <div class="container mx-auto max-w-6xl relative z-10">
                    
                    <?php
                    // Se estiver usando Elementor, não adiciona container extra
                    $is_elementor = get_post_meta(get_the_ID(), '_elementor_edit_mode', true);
                    
                    if ($is_elementor === 'builder') :
                        // Container fluido para Elementor
                    ?>
                        <div class="elementor-content">
                            <?php the_content(); ?>
                        </div>
                    <?php else : ?>
                        <!-- Container padrão com glassmorphism -->
                        <div class="glass-article rounded-2xl p-8 md:p-12">
                            <div class="entry-content prose prose-invert max-w-none">
                                <?php
                                the_content();
                                
                                wp_link_pages(array(
                                    'before' => '<div class="page-links mt-8 flex gap-2">' . esc_html__('Páginas:', 'cogitari-tec'),
                                    'after'  => '</div>',
                                    'link_before' => '<span class="page-number px-3 py-1 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">',
                                    'link_after' => '</span>',
                                ));
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>

            <!-- ============================================
                 FOOTER DA PÁGINA (Editar, Compartilhar)
            ============================================ -->
            <?php if (!$is_elementor) : ?>
                <footer class="page-footer relative px-6 pb-12">
                    <div class="container mx-auto max-w-4xl">
                        <div class="flex flex-wrap items-center justify-between gap-4 pt-8 border-t border-white/10">
                            
                            <?php if (is_user_logged_in()) : ?>
                                <div class="text-sm">
                                    <?php edit_post_link(
                                        esc_html__('✏️ Editar Página', 'cogitari-tec'),
                                        '<span class="edit-link">',
                                        '</span>',
                                        null,
                                        'text-blue-400 hover:text-blue-300 transition'
                                    ); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Botões de Compartilhamento -->
                            <div class="flex gap-3">
                                <?php
                                $share_url = urlencode(get_permalink());
                                $share_title = urlencode(get_the_title());
                                ?>
                                
                                <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" 
                                   target="_blank" 
                                   class="text-gray-400 hover:text-white transition p-2 rounded-full hover:bg-white/5"
                                   aria-label="<?php esc_attr_e('Compartilhar no Twitter', 'cogitari-tec'); ?>">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" 
                                   target="_blank" 
                                   class="text-gray-400 hover:text-white transition p-2 rounded-full hover:bg-white/5"
                                   aria-label="<?php esc_attr_e('Compartilhar no LinkedIn', 'cogitari-tec'); ?>">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
            <?php endif; ?>
            
        </article>

        <?php
        // Comentários (se habilitados)
        if (comments_open() || get_comments_number()) :
            echo '<div class="container mx-auto max-w-4xl px-6 pb-12">';
            comments_template();
            echo '</div>';
        endif;
        ?>

    <?php
    endwhile;
    ?>

</main>

<?php
get_footer();
?>