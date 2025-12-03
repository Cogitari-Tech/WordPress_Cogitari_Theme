<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-brand">
            <div class="logo-area">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="text-logo">Cogitari</span>
                <?php endif; ?>
            </div>
            <p>Seu portal de referência em automação, IA e marketing digital. Transformando informação em vantagem competitiva.</p>
        </div>

        <div class="footer-column">
            <h4>Navegação</h4>
            <?php
            // Menu Editável do Rodapé
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => false,
                'depth'          => 1,
            ) );
            ?>
        </div>

        <div class="footer-column">
            <h4>Social</h4>
            <ul>
                <li><a href="#">LinkedIn</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">YouTube</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> COGITARI. Todos os direitos reservados.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>