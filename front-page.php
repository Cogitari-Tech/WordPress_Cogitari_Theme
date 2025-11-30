<?php
/**
 * Template da Página Inicial (Home)
 * Baseado em: Pagina_inicial_Portal_De_Noticias.html
 * 
 * CARACTERÍSTICAS:
 * - Grid de notícias com glassmorphism
 * - Espaços para AdSense integrados
 * - Featured card em destaque
 * - Sidebar com trending topics
 * 
 * @package Cogitari_Tec
 * @since 5.0.0
 */

if (!defined('ABSPATH')) exit;

get_header();
?>

<main id="primary" class="site-main relative" role="main">
    
    <!-- ============================================
         AD SPACE - TOPO (728x90 ou 970x90)
    ============================================ -->
    <?php if (is_active_sidebar('adsense-top')) : ?>
        <div class="relative pt-20 px-6">
            <div class="container mx-auto max-w-6xl relative z-10">
                <div class="glass-card rounded-2xl p-4 text-center">
                    <p class="text-xs text-slate-500 mb-2 uppercase tracking-wide"><?php esc_html_e('Publicidade', 'cogitari-tec'); ?></p>
                    <?php dynamic_sidebar('adsense-top'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- ============================================
         FEATURED CARD (Destaque Principal)
    ============================================ -->
    <section class="relative pt-12 pb-20 px-6">
        <div class="container mx-auto max-w-6xl relative z-10">
            
            <?php
            // Busca o post mais recente como destaque
            $featured_query = new WP_Query(array(
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'meta_key' => '_featured_post',
                'meta_value' => '1',
            ));

            // Fallback: se não houver featured, pega o mais recente
            if (!$featured_query->have_posts()) {
                $featured_query = new WP_Query(array(
                    'posts_per_page' => 1,
                    'post_status' => 'publish',
                ));
            }

            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    $categories = get_the_category();
            ?>
                    <div class="glass-card rounded-3xl p-8 hover-lift max-w-4xl mx-auto">
                        <div class="flex flex-col md:flex-row gap-6">
                            <!-- Thumbnail -->
                            <div class="md:w-2/5">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" class="block">
                                        <div class="w-full h-64 rounded-2xl overflow-hidden">
                                            <?php the_post_thumbnail('cogitari-card', array('class' => 'w-full h-full object-cover', 'alt' => get_the_title())); ?>
                                        </div>
                                    </a>
                                <?php else : ?>
                                    <div class="w-full h-64 rounded-2xl gradient-bg flex items-center justify-center text-white text-6xl font-bold">
                                        AI
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Conteúdo -->
                            <div class="md:w-3/5 flex flex-col justify-center">
                                <!-- Tags -->
                                <div class="flex gap-2 mb-4">
                                    <?php if (!empty($categories)) : ?>
                                        <span class="tag-pill text-xs px-3 py-1 rounded-full uppercase tracking-wide">
                                            #<?php echo esc_html($categories[0]->name); ?>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <?php
                                    // Segunda categoria se existir
                                    if (isset($categories[1])) :
                                    ?>
                                        <span class="tag-pill text-xs px-3 py-1 rounded-full uppercase tracking-wide">
                                            #<?php echo esc_html($categories[1]->name); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <h2 class="text-3xl font-bold text-white mb-4 hover:gradient-text transition-all">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <p class="text-slate-300 mb-6">
                                    <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                                </p>
                                
                                <a href="<?php the_permalink(); ?>" class="text-blue-400 hover:text-blue-300 font-medium flex items-center gap-2 transition-colors">
                                    <?php esc_html_e('Leia mais', 'cogitari-tec'); ?>
                                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path d="M5 12h14m-7-7l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

    <!-- ============================================
         NEWS GRID (Grade de Notícias)
    ============================================ -->
    <section class="relative py-20 px-6">
        <div class="container mx-auto max-w-6xl relative z-10">
            <h2 class="text-4xl font-bold text-white mb-12"><?php esc_html_e('Últimas Atualizações', 'cogitari-tec'); ?></h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <?php
                // Loop principal de posts
                $posts_query = new WP_Query(array(
                    'posts_per_page' => 9,
                    'post_status' => 'publish',
                    'post__not_in' => array(get_the_ID()), // Exclui o featured
                ));

                $post_count = 0;
                
                if ($posts_query->have_posts()) :
                    while ($posts_query->have_posts()) : $posts_query->the_post();
                        $post_count++;
                        $categories = get_the_category();
                ?>
                        <!-- News Card -->
                        <article class="glass-card rounded-2xl p-6 hover-lift">
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
                                    <span class="tag-pill text-xs px-3 py-1 rounded-full uppercase tracking-wide">
                                        #<?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Título -->
                            <h3 class="text-xl font-bold text-white mb-3 hover:gradient-text transition-all">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <!-- Excerpt -->
                            <p class="text-slate-400 text-sm mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            
                            <!-- Read More -->
                            <a href="<?php the_permalink(); ?>" class="text-blue-400 hover:text-blue-300 text-sm font-medium">
                                <?php esc_html_e('Ler artigo', 'cogitari-tec'); ?> →
                            </a>
                        </article>

                        <?php
                        // A cada 3 posts, insere um AdSense
                        if ($post_count % 3 == 0 && $post_count < 9 && is_active_sidebar('adsense-feed')) :
                        ?>
                            <article class="glass-card rounded-2xl p-6 border-blue-500/20">
                                <p class="text-xs text-slate-500 mb-3 text-center uppercase tracking-wide"><?php esc_html_e('Patrocinado', 'cogitari-tec'); ?></p>
                                <?php dynamic_sidebar('adsense-feed'); ?>
                            </article>
                        <?php endif; ?>
                
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <div class="col-span-full text-center text-slate-400 py-12">
                        <p><?php esc_html_e('Nenhum post encontrado.', 'cogitari-tec'); ?></p>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </section>

    <!-- ============================================
         FERRAMENTAS DA SEMANA + TRENDING TOPICS
    ============================================ -->
    <section class="relative py-20 px-6">
        <div class="container mx-auto max-w-6xl relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Coluna Esquerda: Ferramentas -->
                <div class="lg:col-span-2">
                    <h2 class="text-3xl font-bold text-white mb-8"><?php esc_html_e('Ferramentas da Semana', 'cogitari-tec'); ?></h2>
                    
                    <?php
                    // Posts com tag "ferramentas"
                    $tools_query = new WP_Query(array(
                        'posts_per_page' => 3,
                        'tag' => 'ferramentas',
                    ));

                    if ($tools_query->have_posts()) :
                        $tool_number = 1;
                        while ($tools_query->have_posts()) : $tools_query->the_post();
                    ?>
                            <div class="glass-card rounded-2xl p-6 mb-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-16 h-16 rounded-xl gradient-bg flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
                                        <?php echo str_pad($tool_number, 2, '0', STR_PAD_LEFT); ?>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-2">
                                            <a href="<?php the_permalink(); ?>" class="hover:gradient-text transition-all">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <p class="text-slate-400 text-sm">
                                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $tool_number++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                    
                    <!-- Ad Sidebar Rectangle -->
                    <?php if (is_active_sidebar('adsense-sidebar')) : ?>
                        <div class="glass-card rounded-2xl p-6 border-blue-500/20">
                            <p class="text-xs text-slate-500 mb-4 text-center uppercase tracking-wide"><?php esc_html_e('Publicidade', 'cogitari-tec'); ?></p>
                            <?php dynamic_sidebar('adsense-sidebar'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Coluna Direita: Trending + Newsletter -->
                <div>
                    <h2 class="text-3xl font-bold text-white mb-8"><?php esc_html_e('Trending Topics', 'cogitari-tec'); ?></h2>
                    
                    <!-- Trending Topics -->
                    <div class="glass-card rounded-2xl p-6 mb-6">
                        <ul class="space-y-4">
                            <?php
                            // Posts mais populares (por comentários ou views)
                            $trending_query = new WP_Query(array(
                                'posts_per_page' => 5,
                                'orderby' => 'comment_count',
                                'order' => 'DESC',
                            ));

                            if ($trending_query->have_posts()) :
                                $trend_number = 1;
                                while ($trending_query->have_posts()) : $trending_query->the_post();
                            ?>
                                    <li class="<?php echo ($trend_number < 5) ? 'pb-4 border-b border-white/10' : ''; ?>">
                                        <a href="<?php the_permalink(); ?>" class="text-slate-200 hover:text-white transition-colors block">
                                            <span class="gradient-text font-bold">#<?php echo $trend_number; ?></span>
                                            <?php the_title(); ?>
                                        </a>
                                    </li>
                            <?php
                                    $trend_number++;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </ul>
                    </div>
                    
                    <!-- Ad Skyscraper -->
                    <?php if (is_active_sidebar('adsense-skyscraper')) : ?>
                        <div class="glass-card rounded-2xl p-4 mb-6 border-blue-500/20">
                            <p class="text-xs text-slate-500 mb-3 text-center uppercase tracking-wide"><?php esc_html_e('Publicidade', 'cogitari-tec'); ?></p>
                            <?php dynamic_sidebar('adsense-skyscraper'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Newsletter Box -->
                    <div id="newsletter" class="glass-card rounded-2xl p-6 text-center">
                        <h3 class="text-xl font-bold text-white mb-3"><?php esc_html_e('Receba Insights Semanais', 'cogitari-tec'); ?></h3>
                        <p class="text-slate-400 text-sm mb-4"><?php esc_html_e('As principais notícias de tech direto no seu email', 'cogitari-tec'); ?></p>
                        
                        <?php
                        // Formulário de newsletter (integre com plugin de sua escolha)
                        if (shortcode_exists('newsletter_form')) :
                            echo do_shortcode('[newsletter_form]');
                        else :
                        ?>
                            <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" class="newsletter-form">
                                <input type="hidden" name="action" value="cogitari_newsletter_signup">
                                <?php wp_nonce_field('newsletter_signup', 'newsletter_nonce'); ?>
                                
                                <input type="email" 
                                       name="email" 
                                       placeholder="seu@email.com" 
                                       required
                                       class="w-full px-4 py-2 rounded-lg bg-white/5 border border-white/10 text-white placeholder-slate-500 mb-3 focus:outline-none focus:border-blue-500">
                                
                                <button type="submit" class="w-full gradient-bg text-white py-2 rounded-lg font-medium hover:opacity-90 transition">
                                    <?php esc_html_e('Inscrever-se', 'cogitari-tec'); ?>
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>