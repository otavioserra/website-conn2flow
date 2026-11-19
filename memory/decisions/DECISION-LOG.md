# Decision Log

## Histórico

| Código | Status | Tópico | Contexto | Data |
| --- | --- | --- | --- | --- |
| DEC-000 | APPROVED | Bootstrap SDD | Boilerplate inicial instalado para governar novas mudanças do projeto. | [AAAA-MM-DD] |
| DEC-001 | APPROVED | [MDD e Tailwind v4 offline](#dec-001--mdd-e-tailwind-v4-offline) | Migração da governança e restauração da página raiz no Conn2Flow v3.0. | 2026-11-18 |
| DEC-002 | APPROVED | [Provisionamento nativo via `sync_resources`](#dec-002--provisionamento-nativo-via-sync_resources) | Substituição do seeder PHP da REQ-003 por `project_tables_config.json` + JSONs de recursos. | 2026-11-19 |

## DEC-001 — MDD e Tailwind v4 offline

**Contexto.** A migração do Core para v3.0 expôs a divergência entre o ID da Home e a pasta física. O projeto ainda usava SDD e gerava CSS Tailwind no navegador.

**Decisão.** A [REQ-002](../human-requests/req-002.md) adota `memory/` por renomeação Git, cinco documentos canônicos, índices derivados e 46 skills em paridade com a matriz. A rota `/` usa `pagina-raiz-do-sistema`, com tema Tailwind v4 estático e bundle que inclui a página, o layout e suas dependências. O CSS pré-compilado segue pelo pipeline oficial de recursos e deploy.

**Consequências.** Alterações de autoria passam pela compilação antes do deploy. A página, o layout e o CSS do banco podem ser comparados aos artefatos do build. O histórico SDD segue acessível pelo Git. As evidências do primeiro deploy estão no [BATCH-002](../implementation/batch-002.md).

## DEC-002 — Provisionamento nativo via `sync_resources`

**Contexto.** A [REQ-003](../human-requests/req-003.md) previu inicialmente um seeder PHP customizado para popular `menus`, `publisher`, `publisher_highlights`, `publisher_index` e `publisher_pages`. Durante a execução do [BATCH-003](../implementation/batch-003.md), o Engenheiro Chefe Humano determinou o uso do mecanismo nativo do Conn2Flow v3.0 (`project_tables_config.json` com `sync_resources`, no padrão do `conn2flow-site`).

**Decisão.** O provisionamento de registros dinâmicos de projeto (menus, definições do publicador, destaques, índices e publicações) passa a usar exclusivamente `gestor/resources/project_tables_config.json` e arquivos `gestor/resources/pt-br/<tabela>.json`, compilados e sincronizados pelo pipeline oficial (`./c2f project:deploy`). Seeders PHP avulsos não devem ser versionados para essa finalidade.

**Consequências.** Elimina scripts de seed paralelos ao motor do Core. Conforme apontado no [REV-003](../human-reviews/rev-003.md), resta definir a política de preservação de campos editados pelo painel (`preserve_on_user_modified` / `insert_only`) para evitar que deploys futuros revertam trocas de template ou edições editoriais feitas via painel administrativo.
