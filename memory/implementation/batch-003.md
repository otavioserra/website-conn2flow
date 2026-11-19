---
id: "BATCH-003"
title: "Portal dinâmico dos seriados: menus, publicador, destaques, índices e templates intercambiáveis"
status: "READY_FOR_REVIEW"
date: "2026-11-19"
author: "executor"
target_repo: "website-conn2flow"
summary_short: "Transforma a landing page em portal dinâmico com menus, publicador, destaques e índices, 13 templates trocáveis e 9 publicações reais sincronizadas pelo pipeline de recursos."
summary_medium: "Cabeçalho e rodapé passam ao módulo menus, a Home usa publisher-highlights e /episodios/ e /materiais/ usam publisher-index. Os registros e as 9 publicações chegam ao banco por sync_resources, sem seeder. Playwright aprovou 5 rotas em 3 tamanhos, além de duas rodadas de troca de templates."
---

# BATCH-003 — Portal dinâmico dos seriados

Requisição [REQ-003](../human-requests/req-003.md). Origem `website-conn2flow`, branch `main`. Destino `ia-parceria` (`https://ia-parceria.local/`, WSL `Conn2Flow-Lab`). Categoria C (interface e CSS): compilação completa e `./c2f project:deploy ia-parceria`.

## Live Todo List

- [x] 0. Leitura de CURRENT, REQ-003, checklist, das seis skills e dos contratos de `menus`, `publisher`, `publisher-pages`, `publisher-highlights` e `publisher-index` no Core.
- [x] 1. Módulo `menus`: três cabeçalhos e um rodapé, integrados ao `layout-principal` por widgets com mockup defensivo.
- [x] 2. Módulo `publisher`: definições `episodios` e `materiais` e três templates de detalhe.
- [x] 3. `publisher-highlights` e `publisher-index`: três templates para cada; Home dinâmica; páginas `/episodios/` e `/materiais/` com `tailwind_bundle: true`.
- [x] 4. Provisionamento dos registros e das 9 publicações pelo Sistema de Recursos (`project_tables_config.json` + `sync_resources`).
- [x] 5. Compilação oficial, deploy, Playwright em 390/820/1440 e troca de templates no runtime.
- [x] 6. SPEC, lote, índice de lotes, checklist, memória de execução e índices MDD.

## Entregas

### Templates (`gestor/resources/pt-br/templates/` + `templates.json`)

| Target | Base | Criativo A | Criativo B |
| --- | --- | --- | --- |
| `menus` (cabeçalho) | `c2f-menu-cabecalho-navbar` | `c2f-menu-cabecalho-dock` (Floating Glass Dock) | `c2f-menu-cabecalho-command` (Command Bar) |
| `menus` (rodapé) | `c2f-menu-rodape-colunas` | — | — |
| `publisher` | `c2f-publicacao-editorial` | `c2f-publicacao-cinema` (Spotlight) | `c2f-publicacao-docs` (Technical Guide) |
| `publisher-highlights` | `c2f-destaques-cards` | `c2f-destaques-bento` | `c2f-destaques-timeline` |
| `publisher-index` | `c2f-indice-cards` | `c2f-indice-bento` | `c2f-indice-timeline` |

### Decisões de contrato

