# Validation Checklist

## BATCH-001 (REQ-001)

### Checklist de aceite

- [x] Estrutura de diretórios criada sob `gestor/resources/pt-br/` (`layouts/`, `pages/`, `components/` + JSONs de metadados e `resources.map.php`).
- [x] **Layout Principal** implementado com `<head>`, Google Fonts (`Nunito`), cabeçalho/menu, slot de conteúdo (`@[[pagina#corpo]]@`) e rodapé — `layouts/layout-principal/`.
- [x] **Página Home** implementada e acoplada ao Layout Principal — `pages.json` → `"layout": "layout-principal"`, `path: /`.
- [x] Tipografia `Nunito` do Google Fonts configurada como padrão global — `layout-principal.css` (`html, body { font-family: 'Nunito' }`) + `@theme --font-sans`. Evidência: `report.json` → `fontFamily`/`h1Font` = Nunito nos 3 viewports.
- [x] Identidade visual em **Verde Esmeralda** aplicada com contraste, legibilidade e efeitos luminosos modernos — fundos `#060e0a`/`#0a1510`, `emerald-400/500/600`, glows `blur-3xl`, bordas `emerald-500/20`. Evidência: `desktop-1440-fold.png`.
- [x] Hero Section com badges, headline, subheadline e CTAs duplos — seção `hero` (+ mockup terminal/player e métricas).
- [x] Grade de Episódios completa (Episódios 01 a 04 disponíveis, Episódio 05+ em breve) — seção `episodios`, 5 cards (`report.json` → `episodes: 5`).
- [x] Seção de Metodologia & Metáforas (Prótese Cognitiva, SDD Memória da IA, Agente Duplo/Triplo, Empresa de 1 Pessoa) — seção `metodologia`, 4 pilares + citação.
- [x] Hub de Materiais & Downloads com links para o repositório e recursos — seção `materiais`, card do repo + 4 materiais.
- [x] Seção de Stack Tecnológica & Ferramentas Agênticas — seção `stack`, 8 cards.
- [x] Call to Action de conversão para Conn2Flow Pro e Playlist do YouTube — seção `cta` (`conn2flow.com/pro/#planos`, playlist `PLBjofG88X62Y`).
- [x] Rodapé completo com links institucionais e direitos autorais — marca, Curso/Recursos/Conn2Flow, redes sociais, status, © 2026.
- [x] Elementos criativos adicionais implementados pelo executor para enriquecer a experiência — FAQ, barra de progresso, marquee, terminal 3D, reveal progressivo, linha do tempo (lista completa em `batch-001.md`).
- [x] Responsividade testada em mobile, tablet e desktop — Playwright 390/820/1440: sem overflow horizontal, menu mobile funcional, 0 erros de console. Evidências em `evidence/batch-001/`.

### Pendências fora do aceite (ver `implementation/batch-001.md`)

- [ ] Execução do pipeline oficial (`c2f resources:sync` + `css:rebuild`) quando o projeto for registrado no ambiente Docker.
- [ ] Revisão técnica (`/review-current-batch`).

## BATCH-002 (REQ-002)

### Rodada 1 · 18/11/2026

- [x] Governança movida pelo Git. Cinco documentos raiz, pastas canônicas, arquivo dual, 54 índices e SQLite local reconstruído.
- [x] Skills sincronizadas e auditadas em cinco kits. 230 correspondências, zero divergências.
- [x] A rota `/` usa `pagina-raiz-do-sistema` e `layout-principal`. Input Tailwind com `@theme static` e `tailwind_bundle: true`.
- [x] Compilador oficial passou. HTML, CSS autoral e CSS pré-compilado preenchidos na página e no layout. CSS pré-compilado presente nos quatro componentes e nos seis sidecars.
- [x] Deploy oficial para `ia-parceria` concluído, com HTTP 200, health check aprovado, seis atualizações no SQL e zero órfãos.
- [x] Chromium em 390×844, 820×1180 e 1440×900. CSS do build no HTML, fundo Cyber Emerald, Nunito carregada, menus responsivos, zero erros e zero overflow horizontal.
- [x] Especificação, DEC-001, índice do lote e memória de execução atualizados.

[Relatório do lote](../implementation/batch-002.md) · [Relatório Playwright](evidence/batch-002/report.json) · [Mobile](evidence/batch-002/mobile-390-fold.png) · [Tablet](evidence/batch-002/tablet-820-fold.png) · [Desktop](evidence/batch-002/desktop-1440-fold.png)

## BATCH-003 (REQ-003)

### Rodada 1 · 19/11/2026

- [x] **Módulo `menus`**: cabeçalhos `c2f-menu-cabecalho-navbar` (base), `-dock` e `-command` e rodapé `c2f-menu-rodape-colunas` (`target: menus`), integrados ao `layout-principal` por widgets com mockup defensivo.
- [x] **Módulo `publisher`**: definições `episodios` e `materiais` (15 campos compartilhados) e templates `c2f-publicacao-editorial` (base), `-cinema` e `-docs`.
- [x] **Widgets dinâmicos**: `c2f-destaques-cards/bento/timeline` (`publisher-highlights`) e `c2f-indice-cards/bento/timeline` (`publisher-index`).
- [x] **Home dinâmica (`/`)**: episódios e materiais renderizados por `publisher-highlights` a partir do banco, com CTAs para `/episodios/` e `/materiais/`.
- [x] **Páginas de listagem**: `/episodios/` e `/materiais/` com `tailwind_bundle: true`, `publisher-index`, busca AJAX e métricas.
- [x] **Provisionamento e conteúdo real**: menus, definições, destaques, índices, 5 episódios e 4 materiais sincronizados pelo Sistema de Recursos (`project_tables_config.json` + `sync_resources`). O deploy atualizou os registros existentes sem duplicar (`~26`, `+0`).
- [x] **Pipeline v3.0 e deploy**: compilador oficial sem `css_precompiled` nulo; quatro `./c2f project:deploy ia-parceria` com HTTP 200, health check aprovado e zero órfãos.
- [x] **Playwright (390/820/1440)**: `/`, `/episodios/`, `/materiais/`, 1 episódio e 1 material com HTTP 200, Nunito, fundo Cyber Emerald, zero erros, zero overflow e menu responsivo (15/15).
- [x] **Troca de templates**: os 13 templates estão na tabela `templates`; as rodadas A e B com os modelos alternativos passaram 15/15 cada.
- [x] **Governança MDD**: SPEC, lote, índice de lotes, checklist, memória de execução e índices atualizados; lote pronto para o `c2f-reviewer-agent`.

Pendente: confirmação humana para retirar do servidor os dois arquivos do seeder descartado (choques `retirado`, DEC-136).

[Relatório do lote](../implementation/batch-003.md) · [Playwright](evidence/batch-003/report-padrao.json) · [Banco](evidence/batch-003/banco-recursos-sincronizados.json) · [Home](evidence/batch-003/padrao-home-desktop.png)

### Revisão técnica · 19/11/2026

- [ ] **Parecer REV-003 — RECOMMEND-REVISION**. Validar o provisionamento nativo em duas execuções, formalizar a mudança na REQ-003, preservar edições e comprovar a troca de templates pelo painel. Consulte o [parecer técnico](../human-reviews/rev-003.md).
