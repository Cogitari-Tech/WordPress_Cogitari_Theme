/**
 * Navigation Script - Cogitari Theme
 * 
 * Responsável por:
 * - Menu mobile toggle
 * - Smooth scroll
 * - Header scroll behavior
 * 
 * @package Cogitari
 * @version 1.0.0
 */

(function() {
    'use strict';

    /**
     * ============================================
     * MOBILE MENU TOGGLE
     * ============================================
     */
    function initMobileMenu() {
        const header = document.querySelector('.site-header');
        const mainMenu = document.querySelector('.main-menu');
        
        if (!header || !mainMenu) return;

        // Criar botão hamburger se não existir
        let menuToggle = header.querySelector('.menu-toggle');
        
        if (!menuToggle) {
            menuToggle = document.createElement('button');
            menuToggle.className = 'menu-toggle';
            menuToggle.setAttribute('aria-label', 'Menu');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.innerHTML = '<span class="hamburger-box"><span class="hamburger-inner"></span></span>';
            
            // Inserir antes do menu principal
            mainMenu.parentNode.insertBefore(menuToggle, mainMenu);
        }

        // Toggle menu
        menuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            this.setAttribute('aria-expanded', !isExpanded);
            this.classList.toggle('active');
            mainMenu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });

        // Fechar menu ao clicar em link
        const menuLinks = mainMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    menuToggle.click();
                }
            });
        });

        // Fechar menu ao redimensionar para desktop
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 768 && mainMenu.classList.contains('active')) {
                    menuToggle.click();
                }
            }, 250);
        });
    }

    /**
     * ============================================
     * HEADER SCROLL BEHAVIOR
     * ============================================
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        let lastScroll = 0;
        const scrollThreshold = 100;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            // Adicionar classe 'scrolled' após threshold
            if (currentScroll > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            // Hide/Show header (opcional - comentado por padrão)
            /*
            if (currentScroll > lastScroll && currentScroll > scrollThreshold) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            */

            lastScroll = currentScroll;
        });
    }

    /**
     * ============================================
     * SMOOTH SCROLL (Links âncora)
     * ============================================
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                // Ignorar links vazios ou só "#"
                if (href === '#' || href === '') return;
                
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    
                    const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
                    const targetPosition = target.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * ============================================
     * SEARCH TOGGLE (Opcional)
     * ============================================
     */
    function initSearchToggle() {
        const searchForm = document.querySelector('.search-form');
        const searchInput = document.querySelector('.search-input');
        
        if (!searchForm || !searchInput) return;

        // Expandir input no mobile ao focar
        searchInput.addEventListener('focus', function() {
            if (window.innerWidth <= 768) {
                this.style.width = '200px';
            }
        });

        searchInput.addEventListener('blur', function() {
            if (window.innerWidth <= 768 && this.value === '') {
                this.style.width = '150px';
            }
        });
    }

    /**
     * ============================================
     * ACESSIBILIDADE - Focus Trap no Menu Mobile
     * ============================================
     */
    function initFocusTrap() {
        const mainMenu = document.querySelector('.main-menu');
        if (!mainMenu) return;

        mainMenu.addEventListener('keydown', function(e) {
            // ESC para fechar
            if (e.key === 'Escape' && this.classList.contains('active')) {
                const menuToggle = document.querySelector('.menu-toggle');
                if (menuToggle) menuToggle.click();
            }

            // Tab trap (opcional)
            if (e.key === 'Tab') {
                const focusableElements = this.querySelectorAll('a, button, input');
                const firstElement = focusableElements[0];
                const lastElement = focusableElements[focusableElements.length - 1];

                if (e.shiftKey && document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                } else if (!e.shiftKey && document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        });
    }

    /**
     * ============================================
     * INICIALIZAÇÃO
     * ============================================
     */
    function init() {
        // Aguardar DOM estar pronto
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                initMobileMenu();
                initHeaderScroll();
                initSmoothScroll();
                initSearchToggle();
                initFocusTrap();
            });
        } else {
            // DOM já está pronto
            initMobileMenu();
            initHeaderScroll();
            initSmoothScroll();
            initSearchToggle();
            initFocusTrap();
        }
    }

    // Executar
    init();

})();