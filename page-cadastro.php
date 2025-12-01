<?php 
/**
 * Template Name: Página de Cadastro
 * 
 * @package Cogitari
 */ 

get_header(); 
?>

<div style="height: 120px;"></div>

<main class="form-section">
    <div class="form-container glass">
        <h1 style="font-size: 2rem; margin-bottom: 10px; font-weight: 800;">
            <?php esc_html_e('Crie sua conta', 'cogitari'); ?>
        </h1>
        <p style="color: var(--text-grey); margin-bottom: 30px;">
            <?php esc_html_e('Junte-se à comunidade Cogitari.', 'cogitari'); ?>
        </p>
        
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
            <input type="hidden" name="action" value="cogitari_register_user">
            <?php wp_nonce_field('cogitari_register_nonce', 'register_nonce'); ?>
            
            <input type="text" 
                   name="user_name" 
                   class="glass-input" 
                   placeholder="<?php esc_attr_e('Nome Completo', 'cogitari'); ?>" 
                   required>
            
            <input type="email" 
                   name="user_email" 
                   class="glass-input" 
                   placeholder="<?php esc_attr_e('E-mail Profissional', 'cogitari'); ?>" 
                   required>
            
            <input type="password" 
                   name="user_password" 
                   class="glass-input" 
                   placeholder="<?php esc_attr_e('Senha', 'cogitari'); ?>" 
                   required>
            
            <button type="submit" class="btn-gradient" style="width: 100%; margin-top: 20px;">
                <?php esc_html_e('Finalizar Cadastro', 'cogitari'); ?>
            </button>
        </form>
        
        <div style="margin-top: 30px; font-size: 0.9rem; color: var(--text-grey);">
            <?php esc_html_e('Já tem uma conta?', 'cogitari'); ?> 
            <a href="<?php echo esc_url(wp_login_url()); ?>" style="color:var(--color-blue); font-weight:600;">
                <?php esc_html_e('Fazer Login', 'cogitari'); ?>
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>