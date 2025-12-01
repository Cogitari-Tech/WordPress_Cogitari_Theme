## 5. `index.php` (FINAL)
```php
<?php
/**
 * Index Template - Home Page
 * 
 * @package Cogitari
 */

get_header(); 
?>

<main style="max-width: 1280px; margin: 0 auto; padding: 0 20px;">

    <?php if (is_home() || is_front_page()) : ?>
    <!-- Hero Section -->
    <div class="hero-news glass glass-hover-effect" style="background: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-bg.jpg'); ?>') no-repeat center center;">
        <div class="hero-content">
            <span class="tag-cat"><?php esc_html_e('Destaque', 'cogitari'); ?></span>
            <h1 style="font-size: clamp(2rem, 5vw, 3.5rem); max-width: 900px; text-shadow: 0 4px 20px rgba(0,0,0,0.9); margin-bottom: 20px; line-height: 1.1; font-weight: 800;">
                <?php esc_html_e('O Futuro da', 'cogitari'); ?> <span class="text-gradient"><?php esc_html_e('Automação', 'cogitari'); ?></span> <?php esc_html_e('Começa Aqui', 'cogitari'); ?>
            </h1>
            <p style="color: #e2e8f0; max-width: 600px; font-size: 1.2rem; margin-bottom: 20px;">
                <?php esc_html_e('Explore as últimas tendências em IA, automação e marketing digital.', 'cogitari'); ?>
            </p>
        </div>
    </div>

    <!-- Trending Card -->
    <?php
    $trending_query = new WP_Query(array(
        'posts_per_page' => 1,
        'meta_key'       => '_cogitari_trending',
        'meta_value'     => '1',
    ));
    
    if ($trending_query->have_posts()) :
        while ($trending_query->have_posts()) : $trending_query->the_post();
            $categories = get_the_category();
    ?>
    <div class="trending-card glass glass-hover-effect">
        <div class="trending-thumb-container">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('cogitari-medium', array('alt' => get_the_title())); ?>
            <?php else : ?>
                <span class="trending-thumb-text">AI</span>
            <?php endif; ?>
        </div>
        <div class="trending-content">
            <div>
                <?php if (!empty($categories)) : ?>
                    <span class="tag-pill">#<?php echo esc_html($categories[0]->name); ?></span>
                <?php endif; ?>
            </div>
            <h2 class="trending-title"><?php the_title(); ?></h2>
            <p style="color: var(--text-grey); font-size: 1.1rem; margin-bottom: 25px;">
                <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
            </p>
            <a href="<?php the_permalink(); ?>" class="read-more-link">
                <?php esc_html_e('Leia mais', 'cogitari'); ?> 
                <i class="ph ph-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
    <?php endif; ?>

    <h2 class="section-title"><?php esc_html_e('Últimas Atualizações', 'cogitari'); ?></h2>
    
    <div class="news-grid">
        <?php 
        $count = 0; 
        
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
                $count++;
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

            <?php if ($count == 2) : ?>
                <article class="news-card ad-slot-card glass">
                    <span class="ad-slot-label"><?php esc_html_e('Patrocinado', 'cogitari'); ?></span>
                    <div class="ad-slot-rect"><?php esc_html_e('Anúncio 300x250', 'cogitari'); ?></div>
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: white; margin-bottom: 10px;">
                        <?php esc_html_e('Espaço Publicitário', 'cogitari'); ?>
                    </h3>
                </article>
            <?php endif; ?>

        <?php 
            endwhile; 
            
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('« Anterior', 'cogitari'),
                'next_text' => __('Próximo »', 'cogitari'),
            ));
            
        else : 
        ?>
            <p style="color:white; grid-column: 1 / -1; text-align: center;">
                <?php esc_html_e('Nenhum post encontrado.', 'cogitari'); ?>
            </p>
        <?php endif; ?>
    </div>
    
</main>

<?php get_footer(); ?>
```
