# 🚀 Tema Cogitari Tec v5.0 - WordPress Proprietário

## 📋 Visão Geral

Tema WordPress profissional desenvolvido para o portal de notícias **Cogitari Tec**, focado em Automação, Inteligência Artificial e Marketing Digital.

### ✨ Características Principais

- ✅ **Glassmorphism Midnight**: Design moderno com efeitos de vidro e gradientes
- ✅ **Totalmente Editável com Elementor**: Header, Footer e templates customizáveis
- ✅ **SEO Otimizado**: HTML5 semântico, Schema.org, Core Web Vitals
- ✅ **AdSense Ready**: 5 áreas de widget estratégicas para monetização
- ✅ **Responsivo Mobile-First**: Design adaptável para todos os dispositivos
- ✅ **Internacionalização (i18n)**: Preparado para tradução em múltiplos idiomas
- ✅ **Performance**: Lazy loading, preconnect, otimização de assets

---

## 📂 Estrutura do Tema

```
cogitari-tec/
├── style.css                    # CSS principal com variáveis do Design System
├── functions.php                # Configurações e registros do tema
├── header.php                   # Cabeçalho glassmorphism + navegação
├── footer.php                   # Rodapé com widgets e redes sociais
├── index.php                    # Loop padrão de posts
├── front-page.php               # Home page (portal de notícias)
├── single.php                   # Template de post individual
├── page.php                     # Template de página padrão
├── comments.php                 # Sistema de comentários
├── /template-parts/
│   ├── content.php              # Card de post
│   ├── content-none.php         # Sem resultados
│   └── content-featured.php     # Post em destaque
├── /inc/
│   ├── template-tags.php        # Funções auxiliares
│   ├── customizer.php           # Opções do Customizer
│   └── elementor-compatibility.php  # Integração Elementor
├── /js/
│   ├── navigation.js            # Menu mobile
│   ├── i18n.js                  # Sistema de idiomas
│   └── smooth-scroll.js         # Scroll suave
├── /languages/
│   └── cogitari-tec.pot         # Arquivo de tradução
└── screenshot.png               # Preview do tema (1200x900px)
```

---

## 🛠️ Instalação

### Pré-requisitos

- WordPress 5.0+
- PHP 7.4+
- Elementor Free ou Pro (recomendado)
- MySQL 5.6+

### Passo a Passo

1. **Baixar o Tema**
   ```bash
   cd wp-content/themes/
   git clone https://github.com/seu-usuario/cogitari-tec.git
   ```

2. **Ativar no WordPress**
   - Acesse: `Painel WordPress > Aparência > Temas`
   - Clique em "Ativar" no tema Cogitari Tec

3. **Configurar Logo**
   - Acesse: `Painel > Aparência > Personalizar > Identidade do Site`
   - Faça upload da logo (recomendado: 320x80px, formato SVG ou PNG transparente)

4. **Criar Menus**
   - Acesse: `Painel > Aparência > Menus`
   - Crie um menu e atribua à localização "Menu Principal"

5. **Configurar Widgets AdSense**
   - Acesse: `Painel > Aparência > Widgets`
   - Adicione código AdSense nas áreas:
     - `AdSense - Topo` (728x90 ou 970x90)
     - `AdSense - Feed` (300x250 Native Ads)
     - `AdSense - Sidebar` (336x280)
     - `AdSense - Skyscraper` (160x600)
     - `AdSense - Dentro do Artigo` (Responsivo)

---

## 🎨 Design System Cogitari

### Cores (Variáveis CSS)

```css
:root {
    /* Backgrounds */
    --bg-main: #020511;              /* Midnight Void */
    --bg-card: #050A25;              /* Deep Navy */
    --bg-elevated: #0A1245;          /* Elevated surface */
    
    /* Textos */
    --text-title: #FFFFFF;           /* Pure White */
    --text-body: #E2E8F0;            /* Cool Grey */
    --text-secondary: #94A3B8;       /* Muted Grey */
    
    /* Gradientes */
    --gradient-start: #2F80ED;       /* Electric Blue */
    --gradient-end: #7B42F6;         /* Vivid Purple */
    --brand-gradient: linear-gradient(90deg, #2F80ED 0%, #7B42F6 100%);
}
```

### Tipografia

- **Display (Títulos)**: Space Grotesk (Google Fonts)
- **Body (Textos)**: Outfit (Google Fonts)
- **Monospace (Código)**: JetBrains Mono

### Espaçamentos (Scale 8px)

```css
--space-xs: 0.5rem;    /* 8px */
--space-sm: 1rem;      /* 16px */
--space-md: 1.5rem;    /* 24px */
--space-lg: 2rem;      /* 32px */
--space-xl: 3rem;      /* 48px */
--space-2xl: 4rem;     /* 64px */
```

---

## 🎯 Como Editar com Elementor

### 1. Header Customizado

```php
// No functions.php, o suporte já está ativado:
add_theme_support('elementor-header-footer');
```

**Criar Header no Elementor:**
1. Acesse: `Elementor > Templates > Theme Builder`
2. Adicione novo > Header
3. Desenhe seu header personalizado
4. Defina condições de exibição: "Entire Site"
5. Publique

**Desativar Header Padrão:**
Adicione no `functions.php`:
```php
add_action('elementor/theme/register_locations', function($manager) {
    $manager->register_all_core_location();
});
```

### 2. Footer Customizado

Mesmo processo do Header, mas selecionando "Footer" no Theme Builder.

