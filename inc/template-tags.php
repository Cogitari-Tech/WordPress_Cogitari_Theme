<?php
/**
 * ============================================
 * /inc/template-tags.php
 * ============================================
 */
if (!defined('ABSPATH')) { exit; }

/**
 * Exibe a data de publicação do post
 */
function cogitari_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    
    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );
    
    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Exibe o autor do post
 */
function cogitari_posted_by() {
    echo '<span class="byline"> por <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>';
}