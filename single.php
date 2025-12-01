## 6. `single.php` (FINAL)
```php
<?php
/**
 * Single Post Template
 * 
 * @package Cogitari
 */

get_header(); 
?>

<div style="height: 120px;"></div>

<main class="single-wrapper">

    <?php if (have_posts()) : while (have_posts()) : the_post(); 
        $categories = get_the_category();
    ?>

    <header class="post-header">
        <div class="post-meta-top">
            <?php 
            if (!empty($categories)) {
                echo esc_html($categories[0]->name);
            }
            ?> 
            <span>• <?php echo get_the_date(); ?></span>
        </div>
        
        <h1 class="post-title"><?php the_title(); ?></h1>
        
        <div style="display:flex; justify-content:center; align-items:center; gap:15px; margin-bottom:30px;">
            <?php echo get_avatar(get_the_author_meta('ID'), 40, '', get_the_author(), array('class' => 'user-avatar')); ?>
            <div style="text-align:left;">
                <div style="font-weight:700; font-size:0.9rem;"><?php the_author(); ?></div>
                <div style="font-size:0.8rem; color:var(--text-grey);">
                    <?php 
                    $author_description = get_the_author_meta('description');
                    echo $author_description ? esc_html($author_description) : esc_html__('Editor Chefe', 'cogitari'); 
                    ?>
                </div>
            </div>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('cogitari-featured', array(
            'class' => 'post-featured-image',
            'alt'   => get_the_title()
        )); ?>
    <?php endif; ?>

    <article class="post-content">
        <?php 
        $content = get_the_content();
        $paragraphs = explode('</p>', $content);
        
        // Insert ad after 2nd paragraph
        if (count($paragraphs) > 2) {
            $ad_html = '<div class="ad-internal"><span>' . esc_html__('PUBLICIDADE CONTEXTUAL (970x250)', 'cogitari') . '</span></div>';
            array_splice($paragraphs, 2, 0, $ad_html);
            $content = implode('</p>', $paragraphs);
        }
        
        echo $content;
        
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Páginas:', 'cogitari'),
            'after'  => '</div>',
        ));
        ?>
    </article>

    <div class="references-box">
        <div class="references-title"><?php esc_html_e('FONTES & REFERÊNCIAS', 'cogitari'); ?></div>
        <ul class="references-list">
            <li><?php esc_html_e('1. Referências do artigo serão listadas aqui', 'cogitari'); ?></li>
            <li><?php esc_html_e('2. Adicione fontes confiáveis', 'cogitari'); ?></li>
        </ul>
    </div>

    <section class="related-section">
        <h3 style="border-left: 4px solid var(--color-blue); padding-left: 15px; font-size: 1.5rem;">
            <?php esc_html_e('Relacionados', 'cogitari'); ?>
        </h3>
        <div class="related-grid">
            <?php
            $related = new WP_Query(array(
                'category__in'   => wp_get_post_categories($post->ID),
                'posts_per_page' => 2,
                'post__not_in'   => array($post->ID),
            ));
            
            if ($related->have_posts()) : 
                while ($related->have_posts()) : $related->the_post(); 
            ?>
                <div class="related-card" onclick="window.location='<?php the_permalink(); ?>'" style="cursor: pointer;">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', array('class' => 'related-thumb', 'alt' => get_the_title())); ?>
                    <?php else : ?>
                        <div class="related-thumb" style="background: var(--grad-main);"></div>
                    <?php endif; ?>
                    <div>
                        <h4 style="font-size: 1rem; margin-bottom: 5px;"><?php the_title(); ?></h4>
                        <span style="font-size: 0.8rem; color: var(--text-grey);"><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            <?php 
                endwhile; 
                wp_reset_postdata(); 
            endif; 
            ?>
        </div>
    </section>

    <?php 
    // Comments
    if (comments_open() || get_comments_number()) : 
        comments_template(); 
    endif; 
    ?>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
```