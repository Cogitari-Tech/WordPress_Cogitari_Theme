<?php
/**
 * Page Template
 * 
 * @package Cogitari
 */

get_header();
?>

<div style="height: 120px;"></div>

<main class="single-wrapper">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header class="post-header">
        <h1 class="post-title"><?php the_title(); ?></h1>
    </header>

    <article class="post-content">
        <?php 
        the_content();
        
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Páginas:', 'cogitari'),
            'after'  => '</div>',
        ));
        ?>
    </article>

    <?php 
    if (comments_open() || get_comments_number()) : 
        comments_template(); 
    endif; 
    ?>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>