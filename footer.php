<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-brand">
            <div class="logo-area">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cogitarilogo.png'); ?>" 
                         alt="<?php bloginfo('name'); ?>" 
                         style="height: 40px;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cogitariwordmark.png'); ?>" 
                         alt="<?php bloginfo('name'); ?>" 
                         style="height: 35px;">
                <?php endif; ?>
            </div>
            <p><?php esc_html_e('Seu portal de referência em automação, IA e marketing digital.', 'cogitari'); ?></p>
        </div>
        
        <div class="footer-column">
            <h4><?php esc_html_e('Conteúdo', 'cogitari'); ?></h4>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/category/automacao/')); ?>"><?php esc_html_e('Automação', 'cogitari'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/category/ia/')); ?>"><?php esc_html_e('IA', 'cogitari'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/category/marketing/')); ?>"><?php esc_html_e('Marketing', 'cogitari'); ?></a></li>
            </ul>
        </div>
        
        <div class="footer-column">
            <h4><?php esc_html_e('Empresa', 'cogitari'); ?></h4>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/sobre/')); ?>"><?php esc_html_e('Sobre Nós', 'cogitari'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/contato/')); ?>"><?php esc_html_e('Contato', 'cogitari'); ?></a></li>
            </ul>
        </div>
        
        <div class="footer-column">
            <h4><?php esc_html_e('Social', 'cogitari'); ?></h4>
            <ul>
                <li><a href="https://linkedin.com/company/cogitari" target="_blank" rel="noopener noreferrer"><?php esc_html_e('LinkedIn', 'cogitari'); ?></a></li>
                <li><a href="https://instagram.com/cogitari" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Instagram', 'cogitari'); ?></a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; <?php echo date_i18n('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Todos os direitos reservados.', 'cogitari'); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>