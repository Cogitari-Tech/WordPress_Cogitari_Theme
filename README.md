# 🚀 Tema Cogitari v17.2 FIXED - WordPress Proprietário

## 📋 Visão Geral

Tema WordPress profissional desenvolvido para o portal de notícias **Cogitari**, focado em Automação, Inteligência Artificial e Marketing Digital.

### ✨ Características v17.2 FIXED

- ✅ **Design Glassmorphism Midnight**: Visual futurista com efeitos de vidro e gradientes azul→roxo
- ✅ **100% Responsivo**: Mobile-first design adaptável para todos os dispositivos
- ✅ **SEO Otimizado**: HTML5 semântico, Core Web Vitals otimizado
- ✅ **Sistema de Comentários Avançado**: Rating com estrelas e layout moderno
- ✅ **Performance**: Lazy loading, preconnect, CSS otimizado
- ✅ **Internacionalização (i18n)**: Text-domain `cogitari` em todas as strings
- ✅ **Segurança**: Headers de segurança, nonces, sanitização completa
- ✅ **Navigation.js**: Menu responsivo com smooth scroll e focus trap

### 🎯 Compatibilidade Futura (Preparado para expansão)

O tema está estruturado para suportar:
- **Elementor**: Hooks preparados para header/footer customizados (requer configuração adicional)
- **WooCommerce**: Estrutura pronta para e-commerce (requer ativação de módulos)
- **AdSense**: Espaços estratégicos para monetização já definidos

---

## 🎨 Design System Cogitari

### Paleta de Cores (Variáveis CSS)

```css
:root {
    /* Backgrounds */
    --bg-void: #020511;              /* Midnight Void */
    --bg-navy: #050A25;              /* Deep Navy */
    --card-bg: #0B0E1E;              /* Card Background */
    
    /* Textos */
    --text-white: #FFFFFF;           /* Pure White */
    --text-grey: #94A3B8;            /* Cool Grey */
    
    /* Gradientes da Marca */
    --color-blue: #2F80ED;           /* Electric Blue */
    --color-purple: #7B42F6;         /* Vivid Purple */
    --grad-main: linear-gradient(135deg, #2F80ED 0%, #7B42F6 100%);
}
```

### Tipografia

- **Display (Títulos)**: Inter (Google Fonts) - Peso 800
- **Body (Textos)**: Inter (Google Fonts) - Peso 300-600
- **Ícones**: Phosphor Icons (CDN)

### Espaçamentos (Scale 8px)

```css
--space-xs: 0.5rem;    /* 8px */
--space-sm: 1rem;      /* 16px */
--space-md: 1.5rem;    /* 24px */
--space-lg: 2rem;      /* 32px */
--space-xl: 3rem;      /* 48px */
```

---

## 📂 Estrutura do Tema (v17.2 FIXED)

```
cogitari/
│
├── style.css                    # CSS principal com Design System
├── functions.php                # v17.2 - Setup completo do tema
├── header.php                   # Cabeçalho glassmorphism + navegação
├── footer.php                   # Rodapé com widgets e redes sociais
├── index.php                    # Loop padrão de posts (Home)
├── front-page.php               # Template da página inicial (Featured)
├── single.php                   # Template de post individual
├── page.php                     # Template de página padrão
├── archive.php                  # Template de arquivo (categorias/tags)
├── search.php                   # Template de resultados de busca
├── 404.php                      # Página de erro 404
├── comments.php                 # Sistema de comentários com rating
├── page-cadastro.php            # Template customizado de cadastro
├── screenshot.png               # Preview do tema (1200x900px)
├── .gitignore                   # Arquivos ignorados pelo Git
├── README.md                    # Este arquivo
│
├── assets/
│   ├── css/
│   │   └── woocommerce.css      # Estilos WooCommerce customizados
│   ├── js/
│   │   └── navigation.js        # ✅ Menu responsivo e smooth scroll
│   └── images/
│       ├── cogitarilogo.png     # Logo ícone (55x55px)
│       ├── cogitariwordmark.png # Wordmark (200x50px)
│       └── hero-bg.jpg          # Background hero section
│
├── inc/
│   ├── customizer.php           # Configurações do Customizer
│   ├── template-tags.php        # Funções auxiliares de template
│   ├── woocommerce-hooks.php    # Hooks WooCommerce
│   └── elementor-support.php    # Suporte Elementor
│
├── template-parts/
│   ├── content.php              # Loop de posts padrão
│   └── content-none.php         # Mensagem "nenhum post encontrado"
│
└── languages/
    └── cogitari.pot             # Arquivo de tradução base
```

---

## 🛠️ Instalação

### Pré-requisitos

- WordPress 6.0+
- PHP 7.4+
- MySQL 5.7+
- Hospedagem: Hostinger (recomendado)
- Plugin: **LiteSpeed Cache** (gerenciamento de cache)

