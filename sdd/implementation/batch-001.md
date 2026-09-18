# BATCH-001 — Construção Inicial do Website do Curso de IA (REQ-001)

- **Requisição**: `sdd/human-requests/req-001.md`
- **Status**: `in-progress` → aguardando Revisor Técnico
- **Modo**: `autonomo_monitorado`
- **Executor**: c2f-executor-agent (Claude Fable 5.1)
- **Data**: 2026-09-18

## Escopo executado

Estrutura de recursos do Gestor criada em `gestor/resources/pt-br/` conforme SPEC.md, com Layout Principal, Página Home e componentes modulares, design system Verde Esmeralda (Cyber Emerald) e tipografia Nunito global.

## Arquivos criados / alterados

| Caminho | Tipo | Descrição |
| --- | --- | --- |
| `gestor/resources/resources.map.php` | mapa | Mapeamento de idioma/arquivos de metadados (`layouts.json`, `paginas.json`, `componentes.json`). |
| `gestor/resources/pt-br/layouts.json` | metadados | Layout `layout-principal` com `framework_css: tailwindcss`, `tailwind_dependencies` e checksums md5. |
| `gestor/resources/pt-br/paginas.json` | metadados | Página `home` (`path: /`, `without_permission: true`) vinculada ao `layout-principal`. |
| `gestor/resources/pt-br/componentes.json` | metadados | 4 componentes com checksums. |
| `gestor/resources/pt-br/layouts/layout-principal/layout-principal.html` | layout | `<head>` com Nunito + Tailwind v4, navbar fixa (logo + tag "Curso de IA", âncoras, CTAs GitHub/YouTube, hamburguer mobile), slot `@[[pagina#corpo]]@`, footer completo (marca, 3 colunas de links, redes sociais, status da série, copyright), barra de progresso, botão voltar ao topo, JS de menu/scroll/reveal. |
| `gestor/resources/pt-br/layouts/layout-principal/layout-principal.css` | layout | Tokens de cor, `font-family: 'Nunito'`, grade tecnológica, header vidro ao rolar, navlinks com sublinhado luminoso, botão com varredura de brilho, footer, reveal, `prefers-reduced-motion`. |
| `gestor/resources/pt-br/paginas/home/home.html` | página | 7 seções com `data-id`/`data-title`: hero, episodios, metodologia, materiais, stack, faq, cta. |
| `gestor/resources/pt-br/paginas/home/home.css` | página | Utilitários de autoria: eyebrow, h2, gradiente animado, status, terminal, marquee, materiais, stack, FAQ. |
| `gestor/resources/pt-br/componentes/card-episodio/card-episodio.html` | componente | Card de episódio com marcadores `#numero#`, `#titulo#`, etc. |
| `gestor/resources/pt-br/componentes/badge-luminoso/badge-luminoso.html` | componente | Pill translúcido com ponto pulsante. |
| `gestor/resources/pt-br/componentes/pilar-metodologico/pilar-metodologico.html` | componente | Card de pilar com ícone, metáfora e barra progressiva. |
| `gestor/resources/pt-br/componentes/botao-cta/botao-cta.html` | componente | Par de botões primário (glow) + secundário. |
| `sdd/validation/evidence/batch-001/*` | evidência | Capturas Playwright + `report.json`. |

## Conteúdo implementado (mapa REQ → seção)

