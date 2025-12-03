<?php
/**
 * ============================================
 * /template-parts/content-none.php
 * ============================================
 * Template part para quando não há conteúdo
 */
?>

<section class="no-results not-found">
    
    <div class="glass-card rounded-2xl p-12 text-center">
        
        <div style="font-size: 5rem; margin-bottom: 20px;">😕</div>
        
        <h2 class="page-title" style="font-size: 2rem; font-weight: 700; margin-bottom: 15px; color: white;">
            <?php 
            if (is_search()) :
                esc_html_e('Nenhum resultado encontrado', 'cogitari');
            else :
                esc_html_e('Nada encontrado', 'cogitari');
            endif; 
            ?>
        </h2>

        <div class="page-content" style="color: var(--text-grey); margin-bottom: 30px;">
            <?php
            if (is_home() && current_user_can('publish_posts')) :
                printf(
                    '<p>' . wp_kses(
                        __('Pronto para publicar seu primeiro post? <a href="%1$s">Comece aqui</a>.', 'cogitari'),
                        array('a' => array('href' => array()))
                    ) . '</p>',
                    esc_url(admin_url('post-new.php'))
                );

            elseif (is_search()) :
                ?>
                <p><?php esc_html_e('Desculpe, mas nada correspondeu aos seus termos de pesquisa. Tente novamente com palavras-chave diferentes.', 'cogitari'); ?></p>
                <?php
                get_search_form();

            else :
                ?>
                <p><?php esc_html_e('Parece que não conseguimos encontrar o que você está procurando. Talvez a pesquisa possa ajudar.', 'cogitari'); ?></p>
                <?php
                get_search_form();

            endif;
            ?>
        </div>

    </div>

</section>