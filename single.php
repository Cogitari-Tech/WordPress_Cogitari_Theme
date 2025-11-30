<?php
/**
 * Template para post individual
 * Baseado em: Página_De_Post_Ou_Artigo.html
 * 
 * RECURSOS v5.0:
 * - ✅ Layout glassmorphism otimizado para leitura
 * - ✅ Espaços para AdSense estratégicos
 * - ✅ Sistema de comentários moderno
 * - ✅ Compartilhamento social
 * - ✅ Posts relacionados
 * 
 * @package Cogitari_Tec
 * @since 5.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main single-post-container relative">
    
    <?php
    while (have_posts()) :
        the_post();
        $categories = get_the_category();
    ?>
        <!-- ============================================
             AD SPACE - TOPO DO ARTIGO
        ============================================ -->
        <?php if (is_active_sidebar('adsense-top')) : ?>
            <div class="relative pt-20 px-6">
                <div class="container mx-auto max-w-6xl relative z-10">
                    <div class="ad-space rounded-lg p-4 text-center min-h-[100px] mb-8">
                        <?php dynamic_sidebar('adsense-top'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('glass-article'); ?>>
            
            <div class="container mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12 md:py-16 relative z-10">
                
                <!-- ============================================
                     META HEADER (Categoria, Data, Tempo Leitura)
                ============================================ -->
                <div class="flex flex-wrap items-center justify-center gap-3 md:gap-4 mb-6 md:mb-8 text-xs md:text-sm border-b border-white/5 pb-6">
                    <?php if (!empty($categories)) : ?>
                        <a href="<?php echo get_category_link($categories[0]->term_id); ?>" 
                           class="bg-electricBlue/10 text-electricBlue border border-electricBlue/20 px-3 py-1 rounded-full font-medium tracking-wide hover:bg-electricBlue/20 transition-colors">
                            <?php echo esc_html($categories[0]->name); ?>
                        </a>
                    <?php endif; ?>
                    
                    <span class="text-gray-400 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <?php echo get_the_date(); ?>
                    </span>
                    
                    <span class="text-gray-400 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M2 12h20M2 12a10 10 0 0 1 12-10 10 10 0 0 1 8 10M2 12a10 10 0 0 0 12 10 10 10 0 0 0 8-10"/>
                        </svg>
                        <?php echo cogitari_tec_reading_time(); ?>
                    </span>
                </div>

                <!-- ============================================
                     TÍTULO H1
                ============================================ -->
                <header class="entry-header text-center mb-8 md:mb-12">
                    <?php the_title('<h1 class="entry-title text-3xl md:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight max-w-6xl mx-auto">', '</h1>'); ?>
                </header>

                <!-- ============================================
                     IMAGEM DESTACADA
                ============================================ -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image relative w-full h-[250px] md:h-[550px] mb-8 md:mb-12 rounded-lg md:rounded-xl overflow-hidden border border-white/5 shadow-lg">
                        <?php the_post_thumbnail('cogitari-featured', array(
                            'class' => 'w-full h-full object-cover',
                            'alt' => get_the_title()
                        )); ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-midnight/60 to-transparent"></div>
                    </div>
                <?php endif; ?>

                <!-- ============================================
                     AUTOR E COMPARTILHAMENTO
                ============================================ -->
                <div class="flex flex-col md:flex-row items-center justify-between mb-8 md:mb-12 px-2 md:px-4 max-w-6xl mx-auto border-b border-white/5 pb-8 gap-6">
                    <!-- Autor -->
                    <div class="flex items-center gap-4">
                        <?php echo get_avatar(get_the_author_meta('ID'), 64, '', '', array('class' => 'rounded-full border-2 border-electricBlue p-0.5 bg-midnight')); ?>
                        <div>
                            <p class="text-white font-bold text-lg md:text-xl">
                                <?php the_author(); ?>
                            </p>
                            <p class="text-coolgrey/60 text-sm md:text-base">
                                <?php 
                                $author_description = get_the_author_meta('description');
                                echo $author_description ? esc_html($author_description) : esc_html__('Autor', 'cogitari-tec'); 
                                ?>
                            </p>
                        </div>
                    </div>
                    
                    <!-- Compartilhamento Social -->
                    <div class="flex gap-3">
                        <?php
                        $share_url = urlencode(get_permalink());
                        $share_title = urlencode(get_the_title());
                        ?>
                        
                        <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-white transition p-2 md:p-3 rounded-full hover:bg-white/5"
                           aria-label="<?php esc_attr_e('Compartilhar no Twitter', 'cogitari-tec'); ?>">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-white transition p-2 md:p-3 rounded-full hover:bg-white/5"
                           aria-label="<?php esc_attr_e('Compartilhar no Facebook', 'cogitari-tec'); ?>">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                        
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-white transition p-2 md:p-3 rounded-full hover:bg-white/5"
                           aria-label="<?php esc_attr_e('Compartilhar no LinkedIn', 'cogitari-tec'); ?>">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                            </svg>
                        </a>
                        
                        <a href="https://api.whatsapp.com/send?text=<?php echo $share_title; ?>%20<?php echo $share_url; ?>" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-white transition p-2 md:p-3 rounded-full hover:bg-white/5"
                           aria-label="<?php esc_attr_e('Compartilhar no WhatsApp', 'cogitari-tec'); ?>">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- ============================================
                     CONTEÚDO DO POST
                ============================================ -->
                <div class="entry-content article-content text-coolgrey max-w-6xl mx-auto">
                    <?php
                    // Conteúdo do post
                    $content = apply_filters('the_content', get_the_content());
                    
                    // Insere AdSense após 2º parágrafo (opcional)
                    if (is_active_sidebar('adsense-content')) {
                        $paragraphs = explode('</p>', $content);
                        
                        if (count($paragraphs) > 2) {
                            ob_start();
                            dynamic_sidebar('adsense-content');
                            $ad_content = '<div class="my-8 md:my-12">' . ob_get_clean() . '<p class="text-[10px] text-center text-gray-600 mt-2 uppercase tracking-widest">Patrocinado</p></div>';
                            
                            array_splice($paragraphs, 2, 0, $ad_content);
                            $content = implode('</p>', $paragraphs);
                        }
                    }
                    
                    echo $content;

                    wp_link_pages(array(
                        'before' => '<div class="page-links mt-8 flex gap-2">' . esc_html__('Páginas:', 'cogitari-tec'),
                        'after'  => '</div>',
                        'link_before' => '<span class="page-number px-3 py-1 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">',
                        'link_after' => '</span>',
                    ));
                    ?>
                </div>

                <!-- ============================================
                     RODAPÉ DO ARTIGO (Tags + Fontes)
                ============================================ -->
                <footer class="entry-footer mt-12 md:mt-20 pt-8 md:pt-10 border-t border-white/5 max-w-6xl mx-auto">
                    <?php
                    // Tags
                    $tags = get_the_tags();
                    if ($tags) :
                    ?>
                        <div class="mb-8">
                            <h3 class="text-white text-sm font-semibold mb-4 uppercase tracking-wider">
                                <?php esc_html_e('Tags:', 'cogitari-tec'); ?>
                            </h3>
                            <div class="flex gap-2 flex-wrap">
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                                       class="tag-pill text-xs px-3 py-1 rounded-full hover:bg-electricBlue/30 transition-colors">
                                        #<?php echo esc_html($tag->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </footer>

            </div>
        </article>

        <!-- ============================================
             AD SPACE - APÓS ARTIGO
        ============================================ -->
        <?php if (is_active_sidebar('adsense-sidebar')) : ?>
            <div class="container mx-auto max-w-6xl px-4 mb-8 md:mb-12">
                <div class="ad-space rounded-lg p-4 text-center min-h-[150px]">
                    <?php dynamic_sidebar('adsense-sidebar'); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- ============================================
             SEÇÃO: LEIA TAMBÉM + NEWSLETTER
        ============================================ -->
        <section class="container mx-auto max-w-6xl px-4 mb-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
                
                <!-- Posts Relacionados -->
                <div class="glass-panel rounded-xl md:rounded-2xl p-6 md:p-10">
                    <h3 class="text-white font-bold text-lg md:text-xl mb-6 md:mb-8 flex items-center gap-3">
                        <span class="w-1.5 h-6 md:h-8 bg-electricBlue rounded-full"></span>
                        <?php esc_html_e('Relacionados', 'cogitari-tec'); ?>
                    </h3>
                    
                    <?php
                    // Posts relacionados (mesma categoria)
                    $related_query = new WP_Query(array(
                        'posts_per_page' => 2,
                        'post__not_in' => array(get_the_ID()),
                        'category__in' => wp_get_post_categories(get_the_ID()),
                    ));

                    if ($related_query->have_posts()) :
                        echo '<div class="space-y-6 md:space-y-8">';
                        while ($related_query->have_posts()) : $related_query->the_post();
                    ?>
                            <a href="<?php the_permalink(); ?>" class="flex items-start gap-4 md:gap-6 group">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-lg bg-white/5 flex-shrink-0 overflow-hidden">
                                        <?php the_post_thumbnail('cogitari-thumbnail', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition duration-500')); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="flex-1">
                                    <h4 class="text-coolgrey group-hover:text-electricBlue transition-colors font-medium text-base md:text-lg leading-tight mb-2">
                                        <?php the_title(); ?>
                                    </h4>
                                    <?php
                                    $post_categories = get_the_category();
                                    if (!empty($post_categories)) :
                                    ?>
                                        <span class="text-xs md:text-sm text-gray-500">
                                            <?php echo esc_html($post_categories[0]->name); ?> • 
                                            <?php echo cogitari_tec_reading_time(); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </a>
                            <?php if (!$related_query->current_post === $related_query->post_count - 1) : ?>
                                <hr class="border-white/5">
                            <?php endif; ?>
                    <?php
                        endwhile;
                        echo '</div>';
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>

                <!-- Newsletter -->
                <div class="rounded-xl md:rounded-2xl p-6 md:p-10 bg-gradient-to-br from-electricBlue/10 to-vividPurple/10 border border-white/10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 md:w-48 md:h-48 bg-vividPurple/20 blur-3xl rounded-full -mr-16 -mt-16"></div>
                    
                    <h3 class="text-white font-bold text-xl md:text-2xl mb-3 md:mb-4 relative z-10">
                        <?php esc_html_e('Fique à frente', 'cogitari-tec'); ?>
                    </h3>
                    <p class="text-sm md:text-base text-gray-300 mb-6 md:mb-8 relative z-10">
                        <?php esc_html_e('Receba o resumo semanal da COGITARI. Sem spam, apenas inteligência aplicada.', 'cogitari-tec'); ?>
                    </p>
                    
                    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" class="relative z-10 space-y-3 md:space-y-4">
                        <input type="hidden" name="action" value="cogitari_newsletter_signup">
                        <?php wp_nonce_field('newsletter_signup', 'newsletter_nonce'); ?>
                        
                        <input type="email" 
                               name="email"
                               placeholder="seu@email.com" 
                               required
                               class="w-full bg-midnight/60 border border-white/10 rounded-lg p-3 md:p-4 text-sm md:text-base text-white focus:border-electricBlue outline-none backdrop-blur-sm transition-colors">
                        
                        <button type="submit" class="w-full bg-white hover:bg-coolgrey text-midnight font-bold py-3 md:py-4 rounded-lg transition-colors text-xs md:text-sm uppercase tracking-wide">
                            <?php esc_html_e('Inscrever-se Gratuitamente', 'cogitari-tec'); ?>
                        </button>
                    </form>
                </div>

            </div>
        </section>

        <?php
        // Navegação entre posts
        the_post_navigation(array(
            'prev_text' => '<span class="nav-subtitle">' . esc_html__('Anterior:', 'cogitari-tec') . '</span> <span class="nav-title">%title</span>',
            'next_text' => '<span class="nav-subtitle">' . esc_html__('Próximo:', 'cogitari-tec') . '</span> <span class="nav-title">%title</span>',
        ));

        // Comentários
        if (comments_open() || get_comments_number()) :
            echo '<div class="container mx-auto max-w-6xl px-4">';
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