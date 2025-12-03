<?php 
/* Template Name: Página de Cadastro */ 
get_header(); 
?>
<div style="height: 120px;"></div>
<main class="form-section">
    <div class="form-container glass">
        <h1 style="font-size: 2rem; margin-bottom: 10px; font-weight: 800;">Crie sua conta</h1>
        <p style="color: var(--text-grey); margin-bottom: 30px;">Junte-se à comunidade Cogitari.</p>
        <form action="#" method="POST">
            <input type="text" class="glass-input" placeholder="Nome Completo">
            <input type="email" class="glass-input" placeholder="E-mail Profissional">
            <input type="password" class="glass-input" placeholder="Senha">
            <button type="submit" class="btn-gradient" style="width: 100%; margin-top: 20px;">Finalizar Cadastro</button>
        </form>
        <div style="margin-top: 30px; font-size: 0.9rem; color: var(--text-grey);">
            Já tem uma conta? <a href="<?php echo wp_login_url(); ?>" style="color:var(--color-blue); font-weight:600;">Fazer Login</a>
        </div>
    </div>
</main>
<?php get_footer(); ?>