<?php get_header(); ?>

<div style="height: 100px;"></div>

<main style="max-width: 1280px; margin: 0 auto; padding: 0 20px;">
    
    <div class="content-sidebar-wrapper">
        
        <article class="single-post-area">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <header class="post-header" style="text-align:left; margin-bottom:30px;">
                    <div class="post-meta-top">
                        <?php the_category(' • '); ?> <span>• <?php echo get_the_date(); ?></span>
                    </div>
                    <h1 class="post-title" style="font-size: 2.5rem;"><?php the_title(); ?></h1>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" class="post-featured-image" style="width:100%; border-radius:12px; margin-bottom:30px;">
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <div class="glass" style="padding: 20px; margin-top: 40px; display:flex; gap:15px; align-items:center;">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 60, '', '', array('style'=>'border-radius:50%;') ); ?>
                    <div>
                        <h4 style="color:white; margin-bottom:5px;">Escrito por <?php the_author(); ?></h4>
                        <p style="color:var(--text-grey); font-size:0.9rem;"><?php echo get_the_author_meta('description'); ?></p>
                    </div>
                </div>

                <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

            <?php endwhile; endif; ?>
        </article>

        <aside class="sidebar-area">
            <?php get_sidebar(); ?>
        </aside>

    </div>
</main>

<?php get_footer(); ?>