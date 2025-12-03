<?php
/**
 * ============================================
 * /template-parts/content.php
 * ============================================
 * Template part para exibir posts no loop
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-card glass glass-hover-effect'); ?>>
    
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('cogitari-thumbnail', array(
                'class' => 'news-thumb',
                'alt'   => get_the_title(),
                'style' => 'width:100%; height:200px; object-fit:cover; border-radius:12px; margin-bottom:20px;'
            )); ?>
        </a>
    <?php else : ?>
        <div class="news-thumb-placeholder thumb-purple"></div>
    <?php endif; ?>

    <div class="news-card-content">
        
        <!-- Tags/Categorias -->
        <div class="news-tags">
            <?php
            $categories = get_the_category();
            if (!empty($categories)) :
            ?>
                <span class="tag-pill"><?php echo esc_html($categories[0]->name); ?></span>
            <?php endif; ?>
        </div>
        
        <!-- Título -->
        <h3 class="news-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        
        <!-- Excerpt -->
        <div class="news-description">
            <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
        </div>
        
        <!-- Read More -->
        <a href="<?php the_permalink(); ?>" class="read-more-link">
            <?php esc_html_e('Ler artigo', 'cogitari'); ?> 
            <i class="ph ph-arrow-right" aria-hidden="true"></i>
        </a>
        
    </div>

</article>