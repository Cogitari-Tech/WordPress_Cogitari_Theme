## 2. `functions.php` (FINAL)
```php
<?php
/**
 * Cogitari Portal - Functions
 * 
 * @package Cogitari
 * @version 17.0 FINAL
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function cogitari_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-logo', array(
        'height'      => 55,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Menu Principal', 'cogitari'),
    ));
    
    // Add image sizes
    add_image_size('cogitari-featured', 1200, 675, true);
    add_image_size('cogitari-thumbnail', 400, 300, true);
    add_image_size('cogitari-medium', 800, 600, true);
}
add_action('after_setup_theme', 'cogitari_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function cogitari_scripts() {
    // Main stylesheet
    wp_enqueue_style('cogitari-style', get_stylesheet_uri(), array(), '17.0');
    
    // Google Fonts
    wp_enqueue_style(
        'cogitari-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );
    
    // Phosphor Icons
    wp_enqueue_script(
        'phosphor-icons',
        'https://unpkg.com/@phosphor-icons/web',
        array(),
        null,
        true
    );
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cogitari_scripts');

/**
 * Hide Admin Bar for Non-Admins
 */
if (!current_user_can('administrator')) {
    add_filter('show_admin_bar', '__return_false');
}

/**
 * Custom Excerpt Length
 */
function cogitari_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'cogitari_excerpt_length', 999);

/**
 * Custom Excerpt More
 */
function cogitari_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cogitari_excerpt_more');

/**
 * Add Body Classes
 */
function cogitari_body_classes($classes) {
    if (!is_singular()) {
        $classes[] = 'archive-page';
    }
    
    if (is_singular('post')) {
        $classes[] = 'single-post-page';
    }
    
    return $classes;
}
add_filter('body_class', 'cogitari_body_classes');

/**
 * Custom Comments Walker
 */
class Cogitari_Walker_Comment extends Walker_Comment {
    protected function html5_comment($comment, $depth, $args) {
        $tag = ('div' === $args['style']) ? 'div' : 'li';
        
        $commenter = wp_get_current_commenter();
        $show_pending_links = !empty($commenter['comment_author']);
        
        if ($commenter['comment_author_email']) {
            $moderation_note = __('Your comment is awaiting moderation.', 'cogitari');
        } else {
            $moderation_note = __('Your comment is awaiting moderation. Preview:', 'cogitari');
        }
        ?>
        
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent comment-wrapper' : 'comment-wrapper', $comment); ?>>
            <div class="comment-avatar">
                <?php
                if (0 != $args['avatar_size']) {
                    echo get_avatar($comment, $args['avatar_size']);
                }
                ?>
            </div>
            
            <div class="comment-content-box">
                <div class="comment-header">
                    <div class="user-meta">
                        <span class="user-name">
                            <?php
                            $comment_author = get_comment_author_link($comment);
                            
                            if ('0' == $comment->comment_approved && !$show_pending_links) {
                                $comment_author = get_comment_author($comment);
                            }
                            
                            echo $comment_author;
                            ?>
                        </span>
                        <span class="comment-time">• <?php 
                            printf(
                                esc_html_x('%s atrás', '%s = human-readable time difference', 'cogitari'),
                                human_time_diff(get_comment_time('U'), current_time('timestamp'))
                            );
                        ?></span>
                    </div>
                </div>
                
                <div class="comment-text">
                    <?php
                    comment_text(
                        $comment,
                        array_merge(
                            $args,
                            array(
                                'add_below' => 'div-comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                            )
                        )
                    );
                    ?>
                </div>
                
                <?php if ('0' == $comment->comment_approved) : ?>
                    <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                <?php endif; ?>
                
                <div class="comment-footer">
                    <span><i class="ph ph-thumbs-up"></i> 0</span>
                    <span><i class="ph ph-thumbs-down"></i></span>
                    <?php
                    comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'add_below' => 'div-comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'before'    => '<span><i class="ph ph-arrow-bend-up-left"></i> ',
                                'after'     => '</span>',
                            )
                        )
                    );
                    ?>
                </div>
            </div>
        <?php
    }
}

/**
 * Security Headers
 */
function cogitari_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
}
add_action('send_headers', 'cogitari_security_headers');
```