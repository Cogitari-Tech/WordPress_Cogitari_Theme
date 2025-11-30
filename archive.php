<?php
/**
 * Template de Arquivo (Categorias, Tags, Autor)
 * 
 * RECURSOS v5.1:
 * - ✅ Compatível com Elementor
 * - ✅ Grid responsivo glassmorphism
 * - ✅ Filtros e ordenação
 * - ✅ Paginação estilizada
 * 
 * @package Cogitari_Tec
 * @since 5.1.0
 */

if (!defined('ABSPATH')) exit;

get_header();
?>

<main id="primary" class="site-main archive-container relative pt-32 px-6" role="main">
    
    <div class="container mx-auto max-w-6xl relative z-10">
        
        <!-- ============================================
             HEADER DO ARQUIVO
        ============================================ -->
        <header class="archive-header mb-12 text-center">
            <?php
            the_archive_title('<h1 class="archive-title text-5xl font-bold text-white mb-4">', '</h1>');
            the_archive_description('<div class="archive-description text-xl text-slate-300 max-w-3xl mx-auto">', '</div>');
            ?>
        </header>

        <!-- ============================================
             TOOLBAR (Ordenação + Filtros)
        ============================================ -->
        <div class="archive-toolbar flex flex-wrap items-center justify-between mb-8 p-4 glass-card rounded-xl">
            <!-- Contador de Posts -->
            <div class="text-slate-400 text-sm">
                <?php
                global $wp_query;
                printf(
                    esc_html__('Mostrando %d de %d resultados', 'cogitari-tec'),
                    $wp_query->post_count,
                    $wp_query->found_posts
                );
                ?>
            </div>
            
            <!-- Ordenação -->
            <form method="get" class="flex items-center gap-2">
                <label for="orderby" class="text-slate-400 text-sm"><?php esc_html_e('Ordenar:', 'cogitari-tec'); ?></label>
                <select name="orderby" id="orderby" class="bg-white/5 border border-white/10 rounded-lg px-4 py-2 text-white text-sm" onchange="this.form.submit()">
                    <option value="date" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'date'); ?>><?php esc_html_e('Mais Recentes', 'cogitari-tec'); ?></option>
                    <option value="title" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'title'); ?>><?php esc_html_e('Título (A-Z)', 'cogitari-tec'); ?></option>
                    <option value="comment_count" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'comment_count'); ?>><?php esc_html_e('Mais Comentados', 'cogitari-tec'); ?></option>
                </select>
            </form>
        </div>

        <!-- ============================================
             GRID DE POSTS
        ============================================ -->
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                
                <?php
                $post_count = 0;
                while (have_posts()) : the_post();
                    $post_count++;
                    $categories = get_the_category();
                ?>
                    <!-- Post Card -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class('glass-card rounded-2xl p-6 hover-lift'); ?>>
                        
                        <!-- Thumbnail -->
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block">
                                <div class="w-full h-40 rounded-xl overflow-hidden mb-4">
                                    <?php the_post_thumbnail('cogitari-card', array('class' => 'w-full h-full object-cover', 'alt' => get_the_title())); ?>
                                </div>
                            </a>
                        <?php else : ?>
                            <div class="w-full h-40 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 mb-4"></div>
                        <?php endif; ?>
                        
                        <!-- Categoria -->
                        <?php if (!empty($categories)) : ?>
                            <div class="flex gap-2 mb-3">
                                <a href="<?php echo get_category_link($categories[0]->term_id); ?>" class="tag-pill text-xs px-3 py-1 rounded-full uppercase tracking-wide">
                                    #<?php echo esc_html($categories[0]->name); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Título -->
                        <h2 class="text-xl font-bold text-white mb-3 hover:gradient-text transition-all">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        
                        <!-- Excerpt -->
                        <p class="text-slate-400 text-sm mb-4">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </p>
                        
                        <!-- Meta Info -->
                        <div class="flex items-center justify-between text-xs text-slate-500">
                            <span><?php echo get_the_date(); ?></span>
                            <span><?php echo cogitari_tec_reading_time(); ?></span>
                        </div>
                    </article>

                    <?php
                    // AdSense a cada 6 posts
                    if ($post_count % 6 == 0 && is_active_sidebar('adsense-feed')) :
                    ?>
                        <article class="glass-card rounded-2xl p-6 border-blue-500/20">
                            <p class="text-xs text-slate-500 mb-3 text-center uppercase tracking-wide"><?php esc_html_e('Patrocinado', 'cogitari-tec'); ?></p>
                            <?php dynamic_sidebar('adsense-feed'); ?>
                        </article>
                    <?php endif; ?>
                
                <?php endwhile; ?>
                
            </div>

            <!-- Paginação -->
            <?php cogitari_tec_pagination(); ?>

        <?php else : ?>
            
            <!-- Nenhum Resultado -->
            <div class="glass-card rounded-2xl p-12 text-center">
                <div class="text-6xl mb-6">🔍</div>
                <h2 class="text-3xl font-bold text-white mb-4"><?php esc_html_e('Nenhum resultado encontrado', 'cogitari-tec'); ?></h2>
                <p class="text-slate-400 mb-6"><?php esc_html_e('Tente ajustar seus filtros ou volte para a página inicial.', 'cogitari-tec'); ?></p>
                <a href="<?php echo home_url(); ?>" class="gradient-bg text-white px-6 py-3 rounded-full font-medium inline-block hover:opacity-90 transition">
                    <?php esc_html_e('Voltar ao Início', 'cogitari-tec'); ?>
                </a>
            </div>
        
        <?php endif; ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>