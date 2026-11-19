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
   - Cabeçalho e rodapé renderizados pelo módulo `menus` (`menu-cabecalho-principal` e `menu-rodape-principal`), com mockup defensivo no layout. Os templates de cabeçalho são intercambiáveis no painel.
   - Ponto de injeção/slot de conteúdo da página.
   - O script do layout controla o drawer mobile pelo contrato `data-c2f-menu*` e marca o item ativo com `aria-current`.

2. **Página Principal / Home (`gestor/resources/pt-br/pages/pagina-raiz-do-sistema/`)**:
   - **Hero Section**: Headline persuasiva, badges luminosos, CTAs principais e vitrine visual.
   - **Grade de Episódios**: widget `publisher-highlights` (`destaques-episodios-home`) com os episódios do publicador `episodios`.
   - **Metodologia Pedagógica (Os 4 Pilares)**: Prótese Cognitiva, evolução da memória da IA do SDD ao MDD, Agente Duplo/Triplo e Empresa de 1 Pessoa.
   - **Hub de Materiais & Downloads**: repositório `conn2flow-ai-workspace` e widget `publisher-highlights` (`destaques-materiais-home`).
   - **Stack & Ferramentas**: Grid de tecnologias e agentes.
   - **CTA Comercial**: Conversão para Conn2Flow Pro e Playlist do YouTube.

3. **Componentes Modulares (`gestor/resources/pt-br/components/`)**:
   - Blocos desacoplados para cards de episódios, badges e pilares.

4. **Portal dos Seriados (REQ-003)**:
   - Publicadores `episodios` (`/episodios/<id>/`) e `materiais` (`/materiais/<id>/`) com os mesmos 15 campos, o que torna os templates de detalhe, destaque e índice intercambiáveis entre eles.
   - Listagens `/episodios/` e `/materiais/` com o widget `publisher-index` (busca AJAX e métricas).
   - 13 templates em `resources/pt-br/templates/`: 3 cabeçalhos e 1 rodapé (`menus`), 3 de detalhe (`publisher`), 3 de destaques (`publisher-highlights`) e 3 de índice (`publisher-index`).
   - Registros e publicações versionados como recursos: `project_tables_config.json` declara `publisher`, `publisher_pages`, `publisher_highlights`, `publisher_index` e `menus` com `sync_resources`; as publicações estão em `pages.json` com `publisher_id`. Destaques e índices usam curadoria manual na ordem da série.
   - Utilities responsivas que estruturam o layout (painel do menu, grade do rodapé) usam CSS de autoria, para que nenhuma folha posterior inverta a cascata.

## Pipeline de recursos e Tailwind v4

A rota pública `/` usa a chave de recurso `pt-br||pagina-raiz-do-sistema`. O HTML e o CSS autorais residem em `gestor/resources/pt-br/pages/pagina-raiz-do-sistema/`, com o mesmo nome-base do ID.

`gestor/contents/tailwindcss/input.css` importa Tailwind e mantém os tokens Cyber Emerald e a tipografia Nunito com `@theme static`. A página declara `tailwind_bundle: true` em `pages.json` para incluir o layout e seus componentes no mesmo bundle responsivo. Dependências explícitas levam `tailwind_dependencies_reason`. O layout recebe os estilos do Gestor pelo marcador `<!-- pagina#css -->`.

O compilador de recursos do Core, `atualizacao-dados-recursos.php --project-path=RAIZ_DO_PROJETO/gestor`, gera os sidecars, o manifesto e os JSONs em `gestor/db/data/`. O deploy local oficial usa `./c2f project:deploy <id>` a partir do Core. O Gestor serve a página e os estilos sincronizados no banco SQL.

## Governança MDD

A [baseline](00-baseline-architecture.md) e o [índice](index.md) orientam a consulta inicial. Requisições aprovadas são vinculadas a lotes pelo [ponteiro ativo](human-requests/CURRENT.md). A [política](02-policy.md) rege a retenção, a evidência e a preservação de recursos. A adoção consta na [DEC-001](decisions/DECISION-LOG.md#dec-001--mdd-e-tailwind-v4-offline).