### 3. Templates de Arquivo (Archive, Single)

- **Archive.php**: Crie template "Archive" no Elementor
- **Single.php**: Crie template "Single Post" no Elementor
- Defina condições específicas (categoria, tag, etc.)

---

## 💰 Configuração de AdSense

### Código Recomendado para Widgets

#### 1. Topo (Leaderboard 728x90)
```html
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-XXXXXXXX"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-XXXXXXXX"
     data-ad-slot="1234567890"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
```

#### 2. Feed/Sidebar (Rectangle 300x250)
```html
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-XXXXXXXX"
     data-ad-slot="0987654321"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
```

### Melhores Práticas

- ✅ Use no máximo 3 anúncios por página para não prejudicar UX
- ✅ Posicione após 2º parágrafo no conteúdo (já configurado no `single.php`)
- ✅ Mantenha anúncios acima da dobra (above the fold)
- ✅ Use anúncios responsivos para mobile

---

## 🌍 Internacionalização (i18n)

### Adicionar Novo Idioma

1. **Gerar arquivo .pot**
   ```bash
   cd wp-content/themes/cogitari-tec
   wp i18n make-pot . languages/cogitari-tec.pot
   ```

2. **Traduzir com Poedit**
   - Abra `languages/cogitari-tec.pot` no [Poedit](https://poedit.net/)
   - Traduza as strings
   - Salve como `cogitari-tec-pt_BR.po` (exemplo para Português)

3. **Adicionar ao Sistema**
   - O WordPress automaticamente detectará os arquivos `.mo` gerados

### Strings Traduzíveis no JS

No arquivo `js/i18n.js`, adicione novos textos ao objeto `translations`:

```javascript
const translations = {
    pt_BR: {
        novo_texto: 'Meu texto em português',
    },
    en_US: {
        novo_texto: 'My text in English',
    },
};
```

---

## 🔧 Customização Avançada

### 1. Adicionar Nova Área de Widget

```php
// No functions.php:
register_sidebar(array(
    'name'          => 'Minha Nova Área',
    'id'            => 'minha-area',
    'before_widget' => '<div class="glass-card rounded-xl p-6">',
    'after_widget'  => '</div>',
));
```

### 2. Criar Template de Página Personalizado

Crie arquivo `page-minha-pagina.php`:

```php
<?php
/*
 * Template Name: Minha Página Especial
 */
get_header();
?>

<main class="custom-page">
    <!-- Seu conteúdo aqui -->
</main>

<?php get_footer(); ?>
```

### 3. Adicionar Opção ao Customizer

```php
// No inc/customizer.php:
$wp_customize->add_setting('minha_opcao', array(
    'default' => 'Valor Padrão',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('minha_opcao', array(
    'label' => 'Minha Opção',
    'section' => 'cogitari_branding',
    'type' => 'text',
));
```

---

## 📊 Métricas de Performance (Core Web Vitals)

### Otimizações Implementadas

1. **LCP (Largest Contentful Paint)**: < 2.5s
   - Imagens com lazy loading nativo
   - Preconnect para fontes Google
   - CSS inline crítico

2. **FID (First Input Delay)**: < 100ms
   - JavaScript carregado no rodapé
   - Event listeners otimizados

3. **CLS (Cumulative Layout Shift)**: < 0.1
   - Aspect-ratio definido para imagens
   - Placeholders para AdSense

### Testar Performance

```bash
# Lighthouse CI
npx lighthouse https://seusite.com --view

# PageSpeed Insights
https://pagespeed.web.dev/analysis?url=https://seusite.com
```

---

## 🐛 Troubleshooting

### Problema: Elementor não carrega templates

**Solução:**
```php
// Adicione no functions.php:
add_action('elementor/theme/register_locations', function($manager) {
    $manager->register_all_core_location();
});
```

### Problema: Imagens não aparecem

**Solução:**
Regenere thumbnails:
```bash
wp media regenerate --yes
```

### Problema: AdSense não exibe

**Checklist:**
- ✅ Código do anúncio correto?
- ✅ Site aprovado no AdSense?
- ✅ Aguardou 24-48h após aprovação?
- ✅ Testou em navegação anônima?

---

## 📞 Suporte

- **Email**: suporte@cogitatitec.com
- **GitHub Issues**: [Reportar Problema](https://github.com/seu-usuario/cogitari-tec/issues)
- **Documentação**: [Wiki do Projeto](https://github.com/seu-usuario/cogitari-tec/wiki)

---

## 📝 Changelog

### v5.0.0 (2025-01-28)
- ✅ Conversão completa de HTMLs para WordPress
- ✅ Sistema glassmorphism Midnight implementado
- ✅ 5 áreas de widget AdSense estratégicas
- ✅ Compatibilidade total com Elementor
- ✅ Sistema de internacionalização (i18n)
- ✅ Logo personalizada integrada
- ✅ Performance otimizada (Core Web Vitals)

### v4.2.0 (2025-01-15)
- Base inicial do tema
- Estrutura de arquivos PHP

---

## 📜 Licença

© 2025 Cogitari Tecnologia LTDA. Todos os direitos reservados.

Este é um tema proprietário desenvolvido exclusivamente para **Cogitari Tec**. 
Uso não autorizado é proibido.

---

<div align="center">

**Desenvolvido com ❤️ pela equipe Cogitari Tec**

[Site](https://cogitatitec.com) • [Blog](https://cogitatitec.com/blog) • [Contato](https://cogitatitec.com/contato)

</div>
