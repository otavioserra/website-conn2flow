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

2. **Página Principal / Home (`gestor/resources/pt-br/pages/pagina-raiz-do-sistema/`)**:
   - **Hero Section**: Headline persuasiva, badges luminosos, CTAs principais e vitrine visual.
   - **Grade de Episódios**: Exibição em cards dos episódios (Ep 01 a 04 disponíveis, Ep 05+ em breve).
   - **Metodologia Pedagógica (Os 4 Pilares)**: Prótese Cognitiva, evolução da memória da IA do SDD ao MDD, Agente Duplo/Triplo e Empresa de 1 Pessoa.
   - **Hub de Materiais & Downloads**: Repositório `conn2flow-ai-workspace`, roteiros e guias.
   - **Stack & Ferramentas**: Grid de tecnologias e agentes.
   - **CTA Comercial**: Conversão para Conn2Flow Pro e Playlist do YouTube.

3. **Componentes Modulares (`gestor/resources/pt-br/components/`)**:
   - Blocos desacoplados para cards de episódios, badges e pilares.

## Pipeline de recursos e Tailwind v4

A rota pública `/` usa a chave de recurso `pt-br||pagina-raiz-do-sistema`. O HTML e o CSS autorais residem em `gestor/resources/pt-br/pages/pagina-raiz-do-sistema/`, com o mesmo nome-base do ID.

`gestor/contents/tailwindcss/input.css` importa Tailwind e mantém os tokens Cyber Emerald e a tipografia Nunito com `@theme static`. A página declara `tailwind_bundle: true` em `pages.json` para incluir o layout e seus componentes no mesmo bundle responsivo. Dependências explícitas levam `tailwind_dependencies_reason`. O layout recebe os estilos do Gestor pelo marcador `<!-- pagina#css -->`.

O compilador de recursos do Core, `atualizacao-dados-recursos.php --project-path=RAIZ_DO_PROJETO/gestor`, gera os sidecars, o manifesto e os JSONs em `gestor/db/data/`. O deploy local oficial usa `./c2f project:deploy <id>` a partir do Core. O Gestor serve a página e os estilos sincronizados no banco SQL.

## Governança MDD

A [baseline](00-baseline-architecture.md) e o [índice](index.md) orientam a consulta inicial. Requisições aprovadas são vinculadas a lotes pelo [ponteiro ativo](human-requests/CURRENT.md). A [política](02-policy.md) rege a retenção, a evidência e a preservação de recursos. A adoção consta na [DEC-001](decisions/DECISION-LOG.md#dec-001--mdd-e-tailwind-v4-offline).
