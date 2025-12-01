<?php
/**
 * Cogitari Portal - Functions
 * @package Cogitari
 * @version 17.0 FINAL
 */

if (!defined('ABSPATH')) { exit; }

// SETUP DO TEMA
function cogitari_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array('height' => 55, 'width' => 200, 'flex-height' => true, 'flex-width' => true));
    register_nav_menus(array('primary' => esc_html__('Menu Principal', 'cogitari')));
    add_image_size('cogitari-featured', 1200, 675, true);
    add_image_size('cogitari-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'cogitari_theme_setup');

// SCRIPTS
function cogitari_scripts() {
    wp_enqueue_style('cogitari-style', get_stylesheet_uri(), array(), '17.0');
    wp_enqueue_style('cogitari-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null);
    
    if (file_exists(get_template_directory() . '/js/navigation.js')) {
        wp_enqueue_script('cogitari-nav', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true);
    }
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cogitari_scripts');

// INCLUDES (Verificação de segurança)
if (file_exists(get_template_directory() . '/inc/template-tags.php')) require get_template_directory() . '/inc/template-tags.php';
if (file_exists(get_template_directory() . '/inc/customizer.php')) require get_template_directory() . '/inc/customizer.php';
if (file_exists(get_template_directory() . '/inc/woocommerce-hooks.php')) require get_template_directory() . '/inc/woocommerce-hooks.php';
if (file_exists(get_template_directory() . '/inc/elementor-support.php')) require get_template_directory() . '/inc/elementor-support.php';

// CLASSE WALKER PARA COMENTÁRIOS (Correção de Erro Fatal)
if (!class_exists('Cogitari_Walker_Comment')) {
    class Cogitari_Walker_Comment extends Walker_Comment {
        protected function html5_comment( \, \, \ ) {
            \ = ( 'div' === \['style'] ) ? 'div' : 'li';
            ?>
            <<?php echo \; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( \->has_children ? 'parent' : '', \ ); ?>>
                <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                    <div class="comment-author vcard">
                        <?php if ( 0 != \['avatar_size'] ) echo get_avatar( \, \['avatar_size'] ); ?>
                        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">diz:</span>', 'cogitari' ), get_comment_author_link() ); ?>
                    </div>
                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo esc_url( get_comment_link( \->comment_ID, \ ) ); ?>">
                            <?php printf( __( '%1 em %2', 'cogitari' ), get_comment_date(), get_comment_time() ); ?>
                        </a>
                        <?php edit_comment_link( __( '(Editar)', 'cogitari' ), '  ', '' ); ?>
                    </div>
                    <?php if ( '0' == \->comment_approved ) : ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Seu comentário aguarda moderação.', 'cogitari' ); ?></em>
                        <br />
                    <?php endif; ?>
                    
                    <div class="comment-text">
                        <?php comment_text(); ?>
                    </div>
                    
                    <div class="reply">
                        <?php comment_reply_link( array_merge( \, array( 'add_below' => 'div-comment', 'depth' => \, 'max_depth' => \['max_depth'] ) ) ); ?>
                    </div>
                </div>
            <?php
        }
    }
}
