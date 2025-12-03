<?php
/**
 * 404 Error Page
 * 
 * @package Cogitari
 */

get_header();
?>

<div style="height: 120px;"></div>

<main style="max-width: 900px; margin: 0 auto; padding: 80px 20px; text-align: center;">

    <div class="glass-card rounded-2xl p-12">
        <div style="font-size: 8rem; margin-bottom: 20px;">🔍</div>
        <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 20px; color: white;">
            <?php esc_html_e('Página Não Encontrada', 'cogitari'); ?>
        </h1>
        <p style="color: var(--text-grey); font-size: 1.2rem; margin-bottom: 40px;">
            <?php esc_html_e('Ops! A página que você procura não existe ou foi movida.', 'cogitari'); ?>
        </p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-gradient" style="padding: 15px 40px; font-size: 1rem;">
            <?php esc_html_e('Voltar ao Início', 'cogitari'); ?>
        </a>
    </div>

</main>

<?php get_footer(); ?>