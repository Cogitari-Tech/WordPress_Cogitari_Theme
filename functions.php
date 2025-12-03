<?php
/**
 * Cogitari Functions - v24.0 FIXED
 */
if (!defined('ABSPATH')) { exit; }

// 1. SETUP
function cogitari_setup() {
    load_theme_textdomain('cogitari', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    register_nav_menus(array('primary' => 'Menu Principal'));
    add_image_size('cogitari-card', 600, 400, true);
    add_image_size('cogitari-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'cogitari_setup');

// 2. SCRIPTS
function cogitari_scripts() {
    // Versão 24.0 para limpar cache
    wp_enqueue_style('cogitari-style', get_stylesheet_uri(), array(), '24.0');
    
    if (file_exists(get_template_directory() . '/assets/css/woocommerce.css')) {
        wp_enqueue_style('cogitari-woo', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), '24.0');
    }

    if (file_exists(get_template_directory() . '/assets/js/navigation.js')) {
        wp_enqueue_script('cogitari-nav', get_template_directory_uri() . '/assets/js/navigation.js', array(), '24.0', true);
    }
}
add_action('wp_enqueue_scripts', 'cogitari_scripts');

// 3. INCLUDES
$inc_files = array(
    '/inc/template-tags.php',
    '/inc/customizer.php',
    '/inc/woocommerce-hooks.php',
    '/inc/elementor-support.php'
);

foreach ($inc_files as $file) {
    if (file_exists(get_template_directory() . $file)) {
        require_once get_template_directory() . $file;
    }
}

// 4. CLASSE WALKER (Necessária para comments.php)
if (!class_exists('Cogitari_Walker_Comment')) {
    class Cogitari_Walker_Comment extends Walker_Comment {
        protected function html5_comment($comment, $depth, $args) {
            $tag = ('div' === $args['style']) ? 'div' : 'li';
            ?>
            <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
                <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                    <div class="comment-author vcard">
                        <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                        <?php printf(__('<cite class="fn">%s</cite>', 'cogitari'), get_comment_author_link()); ?>
                    </div>
                    <div class="comment-text"><?php comment_text(); ?></div>
                </div>
            <?php
        }
    }
}