| Item da REQ | Seção `data-title` | Evidência |
| --- | --- | --- |
| Hero (headline, subheadline, badges, CTAs duplos, mockup terminal/player) | `hero` | `desktop-1440-fold.png`, `mobile-390-fold.png` |
| Grade de Episódios 01–04 (Disponível) + 05+ (Em breve) | `episodios` | `report.json` → `episodes: 5` |
| 4 Pilares (Prótese Cognitiva, SDD Memória, Agente Duplo/Triplo, Empresa de 1 Pessoa) + citação | `metodologia` | `report.json` → `pillars: 4` |
| Hub de Materiais (repo `conn2flow-ai-workspace`, guias, roteiros, diagramas, templates) | `materiais` | links github: 11 ocorrências |
| Stack (Antigravity 2.0, Claude Code, Codex, Cursor, Blender MCP, Tailwind, Conn2Flow Pro, SDD) | `stack` | `report.json` → `stack: 8` |
| FAQ (elemento criativo adicional) | `faq` | `report.json` → `faq: 5` |
| CTA Comercial (Playlist + Conn2Flow Pro `#planos`) | `cta` | links pro: 2, youtube: 12 |

## Elementos criativos adicionados pelo executor

- Grade tecnológica de fundo com máscara radial + 3 glows esmeralda flutuantes.
- Barra de progresso de leitura luminosa e botão "voltar ao topo".
- Header transforma-se em vidro fosco ao rolar.
- Mockup de terminal do agente com scanlines, cursor piscante, checklist SDD e mini player com equalizador animado; inclinação 3D que nivela no hover.
- Marquee infinito de ferramentas (pausa no hover).
- Linha do tempo dos episódios (desktop) com trecho tracejado para "em breve".
- Métricas do hero (Episódios 04+, Pilares 4, Custo R$ 0).
- Barra de progresso nos pilares que se expande no hover; citação da filosofia.
- FAQ em `<details>` com ícone +/× animado.
- Revelação progressiva por IntersectionObserver e suporte a `prefers-reduced-motion`.

## Validação executada

Script: `build-and-validate.js` (scratchpad) → gera JSONs, compõe preview (layout + página com marcadores substituídos) e roda Playwright Chromium.

| Viewport | Overflow horizontal | Menu | Fonte body/h1 | Console/Page errors |
| --- | --- | --- | --- | --- |
| 390×844 (mobile) | não (scrollWidth 390) | hamburguer visível, abre/fecha OK | Nunito | 0 / 0 |
| 820×1180 (tablet) | não (820) | hamburguer visível | Nunito | 0 / 0 |
| 1440×900 (desktop) | não (1440) | menu horizontal visível | Nunito | 0 / 0 |

Bug encontrado e corrigido durante a validação: overflow de 63px em 390px causado por grid implícito (`auto`) com texto monoespaçado longo no card do repositório. Correção: `grid-cols-1` explícito (`minmax(0,1fr)`) + `min-w-0` no item.

## Pendências / Findings para o Arquiteto

1. **Nomenclatura de pastas × compilador do Core** — A SPEC e a REQ definem `paginas/` e `componentes/`; o compilador `atualizacao-dados-recursos.php` do Core varre `pages/` e `components/` (nomes fixos, linha 258). Este batch seguiu a SPEC. Antes do primeiro `c2f resources:sync` é preciso decidir: (a) renomear pastas/JSONs para o padrão do Core, ou (b) estender o compilador para ler `directories` do `resources.map.php`. Recomendação: opção (a), por ser trivial e alinhada às skills `c2f-resources-system`.
2. **Componentes não são injetados automaticamente em páginas públicas** — o Core inclui componentes via `$_GESTOR['componentes']` (PHP). Os 4 componentes foram criados como fonte modular com marcadores `#var#`; a Home contém as instâncias renderizadas. Se o site evoluir para conteúdo dinâmico (episódios do banco), usar `modelo_var_troca` sobre os componentes.
3. **Pipeline oficial não executado** — este repositório não possui `c2f` nem ambiente Docker; a validação foi por preview composto + Playwright. `c2f resources:sync` / `css:rebuild` devem rodar quando o projeto for registrado em `dev-environment/data/projects/`.
4. **Links institucionais** — LinkedIn, X e `/contact/` do rodapé seguem o padrão do site público; confirmar URLs finais.
5. Favicons referenciados em `@[[pagina#url-raiz]]@favicon/*` ainda não existem no repositório.
