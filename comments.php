<?php
/**
 * Comments Template
 * @package Cogitari
 */

if (post_password_required()) {
    return;
}
?>

<section class="discussion-section" id="comments">
    
    <div class="discussion-header-row">
        <h3 class="discussion-title">
            <?php esc_html_e('Discussão', 'cogitari'); ?> 
            <span class="discussion-count"><?php echo get_comments_number(); ?></span>
        </h3>
    </div>

    <div class="discussion-box-container">
        <div class="rating-bar">
            <div class="rating-left">
                <span style="font-weight: 700; font-size: 0.85rem; color: var(--text-grey); letter-spacing: 1px;">
                    <?php esc_html_e('AVALIAR:', 'cogitari'); ?>
                </span>
                <div class="stars" id="star-rating">
                    <i class="ph ph-star-fill" data-value="1"></i>
                    <i class="ph ph-star-fill" data-value="2"></i>
                    <i class="ph ph-star-fill" data-value="3"></i>
                    <i class="ph ph-star-fill" data-value="4"></i>
                    <i class="ph ph-star-fill" data-value="5"></i>
                </div>
            </div>
            <div style="font-size: 0.8rem; color: var(--text-grey);">
                <?php if (is_user_logged_in()) : ?>
                    <?php esc_html_e('Logado como:', 'cogitari'); ?> 
                    <strong><?php echo esc_html(wp_get_current_user()->display_name); ?></strong>
                <?php else : ?>
                    <?php esc_html_e('Logado como:', 'cogitari'); ?>
                    <strong><?php esc_html_e('Visitante (Restrito)', 'cogitari'); ?></strong>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="input-area">
            <?php if (is_user_logged_in()) : ?>
                <form action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post">
                    <textarea name="comment" class="comment-textarea" placeholder="<?php esc_attr_e('O que você pensa sobre isso?', 'cogitari'); ?>" required></textarea>
                    <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" />
                    <?php wp_nonce_field('comment-nonce'); ?>
                    <div style="overflow: hidden;">
                        <button type="submit" class="btn-gradient comment-submit-btn">
                            <?php esc_html_e('Publicar Comentário', 'cogitari'); ?>
                        </button>
                    </div>
                </form>
            <?php else : ?>
                <textarea class="comment-textarea" placeholder="<?php esc_attr_e('Faça login para comentar...', 'cogitari'); ?>" disabled></textarea>
                <div style="text-align: right;">
                    <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>" class="btn-gradient">
                        <?php esc_html_e('Entrar', 'cogitari'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="comment-list">
        <?php if (have_comments()) : ?>
            <?php 
            wp_list_comments(array(
                'style'       => 'div',
                'short_ping'  => true,
                'avatar_size' => 50,
                'walker'      => new Cogitari_Walker_Comment(),
            )); 
            ?>
            
            <?php the_comments_pagination(array(
                'prev_text' => '<span class="screen-reader-text">' . __('Anterior', 'cogitari') . '</span>',
                'next_text' => '<span class="screen-reader-text">' . __('Próximo', 'cogitari') . '</span>',
            )); ?>
            
        <?php else : ?>
            <p style="color: var(--text-grey); text-align: center; padding: 40px 0;">
                <?php esc_html_e('Nenhum comentário ainda. Seja o primeiro a comentar!', 'cogitari'); ?>
            </p>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('#star-rating i');
            let selectedRating = 0;
            
            stars.forEach(star => {
                star.addEventListener('mouseover', function() { 
                    highlightStars(this.getAttribute('data-value')); 
                });
                
                star.addEventListener('mouseout', function() { 
                    highlightStars(selectedRating); 
                });
                
                star.addEventListener('click', function() {
                    selectedRating = this.getAttribute('data-value');
                    highlightStars(selectedRating);
                });
            });
            
            function highlightStars(val) {
                stars.forEach(s => {
                    if (s.getAttribute('data-value') <= val) {
                        s.classList.add('filled');
                    } else {
                        s.classList.remove('filled');
                    }
                });
            }
        });
    </script>
</section>