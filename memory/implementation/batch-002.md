---
id: "BATCH-002"
title: "Home no Conn2Flow v3.0 e migração para MDD"
status: "READY_FOR_REVIEW"
date: "2026-11-18"
author: "executor"
target_repo: "website-conn2flow"
summary_short: "Migra a governança para MDD, restaura a Home e valida o deploy local com Tailwind v4 offline."
summary_medium: "A rota raiz foi sincronizada no Gestor v3.0 e passou nos três tamanhos de tela. A memória e os kits de agentes foram alinhados à matriz."
---

# BATCH-002 — Home no Conn2Flow v3.0 e migração para MDD

Requisição [REQ-002](../human-requests/req-002.md). Origem `website-conn2flow`, branch `main`, raiz `C:\Users\otavi\OneDrive\Documentos\GIT\website-conn2flow`. Destino local `ia-parceria`.

## Live Todo List

### Frente 1 · Governança MDD

- [x] 1.1 Migrar `sdd/` via Git com o histórico preservado.
- [x] 1.2 Criar os documentos canônicos 00–04 e preservar as memórias anteriores.
- [x] 1.3 Provisionar as pastas, o arquivamento dual e o `.gitignore`.
- [x] 1.4 Atualizar as instruções dos agentes e o README, e sincronizar as 46 skills nos cinco kits.
- [x] 1.5 Gerar 54 índices e sincronizar o SQLite local.

### Frente 2 · Home e Tailwind v4

- [x] 2.1 Alinhar arquivos e ID da página raiz.
- [x] 2.2 Criar o input Tailwind v4 com `@theme static`.
- [x] 2.3 Retirar o CDN Tailwind, ajustar metadados e incrementar versões.
- [x] 2.4 Atualizar o conteúdo pedagógico sobre a governança MDD.
- [x] 2.5 Compilar pelo Core, auditar os JSONs e os sidecars e restaurar o índice padrão.

### Frente 3 · Deploy e validação

- [x] 3.1 Executar o deploy oficial e confirmar as sementes no destino ativo.
- [x] 3.2 Validar a rota publicada no Chromium em mobile, tablet e desktop.
- [x] 3.3 Registrar as evidências e atualizar a especificação, a decisão, o índice de lotes e a memória de execução.

## Rodada 1 · 18/11/2026

### Governança e compilação

- O `git mv sdd memory` preservou os 29 arquivos versionados. O sincronizador oficial e sua auditoria retornaram `PASS`, com 230 correspondências exatas em cinco kits. A regra canônica `01-sdd-governance.md` ainda cita `sdd/`. Os arquivos locais indicam `memory/` como caminho vigente e mantêm a regra sincronizada para preservar a paridade da matriz.
- A CLI MDD gerou explicitamente os índices novos por pasta e regenerou os 54 em lote. O banco SQLite local foi atualizado e é ignorado pelo Git.
- O compilador oficial concluiu as oito etapas com Tailwind v4.3.3, seis sidecars, manifesto e zero alertas F1/F3/F4c. No Windows, `NODE_PATH` apontou para `node_modules` do Core para resolver `tailwindcss/utilities.css`. A primeira execução, sem essa variável, parou na resolução do import.
- `PaginasData.json` contém `pagina-raiz-do-sistema`, rota `/`, HTML/CSS autoral/CSS pré-compilado com 53.227/9.441/54.732 caracteres e `file_version: 1.4`. Em `LayoutsData.json`, `layout-principal` tem 19.236/4.767/52.507 caracteres e `file_version: 1.3`. Os quatro componentes têm HTML e CSS pré-compilado. Seus arquivos fonte são HTML e não têm CSS autoral separado. Os seis valores de `css_precompiled` são idênticos aos sidecars.
- O Core atual não serializa `og_titulo`, `og_descricao` e `meta_descricao` de `pages.json` em `PaginasData.json`. Os metadados foram declarados na origem e o layout mantém as tags que o navegador recebe.
- O Core regenera `PagesIndexData.json` durante a compilação, inclusive a que antecede o deploy. O diff no projeto continha apenas a troca de CRLF por LF no HTML da semente padrão e a alteração derivada de versão e checksum. A alteração foi restaurada depois do deploy.

### Deploy e runtime

`devEnvironment.projectTarget` apontava para `ia-parceria`. O DNS local resolvia `ia-parceria.local` para `127.0.0.1` e a rota já servia o curso com a versão anterior. O comando `./c2f project:deploy ia-parceria` retornou HTTP 200 em 18/11/2026 às 16h51 (Brasília), com seis atualizações SQL (quatro componentes, um layout e uma página), zero órfãos, health check aprovado e snapshot `api-20261118-195058-ad74`.

O Chromium 148 abriu a rota local após o deploy. As folhas `layout-precompiled` e `page-precompiled` no HTML correspondem aos respectivos valores de `css_precompiled`, após a remoção do comentário inicial de licença na renderização. O fundo calculado foi `rgb(6, 14, 10)`, o texto esmeralda correspondeu ao token e a face Nunito foi carregada. O menu móvel abriu e fechou ao navegar para Episódios. No desktop, a navegação ficou visível e o botão móvel ficou oculto.

| Tela | Largura do documento/viewport | Colunas de episódios | Erros de console/runtime | Captura |
| --- | --- | --- | --- | --- |
| 390×844 | 390/390 | 1 | 0 | [Mobile](../validation/evidence/batch-002/mobile-390-fold.png) |
| 820×1180 | 820/820 | 2 | 0 | [Tablet](../validation/evidence/batch-002/tablet-820-fold.png) |
| 1440×900 | 1440/1440 | 5 | 0 | [Desktop](../validation/evidence/batch-002/desktop-1440-fold.png) |

[Relatório Playwright](../validation/evidence/batch-002/report.json) · [Menu móvel aberto](../validation/evidence/batch-002/mobile-390-menu-open.png) · [Checklist](../validation/VALIDATION-CHECKLIST.md#batch-002-req-002) · [DEC-001](../decisions/DECISION-LOG.md#dec-001--mdd-e-tailwind-v4-offline)

A execução técnica está pronta para revisão.
