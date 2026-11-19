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

### Checklist de aceite

- [ ] **Módulo `menus`**: 3 templates de cabeçalho (1 base Cyber Emerald + 2 criativos) e 1 template de rodapé criados em `gestor/resources/pt-br/templates/` (`target: menus`) e integrados ao `layout-principal`.
- [ ] **Módulo `publisher`**: 2 definições de publicador (`episodios` e `materiais`) e 3 templates de detalhe (`target: publisher`, 1 base + 2 criativos) criados e sincronizados.
- [ ] **Widgets Dinâmicos (`publisher-highlights` & `publisher-index`)**: 3 templates para `publisher-highlights` e 3 templates para `publisher-index` (1 base + 2 criativos cada) criados e sincronizados.
- [ ] **Home Dinâmica (`/`)**: Blocos estáticos de Episódios e Materiais substituídos por widgets `publisher-highlights` renderizando dados reais do banco SQL.
- [ ] **Páginas de Listagem**: Páginas `/episodios/` e `/materiais/` criadas com `tailwind_bundle: true` e widget `publisher-index`.
- [ ] **Seeding Idempotente & Conteúdo Real**: Menus, definições, blocos de destaque/índice e posts iniciais (5 episódios + 4 materiais) populados no banco de `ia-parceria` sem duplicidade em re-execuções.
- [ ] **Pipeline v3.0 & Deploy**: Compilador oficial executado sem `css_precompiled: null`; `./c2f project:deploy ia-parceria` executado com sucesso.
- [ ] **Validação Visual Playwright (390 / 820 / 1440)**: `/`, `/episodios/`, `/materiais/`, 1 página individual de Episódio e 1 de Material validados com HTTP 200, fonte `Nunito`, identidade Cyber Emerald, zero erros JS e zero overflow horizontal.
- [ ] **Troca de Templates**: Confirmado que todos os templates alternativos constam na tabela `templates` do banco e são intercambiáveis sem quebra.
- [ ] **Governança MDD & Revisão**: `SPEC.md`, `batch-003.md`, `BATCH-INDEX.md`, `04-memory-engineering-execution.md` e `index.md` atualizados; lote pronto para auditoria do `c2f-reviewer-agent`.