- **Uma lista por cabeçalho.** O widget `menus` repete um único bloco `item`, então cada cabeçalho usa uma lista que vira drawer no mobile. O script do layout trata o contrato `data-c2f-menu`, `data-c2f-menu-toggle` e `data-c2f-menu-panel`, comum aos três modelos, e marca o item ativo com `aria-current`.
- **Responsivas do layout em CSS de autoria.** A troca mobile/desktop do menu e a grade do rodapé usam classes próprias (`c2f-menu-panel`, `c2f-menu-toggle`, `c2f-footer-grid`), e não pares `hidden lg:flex`. Uma folha carregada depois do layout não consegue inverter essas responsivas.
- **Campos compartilhados.** `episodios` e `materiais` usam os mesmos 15 IDs de campo (`titulo`, `selo`, `status`, `status_chave`, `colecao`, `colecao_url`, `categoria`, `relacionado`, `resumo`, `link_principal`, `link_principal_rotulo`, `link_secundario`, `link_secundario_rotulo`, `topicos`, `conteudo`), com rótulos próprios de cada publicador (ex.: `selo` = "Número do episódio" ou "Tipo de material"). Por isso os templates de detalhe, destaque e índice servem aos dois publicadores sem quebra.
- **`publisher-highlights` sem `@`.** O widget lê `[[item#x]]` sem o cerco de arrobas. O HTML do registro de destaques é gravado nesse formato; menus e índices aceitam os dois.
- **Curadoria manual.** As publicações chegam por `pages.json` e recebem a data do deploy, então ordenar por data não preserva a ordem da série. Destaques e índices usam `rule: manual` com `selected_items` na ordem da série, e o seletor de ordenação do índice fica oculto. A busca continua ativa.
- **CSS compartilhado no layout.** `c2f-eyebrow`, `c2f-h2`, `c2f-gradient-text`, `c2f-status-*`, `c2f-tag` e `c2f-material*` saíram do CSS da Home para o `layout-principal.css`. O layout também ganhou `c2f-prose`, `c2f-topicos`, `c2f-field`, o dock, a command bar e o estado "Em breve" (`data-c2f-status="soon"`).

### Provisionamento pelo Sistema de Recursos

`gestor/resources/project_tables_config.json` declara `publisher`, `publisher_pages`, `publisher_highlights`, `publisher_index` e `menus` com `sync_resources: true`, chave natural `language` + `id`/`page_id` e `field_types` `json`/`file:html`, no mesmo padrão do `conn2flow-site`. Os metadados ficam em `resources/pt-br/{publisher,publisher-pages,publisher-highlights,publisher-index,menus}.json` e os HTMLs em `resources/pt-br/<tabela>/<id>/<id>.html`. As 9 publicações estão em `pages.json` com `publisher_id`, `tailwind_bundle: true` e dependência dos templates de menu. O HTML delas é o template base preenchido com o conteúdo da memória do CursoIA.

## Rodada 1 · 19/11/2026

### Compilação

`atualizacao-dados-recursos.php --project-path=…\website-conn2flow\gestor`, com `NODE_PATH` apontando para o `node_modules` do Core: 30 recursos (1 layout, 12 páginas, 4 componentes, 13 templates), zero problemas e cinco `*Data.json` dinâmicos gerados (`Menus`, `Publisher`, `PublisherHighlights`, `PublisherIndex`, `PublisherPages`). Nenhum HTML ou `css_precompiled` saiu nulo. As páginas bundle (68.866 caracteres) e o layout cobrem as classes dos 13 templates. O compilador ajustou as versões: layout 1.5, Home 1.6 e recursos novos 1.1.

### Deploy

| Execução | Resultado |
| --- | --- |
| 1ª (templates, layout, Home, listagens) | HTTP 200 · `templates +13`, `paginas +2 ~1`, `layouts ~1` · snapshot `api-20261119-184645-c625` |
| 2ª (seletor de item ativo) | HTTP 200 · `layouts ~1`, `paginas ~3` · snapshot `api-20261119-184935-e87c` |
| 3ª (correção do seeder, depois descartado) | HTTP 200 · snapshot `api-20261119-185156-af28` |
| 4ª (recursos nativos) | HTTP 200 · `menus ~2`, `paginas ~9 =3`, `publisher ~2`, `publisher_highlights ~2`, `publisher_index ~2`, `publisher_pages ~9` · 0 órfãos · health ok · snapshot `api-20261119-185508-6253` |