### Passo a Passo (Windows + PowerShell)

#### 1. Download e Preparação

```powershell
# Navegue até a pasta de temas do WordPress
cd C:\caminho\para\wordpress\wp-content\themes\

# Crie a pasta do tema
New-Item -ItemType Directory -Name "cogitari"
cd cogitari
```

#### 2. Adicionar Arquivos do Tema

Copie todos os arquivos PHP e CSS para a pasta `cogitari/`:
- Todos os arquivos da raiz (`*.php`, `style.css`)
- Pasta `assets/` completa
- Pasta `inc/` completa
- Pasta `template-parts/` completa
- Pasta `languages/` completa

#### 3. Criar Estrutura de Assets

```powershell
# Verificar estrutura
tree /F

# Deve exibir:
# cogitari/
# ├── assets/
# │   ├── css/
# │   │   └── woocommerce.css
# │   ├── js/
# │   │   └── navigation.js
# │   └── images/
# │       ├── cogitarilogo.png
# │       ├── cogitariwordmark.png
# │       └── hero-bg.jpg
```

**IMPORTANTE - Imagens da Logo:**

Você tem duas opções para adicionar as imagens:

**Opção A (Recomendada): Hardcoded no Tema**
1. Adicione as imagens na pasta `assets/images/`:
   - `cogitarilogo.png` (ícone 55x55px)
   - `cogitariwordmark.png` (wordmark 200x50px)
   - `hero-bg.jpg` (hero background 1920x1080px)

**Opção B: Upload pelo WordPress**
1. Ative o tema sem as imagens
2. Vá em **Aparência > Personalizar > Identidade do Site**
3. Faça upload da logo customizada

#### 4. Zipar o Tema (Para upload via WordPress)

```powershell
# Volte para a pasta themes
cd ..

# Comprima a pasta cogitari
Compress-Archive -Path cogitari -DestinationPath cogitari.zip
```

#### 5. Ativar no WordPress

**Se instalou diretamente na pasta:**
1. Acesse: `Painel WordPress > Aparência > Temas`
2. Clique em "Ativar" no tema Cogitari

**Se vai fazer upload do ZIP:**
1. Acesse: `Painel WordPress > Aparência > Temas`
2. Clique em "Adicionar Novo" > "Enviar Tema"
3. Selecione `cogitari.zip`
4. Clique em "Instalar Agora" > "Ativar"

#### 6. Configurar Logo (Se não usou hardcoded)

1. Acesse: `Painel > Aparência > Personalizar > Identidade do Site`
2. Faça upload da logo (recomendado: 320x80px, formato PNG transparente)

#### 7. Criar Menus

1. Acesse: `Painel > Aparência > Menus`
2. Crie um menu chamado "Menu Principal"
3. Adicione itens:
   - Home
   - IA (link para `/category/ia/`)
   - Automação (link para `/category/automacao/`)
   - Marketing (link para `/category/marketing/`)
   - Ferramentas (link para `/category/ferramentas/`)
4. Atribua à localização "Menu Principal"

#### 8. Limpar Cache (LiteSpeed Cache)

1. No painel do WordPress, vá em **LiteSpeed Cache**
2. Clique em **Purge All** (Limpar Tudo)
3. Ou use `Ctrl + F5` no navegador para hard refresh

---

## 🎨 Identidade Visual (Logo)

### Descrição Técnica da Logo

**Ícone (cogitarilogo.png):**
- Formato: Círculo/Quadrado arredondado
- Dimensões: 55x55px (mínimo) ou 200x200px (alta resolução)
- Background: Gradiente vertical
  - Topo: `#7B42F6` (Vivid Purple)
  - Base: `#2F80ED` (Electric Blue)
- Elementos Internos (Branco `#FFFFFF`):
  - Dois círculos grandes (olhos)
  - Símbolo `< >` estilizado acima (código/tech)
  - Queixo em "V" suave na parte inferior

**Wordmark (cogitariwordmark.png):**
- Texto: "COGITARI"
- Fonte: Inter ExtraBold (peso 800) ou similar
- Cor: Branco `#FFFFFF`
- Dimensões: 200x50px
- Background: Transparente

---

## ⚙️ Configuração Pós-Instalação

### 1. Criar Categorias

Acesse: `Painel > Posts > Categorias`

Criar as seguintes categorias:
- **IA** (slug: `ia`)
- **Automação** (slug: `automacao`)
- **Marketing** (slug: `marketing`)
- **Ferramentas** (slug: `ferramentas`)

### 2. Criar Posts de Teste

Acesse: `Painel > Posts > Adicionar Novo`

Crie pelo menos 6 posts com:
- Título descritivo
- Imagem destacada (1200x675px)
- Categoria atribuída
- Conteúdo com pelo menos 3 parágrafos

