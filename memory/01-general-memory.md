---
id: "MDD-01"
title: "Mecânica e ciclo de vida da memória"
status: "ACTIVE"
date: "2026-11-18"
author: "executor"
target_repo: "website-conn2flow"
summary_short: "Camadas de memória, metadados, índices derivados e arquivamento dual."
summary_medium: "Camadas de memória, metadados, índices derivados e arquivamento dual. Aplicável à governança do website do curso."
---

# Mecânica e ciclo de vida da memória

| Camada | Conteúdo |
| --- | --- |
| Episódica | Requisições, lotes, sessões, handoffs, evidências e revisões datadas. |
| Semântica | Arquitetura, SPEC, política e decisões aprovadas. |
| Procedural | Runbooks em `process/` e procedimentos reutilizáveis nas skills. |
| Raw | Observações temporárias e artefatos intermediários em `raw/active/`. |

Registre observações com origem, data, estado e relação com a requisição ou lote. Promova fatos confirmados para a memória episódica e regras aprovadas para decisões, SPEC ou skills. Use os resumos dos índices para selecionar o contexto.

A Trava Tripla do MDD combina frontmatter YAML, índices derivados por pasta e regeneração pelo ferramental oficial. Novos documentos de governança usam `id`, `title`, `status`, `date` (AAAA-MM-DD), `author`, `target_repo`, `summary_short` e `summary_medium`. Gere os índices com `mdd index --path RAIZ` ou `php cli/c2f.php memory:index --repo=RAIZ` no Core. O banco local de busca FTS5 é reconstruível com `mdd db sync --workspace RAIZ`. Edite os documentos fonte para mudar o conteúdo dos índices.

Quando houver manutenção autorizada, preserve os bytes do item em `archive/original/`, registre uma síntese rastreável em `archive/compacted/` e regenere os índices. Para a memória de execução, use `raw/archive/`. Consulte os limites da [política](02-policy.md). Registre a homologação humana em `human-reviews/` após a decisão correspondente.
