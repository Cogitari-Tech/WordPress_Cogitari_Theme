<?php
/**
 * Search Results Template
 * 
 * @package Cogitari
 */

get_header();
?>

<div style="height: 120px;"></div>

<main style="max-width: 1280px; margin: 0 auto; padding: 0 20px;">

    <header style="text-align: center; margin-bottom: 60px;">
        <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 20px;">
            <?php printf(esc_html__('Resultados para: %s', 'cogitari'), '<span class="text-gradient">' . get_search_query() . '</span>'); ?>
        </h1>
        <p style="color: var(--text-grey); font-size: 1.1rem;">
            <?php
            global $wp_query;
            printf(
                esc_html__('Encontrados %d resultados', 'cogitari'),
                $wp_query->found_posts
            );
            ?>
        </p>
    </header>

    <div class="news-grid">
        <?php 
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
                $categories = get_the_category();
        ?>
            <article class="news-card glass glass-hover-effect" onclick="window.location='<?php the_permalink(); ?>'" style="cursor: pointer;">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('cogitari-thumbnail', array(
                        'class' => 'news-thumb',
                        'alt'   => get_the_title(),
                        'style' => 'width:100%; height:200px; object-fit:cover; border-radius:12px; margin-bottom:20px;'
                    )); ?>
                <?php else : ?>
                    <div class="news-thumb-placeholder thumb-purple"></div>
                <?php endif; ?>

                <div class="news-card-content">
                    <div class="news-tags">
                        <?php if (!empty($categories)) : ?>
                            <span class="tag-pill"><?php echo esc_html($categories[0]->name); ?></span>
                        <?php endif; ?>
                    </div>
                    <h3 class="news-title"><?php the_title(); ?></h3>
                    <div class="news-description"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></div>
                    <a href="<?php the_permalink(); ?>" class="read-more-link">
                        <?php esc_html_e('Ler artigo', 'cogitari'); ?> 
                        <i class="ph ph-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>

        <?php 
            endwhile;
            
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('« Anterior', 'cogitari'),
                'next_text' => __('Próximo »', 'cogitari'),
            ));
            
        else : 
        ?>
            <div style="grid-column: 1 / -1;">
                <div class="glass-card rounded-2xl p-12 text-center">
                    <div style="font-size: 5rem; margin-bottom: 20px;">😔</div>
                    <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 15px; color: white;">
                        <?php esc_html_e('Nenhum resultado encontrado', 'cogitari'); ?>
                    </h2>
                    <p style="color: var(--text-grey); margin-bottom: 30px;">
                        <?php esc_html_e('Tente buscar com outras palavras-chave.', 'cogitari'); ?>
                    </p>
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="max-width: 500px; margin: 0 auto;">
                        <input type="search" 
                               name="s" 
                               class="glass-input" 
                               placeholder="<?php esc_attr_e('Digite sua busca...', 'cogitari'); ?>" 
                               value="<?php echo get_search_query(); ?>">
                        <button type="submit" class="btn-gradient" style="width: 100%; margin-top: 15px;">
                            <?php esc_html_e('Buscar Novamente', 'cogitari'); ?>
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
</main>

<?php get_footer(); ?>
```