### 3. Configurar Página de Cadastro (Opcional)

1. Acesse: `Painel > Páginas > Adicionar Nova`
2. Título: "Cadastro"
3. Template: Selecione "Página de Cadastro"
4. Publique

---

## 🔧 Customização Avançada

### 1. Alterar Cores do Design System

Edite o arquivo `style.css` (linhas 11-22):

```css
:root {
    --bg-void: #020511;      /* Fundo principal */
    --color-blue: #2F80ED;   /* Azul da marca */
    --color-purple: #7B42F6; /* Roxo da marca */
}
```

### 2. Adicionar Nova Área de Widget (Futuro AdSense)

Edite `functions.php`, adicione após a linha 45:

```php
// Registrar nova sidebar
register_sidebar(array(
    'name'          => 'Minha Nova Área',
    'id'            => 'minha-area',
    'before_widget' => '<div class="widget-adsense">',
    'after_widget'  => '</div>',
));
```

### 3. Customizar Navigation.js

Edite `assets/js/navigation.js` para:
- Alterar threshold do header scroll (linha 76)
- Ativar hide/show header ao rolar (linha 81-85, descomentado)
- Ajustar comportamento do menu mobile

### 4. Criar Template de Página Personalizado

Crie arquivo `page-minha-pagina.php`:

```php
<?php
/*
 * Template Name: Minha Página Especial
 */
get_header();
?>

<main class="custom-page">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>
```

---

## 📊 Métricas de Performance (Core Web Vitals)

### Otimizações Implementadas

1. **LCP (Largest Contentful Paint)**: < 2.5s
   - Imagens com lazy loading nativo
   - Preconnect para fontes Google
   - CSS otimizado sem bloat

2. **FID (First Input Delay)**: < 100ms
   - JavaScript carregado no rodapé
   - Event listeners otimizados
   - Navigation.js assíncrono

3. **CLS (Cumulative Layout Shift)**: < 0.1
   - Aspect-ratio definido para imagens
   - Espaços reservados para ads
   - Menu com transições suaves

### Testar Performance

```bash
# Lighthouse CI (requer Node.js)
npx lighthouse https://seusite.com --view

# PageSpeed Insights (online)
https://pagespeed.web.dev/analysis?url=https://seusite.com
```

---

## 🌐 Internacionalização (i18n)

### Gerar Arquivo de Tradução

```powershell
# Requer WP-CLI instalado
wp i18n make-pot . languages/cogitari.pot
```

### Traduzir com Poedit

