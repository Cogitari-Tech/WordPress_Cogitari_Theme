<?php get_header(); ?>

<div style="height: 140px;"></div>

<main class="single-container">

    <article class="article-wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <header class="article-header">
            <div style="margin-bottom: 20px;">
                <span class="tag-cat"><?php the_category(', '); ?></span>
            </div>
            <h1 class="article-title"><?php the_title(); ?></h1>
            <div class="article-meta">
                <span><i class="ph ph-user"></i> <?php the_author(); ?></span>
                <span><i class="ph ph-calendar-blank"></i> <?php echo get_the_date(); ?></span>
            </div>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="glass" style="padding: 10px; margin-bottom: 40px;">
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="article-feat-img" style="margin-bottom: 0;">
            </div>
        <?php endif; ?>

        <div class="article-content">
            <?php the_content(); ?>
        </div>

        <div class="glass" style="padding: 30px; margin-top: 60px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            <div>
                <span style="color: var(--text-grey); margin-right: 10px;">Tags:</span>
                <?php the_tags('<span class="tag-pill" style="font-size: 0.7rem;">', '</span> <span class="tag-pill" style="font-size: 0.7rem;">', '</span>'); ?>
            </div>
        </div>

        <?php endwhile; endif; ?>
    </article>

    <aside class="sidebar-sticky">
        <div class="glass" style="padding: 30px; margin-bottom: 30px; text-align: center;">
            <div style="width: 80px; height: 80px; background: var(--grad-main); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700;">S</div>
            <h4 style="margin-bottom: 5px;">Escrito por S1M0N</h4>
            <p style="font-size: 0.85rem; color: var(--text-grey);">Especialista em UI/UX.</p>
        </div>

        <div class="glass" style="padding: 30px;">
            <h3 class="widget-title">Leia Também</h3>
            <div class="mini-card">
                <div class="news-thumb-placeholder thumb-blue" style="width: 80px; height: 80px; margin: 0;"></div>
                <div class="mini-info">
                    <h4>Marketing no Instagram: O que muda em 2025?</h4>
                </div>
            </div>
            <div class="mini-card">
                 <div class="news-thumb-placeholder thumb-purple" style="width: 80px; height: 80px; margin: 0;"></div>
                <div class="mini-info">
                    <h4>Automação de WhatsApp para Pequenos Negócios</h4>
                </div>
            </div>
        </div>
    </aside>

</main>

<?php get_footer(); ?>