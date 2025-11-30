<?php get_header(); ?>

<div style="height: 120px;"></div>

<main class="single-wrapper">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <header class="post-header">
        <div class="post-meta-top"><?php the_category(' • '); ?> <span>• <?php echo get_the_date(); ?></span></div>
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div style="display:flex; justify-content:center; align-items:center; gap:15px; margin-bottom:30px;">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 40, '', '', array('class' => 'user-avatar') ); ?>
            <div style="text-align:left;"><div style="font-weight:700; font-size:0.9rem;"><?php the_author(); ?></div><div style="font-size:0.8rem; color:var(--text-grey);">Editor Chefe</div></div>
        </div>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <img src="<?php the_post_thumbnail_url('large'); ?>" class="post-featured-image" alt="<?php the_title(); ?>">
    <?php endif; ?>

    <article class="post-content">
        <p class="lead" style="font-size: 1.3rem; font-weight: 300; margin-bottom: 40px;">
            <span class="drop-cap">A</span>
            <?php echo wp_trim_words( get_the_content(), 40, '...' ); ?>
        </p>

        <div class="ad-internal"><span>PUBLICIDADE CONTEXTUAL (970x250)</span></div>

        <?php the_content(); ?>

        <div class="ad-internal"><span>PUBLICIDADE (300x250)</span></div>
    </article>

    <div class="references-box">
        <div class="references-title">FONTES & REFERÊNCIAS</div>
        <ul class="references-list">
            <li>1. OpenAI Research Paper (2024)</li>
            <li>2. Dados internos Cogitari</li>
        </ul>
    </div>

    <section class="related-section">
        <h3 style="border-left: 4px solid var(--color-blue); padding-left: 15px; font-size: 1.5rem;">Relacionados</h3>
        <div class="related-grid">
            <?php
            $related = new WP_Query( array(
                'category__in' => wp_get_post_categories($post->ID),
                'posts_per_page' => 2,
                'post__not_in' => array($post->ID)
            ) );
            if( $related->have_posts() ) { 
                while( $related->have_posts() ) { $related->the_post(); ?>
                    <div class="related-card" onclick="window.location='<?php the_permalink(); ?>'">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="related-thumb">
                        <?php else: ?>
                            <div class="related-thumb" style="background: var(--grad-main);"></div>
                        <?php endif; ?>
                        <div>
                            <h4 style="font-size: 1rem; margin-bottom: 5px;"><?php the_title(); ?></h4>
                            <span style="font-size: 0.8rem; color: var(--text-grey);"><?php echo get_the_date(); ?></span>
                        </div>
                    </div>
                <?php } wp_reset_postdata(); } ?>
        </div>
    </section>

    <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>