1. Baixe [Poedit](https://poedit.net/)
2. Abra `languages/cogitari.pot`
3. Traduza as strings
4. Salve como `cogitari-pt_BR.po`
5. Poedit gerará automaticamente `cogitari-pt_BR.mo`

---

## 🛡️ Segurança

### Headers de Segurança Implementados

```php
// Já incluído no functions.php
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
```

### Boas Práticas Aplicadas

- ✅ Escape de saída: `esc_html()`, `esc_url()`, `esc_attr()`
- ✅ Sanitização de entrada: `sanitize_text_field()`
- ✅ Nonces em formulários: `wp_nonce_field()`
- ✅ Preparação de queries: WP_Query com arrays
- ✅ Admin bar oculto para não-admins
- ✅ Focus trap no menu mobile (navigation.js)

---

## 🔌 Compatibilidade (Expansões Futuras)

### Elementor (Requer configuração adicional)

O tema possui estrutura preparada para Elementor:

1. Instale o plugin Elementor
2. O arquivo `/inc/elementor-support.php` já está pronto
3. Acesse: `Elementor > Theme Builder`
4. Crie templates para Header, Footer, Single, Archive

### WooCommerce (Requer módulos adicionais)

O tema está preparado para WooCommerce:

1. Instale o plugin WooCommerce
2. O arquivo `/inc/woocommerce-hooks.php` já está configurado
3. Os estilos customizados estão em `/assets/css/woocommerce.css`
4. Ative o suporte com `add_theme_support('woocommerce')`

---

## 🛠️ Troubleshooting

### Problema: Imagens da logo não aparecem

**Solução:**
1. Verifique se as imagens estão em `assets/images/`
2. Nomes corretos: `cogitarilogo.png` e `cogitariwordmark.png`
3. Limpe o cache: LiteSpeed Cache > Purge All
4. Hard refresh: `Ctrl + F5`

### Problema: Menu não aparece

**Solução:**
1. Acesse: `Aparência > Menus`
2. Crie um menu
3. Atribua à localização "Menu Principal"
4. Salve as alterações
5. Verifique se `navigation.js` está carregando (F12 > Console)

### Problema: Posts não aparecem na home

**Solução:**
1. Acesse: `Configurações > Leitura`
2. Certifique-se que "Suas últimas publicações" está selecionado
3. Crie pelo menos 1 post publicado

### Problema: Comentários não funcionam

**Checklist:**
- [ ] Comentários estão habilitados? (`Configurações > Discussão`)
- [ ] O post permite comentários? (Editar post > Discussão)
- [ ] Usuário está logado? (sistema requer login)

### Problema: navigation.js não está funcionando

**Debug:**
1. Abra o Console do navegador (F12)
2. Verifique se há erros JavaScript
3. Confirme que o arquivo está sendo carregado:
   ```javascript
   // No console:
   console.log('Navigation loaded');
   ```
4. Limpe o cache do LiteSpeed Cache
5. Verifique se o caminho está correto no `functions.php`

---

## 🧪 Testes e Validação

### Checklist de Funcionalidades

- [ ] **Header**: Logo, menu, busca funcionando
- [ ] **Menu Mobile**: Hamburger abre/fecha corretamente
- [ ] **Smooth Scroll**: Links âncora rolam suavemente
- [ ] **Hero Section**: Imagem de fundo carregando
- [ ] **Grid de Posts**: Cards exibindo corretamente
- [ ] **Single Post**: Layout completo com comentários
- [ ] **Comentários**: Rating com estrelas funcional
- [ ] **Footer**: Links e widgets exibindo
- [ ] **Responsivo**: Testado em mobile/tablet/desktop
- [ ] **Performance**: LCP < 2.5s, FID < 100ms, CLS < 0.1

### Ferramentas de Teste

1. **Lighthouse** (DevTools do Chrome)
2. **PageSpeed Insights** (online)
3. **GTmetrix** (performance)
4. **W3C Validator** (validação HTML)
5. **Theme Check** (plugin WordPress)

---

## 🔄 Versionamento Git

### Comandos Essenciais (PowerShell)

```powershell
# Inicializar repositório (primeira vez)
git init
git add .
git commit -m "v17.2 FIXED - Adicionado navigation.js"

# Adicionar remote (GitHub/GitLab)
git remote add origin https://github.com/seu-usuario/cogitari.git

# Push inicial
git branch -M main
git push -u origin main

# Commits futuros
git add .
git commit -m "Descrição da mudança"
git push

# Ver status
git status

# Ver histórico
git log --oneline
```

### Branches Recomendadas

- `main`: Versão estável em produção
- `dev`: Desenvolvimento ativo
- `hotfix/*`: Correções urgentes
- `feature/*`: Novas funcionalidades

---

## 📞 Suporte e Contato

- **Email**: suporte@cogitari.com.br
- **Website**: [https://cogitari.com.br](https://cogitari.com.br)
- **GitHub Issues**: [Link do repositório]

---

## 📜 Changelog

### v17.2 FIXED (2025-12-02)
- ✅ **Navigation.js Adicionado**: Menu responsivo completo
- ✅ **Smooth Scroll**: Links âncora com rolagem suave
- ✅ **Focus Trap**: Acessibilidade no menu mobile
- ✅ **Header Scroll**: Comportamento ao rolar a página
- ✅ **.gitignore Atualizado**: Estrutura correta para WordPress
- ✅ **README.md Completo**: Documentação detalhada

### v17.0 FINAL (2025-01-30)
- ✅ **Consolidação Completa**: Merge de todas as versões anteriores
- ✅ **Design UI/UX Refinado**: Glassmorphism Midnight 100% funcional
- ✅ **Sistema de Comentários**: Rating com estrelas implementado
- ✅ **Segurança Reforçada**: Headers, nonces, sanitização completa
- ✅ **Performance Otimizada**: Core Web Vitals otimizado
- ✅ **Internacionalização**: Text-domain 'cogitari' em todas as strings
- ✅ **Código Limpo**: Remoção de código morto e comentários desnecessários

### v16.0 (2025-01-29)
- Sistema de discussão com avatar e rating
- Layout de comentários refinado

### v5.1 HYBRID (2025-01-28)
- Suporte WooCommerce preparado
- Hooks Elementor estruturados
- Templates archive.php e page.php

### v5.0.0 (2025-01-28)
- Conversão completa de HTML para WordPress
- Sistema glassmorphism Midnight implementado
- Compatibilidade Elementor básica

---

## 📄 Licença

© 2025 Cogitari Tecnologia LTDA. Todos os direitos reservados.

Este é um tema proprietário desenvolvido exclusivamente para **Cogitari**. 
Uso não autorizado é proibido.

---

<div align="center">

**Desenvolvido com ❤️ pela equipe Cogitari**

[Site](https://cogitari.com.br) • [Blog](https://cogitari.com.br/blog) • [Contato](https://cogitari.com.br/contato)

**v17.2 FIXED** | Navigation Complete | SEO Optimized | Performance First | Mobile Ready

</div>