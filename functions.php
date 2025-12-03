<?php
/**
 * Cogitari Functions - v27.0 (Sidebar & Upload Fix)
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

// 1. SETUP
function cogitari_setup() {
    load_theme_textdomain( 'cogitari', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array( 'height' => 55, 'width' => 200, 'flex-height' => true, 'flex-width' => true ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    
    // Menus
    register_nav_menus( array(
        'primary' => 'Menu Principal',
        'footer'  => 'Menu Rodapé',
    ) );
}
add_action( 'after_setup_theme', 'cogitari_setup' );

// 2. WIDGETS (SIDEBAR ESTILO INFOMONEY)
function cogitari_widgets_init() {
    register_sidebar( array(
        'name'          => 'Barra Lateral Principal',
        'id'            => 'sidebar-1',
        'description'   => 'Adicione widgets aqui (Anúncios, WebStories, Mais Lidas).',
        'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'cogitari_widgets_init' );

// 3. SCRIPTS
function cogitari_scripts() {
    wp_enqueue_style( 'cogitari-style', get_stylesheet_uri(), array(), '27.0' );
    
    if ( file_exists( get_template_directory() . '/assets/css/woocommerce.css' ) ) {
        wp_enqueue_style( 'cogitari-woo', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), '27.0' );
    }
    if ( file_exists( get_template_directory() . '/assets/js/navigation.js' ) ) {
        wp_enqueue_script( 'cogitari-nav', get_template_directory_uri() . '/assets/js/navigation.js', array(), '27.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'cogitari_scripts' );

// 4. CORREÇÃO DE UPLOAD (MIME TYPES)
function cogitari_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'cogitari_mime_types');

// 5. SEGURANÇA
function cogitari_block_wp_admin() {
    if ( is_user_logged_in() && ! current_user_can( 'administrator' ) && ! wp_doing_ajax() ) {
        wp_redirect( home_url() );
        exit;
    }
}
add_action( 'admin_init', 'cogitari_block_wp_admin' );

// Carrega classes se existirem
$inc_files = array('/inc/template-tags.php', '/inc/customizer.php', '/inc/woocommerce-hooks.php', '/inc/elementor-support.php');
foreach ( $inc_files as $file ) {
    if ( file_exists( get_template_directory() . $file ) ) require_once get_template_directory() . $file;
}

// Classe Walker
if ( ! class_exists( 'Cogitari_Walker_Comment' ) ) {
    class Cogitari_Walker_Comment extends Walker_Comment {
        protected function html5_comment( $comment, $depth, $args ) {
            $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
            ?>
            <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
                <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                    <div class="comment-author vcard">
                        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                        <?php printf( __( '<cite class="fn">%s</cite>', 'cogitari' ), get_comment_author_link() ); ?>
                    </div>
                    <div class="comment-text"><?php comment_text(); ?></div>
                </div>
            <?php
        }
    }
}