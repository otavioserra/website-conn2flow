# SPEC.md — Especificações do Website Oficial (Curso de IA)

## Identidade Visual & Nomenclatura Oficial

- **Título Oficial**: `Trabalhando em Par com IA`
- **Subtítulo Oficial**: `Do Zero ao Avançado: Planejar, Construir e Dominar Projetos Reais com Agentes de IA`
- **Assinatura de Marca**: Conn2Flow (Powered by Conn2Flow / Core Codeflow)
- **Tipografia**: `Nunito` (Google Fonts)
- **Paleta de Cores**: Verde Esmeralda (Cyber Emerald / Dark Tech)
- **Caminho Base do Gestor**: `C:\Users\otavi\OneDrive\Documentos\GIT\website-conn2flow\gestor`

---

## Objetivo do Website

Apresentar a série continuada, disponibilizar os episódios completos, centralizar downloads e materiais práticos dos episódios, demonstrar a stack tecnológica e conduzir conversões para o ecossistema Conn2Flow Pro e a Playlist Oficial no YouTube.

---

## Módulos e Componentes Arquiteturais (Gestor Conn2Flow)

1. **Layout Principal (`gestor/resources/pt-br/layouts/layout-principal/`)**:
   - Cabeçalho global com logo Conn2Flow, badge do curso, navegação por âncoras e botões CTA.
   - Ponto de injeção/slot de conteúdo da página.
   - Rodapé global com navegação, links sociais e infraestrutura básica.

2. **Página Principal / Home (`gestor/resources/pt-br/pages/home/`)**:
   - **Hero Section**: Headline persuasiva, badges luminosos, CTAs principais e vitrine visual.
   - **Grade de Episódios**: Exibição em cards dos episódios (Ep 01 a 04 disponíveis, Ep 05+ em breve).
   - **Metodologia Pedagógica (Os 4 Pilares)**: Prótese Cognitiva, SDD como Memória da IA, Agente Duplo/Triplo e Empresa de 1 Pessoa.
   - **Hub de Materiais & Downloads**: Repositório `conn2flow-ai-workspace`, roteiros e guias.
   - **Stack & Ferramentas**: Grid de tecnologias e agentes.
   - **CTA Comercial**: Conversão para Conn2Flow Pro e Playlist do YouTube.

3. **Componentes Modulares (`gestor/resources/pt-br/components/`)**:
   - Blocos desacoplados para cards de episódios, badges e pilares.