Todas as execuções terminaram com health check aprovado e zero órfãos. A conferência no banco (`evidence/batch-003/banco-recursos-sincronizados.json`) mostra 2 menus, 2 publicadores, 2 destaques, 2 índices, 9 `publisher_pages` e 9 publicações, todas `project=ia-parceria` e sem duplicidade. Os 13 templates estão ativos.

### Correção de rota durante o lote

A primeira versão provisionou os registros com um seeder PHP próprio (`gestor/db/seeds/`). O Engenheiro Humano apontou que o pipeline de recursos já faz isso por `sync_resources`. O seeder e seu arquivo de dados foram removidos do repositório e o conteúdo migrou para os recursos nativos. O 4º deploy atualizou as linhas que o seeder havia criado (`~26`, nenhuma inserção nova).

O seeder foi usado também para a troca de templates (rodadas A e B abaixo). Ele gravava no registro o HTML do template escolhido, o mesmo efeito de trocar o template no painel.

**Pendência DEC-136:** o 4º deploy registrou dois choques `retirado`: `db/seeds/portal-seriados-seed.php` e `db/seeds/portal-seriados-data.json`, ainda presentes no servidor `ia-parceria`. Eles só são removidos com confirmação humana (`--confirmar-retirada`).

### Validação Playwright (Chromium 148)

| Rodada | Configuração | Resultado |
| --- | --- | --- |
| Padrão (final, recursos nativos) | navbar · cards (episódios) · timeline (materiais) · índice cards/timeline · editorial/docs | 15/15 PASS |
| Troca A | dock · bento · cards · índice bento/cards · cinema/editorial | 15/15 PASS |
| Troca B | command · timeline · bento · índice timeline/bento · docs/cinema | 15/15 PASS |

Em cada rota (`/`, `/episodios/`, `/materiais/`, `/episodios/ep-01-conceitos-e-historia-da-ia/`, `/materiais/guias-setup-agentes/`) e tamanho (390×844, 820×1180, 1440×900) foram conferidos: HTTP 200, Nunito carregada, fundo `rgb(6, 14, 10)`, zero erros de console e de rede, largura do documento igual à viewport, nenhum marcador `[[…]]` nem wrapper `widgets#` no HTML final, painel do menu `flex` no desktop e drawer abrindo no mobile, rodapé com 4 colunas e 13 links. A Home renderiza 5 episódios e 4 materiais, `/episodios/` lista 5 e `/materiais/` lista 4. A busca AJAX por "Blender" retornou 1 episódio ("Exibindo 1 de 1 publicações").

[Relatório final](../validation/evidence/batch-003/report-padrao.json) · [Troca A](../validation/evidence/batch-003/report-troca-a.json) · [Troca B](../validation/evidence/batch-003/report-troca-b.json) · [Banco](../validation/evidence/batch-003/banco-recursos-sincronizados.json) · [Home desktop](../validation/evidence/batch-003/padrao-home-desktop.png) · [Menu mobile](../validation/evidence/batch-003/padrao-home-mobile-menu-aberto.png) · [Busca](../validation/evidence/batch-003/padrao-episodios-desktop-busca.png) · [Episódio](../validation/evidence/batch-003/padrao-episodios__ep-01-conceitos-e-historia-da-ia-desktop.png) · [Dock + Cinema](../validation/evidence/batch-003/troca-a-episodios__ep-01-conceitos-e-historia-da-ia-desktop.png) · [Command + índice Bento](../validation/evidence/batch-003/troca-b-materiais-tablet.png)

### Pendências

- Confirmação humana para retirar os dois arquivos do seeder no servidor (DEC-136).
- `og_titulo`, `og_descricao` e `meta_descricao` das páginas novas continuam declarados em `pages.json`, mas o Core não os serializa em `PaginasData.json` (limitação já registrada no BATCH-002).
- As capturas da troca A/B mostram o estado temporário; o banco foi restaurado ao padrão e conferido.
- Revisão técnica pelo `c2f-reviewer-agent`.
