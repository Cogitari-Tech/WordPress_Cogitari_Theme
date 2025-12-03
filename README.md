# 📘 COGITARI - Portal de Notícias (Tema WordPress)

> **Design de Interface High-End focado em Glassmorphism, Automação e Inteligência Artificial.**

Este repositório contém o **Frontend** do tema customizado para o portal Cogitari. O projeto foi desenvolvido com foco total na experiência do usuário (UX/UI), utilizando transparências, gradientes modernos e uma tipografia limpa para facilitar a leitura de conteúdo técnico.

---

## 🎨 Identidade Visual & Design

O tema segue uma estética futurista "Dark Mode" com as seguintes características:

-   **Glassmorphism:** Uso intensivo de desfoque (`backdrop-filter`) em cards e menus para criar profundidade.
-   **Ambient Lighting:** Luzes ambientais (Orbs) em azul e roxo que reagem ao fundo escuro.
-   **Interatividade:** Efeitos de *Glow* e elevação suave ao passar o mouse (`hover states`).
-   **Tipografia:** Fonte *Inter* para máxima legibilidade em telas digitais.

### 🌈 Paleta de Cores
-   🌑 **Midnight Void (Fundo):** `#020511`
-   🌌 **Deep Navy (Nav/Footer):** `#050A25`
-   ⚡ **Electric Blue:** `#2F80ED`
-   🔮 **Vivid Purple:** `#7B42F6`

---

## 📂 Estrutura de Arquivos

A organização do tema segue o padrão estrito do WordPress:

```text
tema-cogitari/
│
├── style.css          # Folha de estilos principal (Variáveis, Grid e Glassmorphism)
├── index.php          # Estrutura da Home (Hero, Trending Topics, Grid de Notícias)
├── header.php         # Cabeçalho global (Logo, Menu, Scripts)
├── footer.php         # Rodapé global (Links, Copyright, Scripts finais)
├── functions.php      # Arquivo reservado para lógica do Backend
│
└── assets/
    └── images/        # Logos e ícones otimizados (PNG/JPG)