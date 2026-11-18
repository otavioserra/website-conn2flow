---
id: "MDD-00"
title: "Arquitetura e mapa do projeto"
status: "ACTIVE"
date: "2026-11-18"
author: "executor"
target_repo: "website-conn2flow"
summary_short: "Arquitetura do website da série Trabalhando em Par com IA e roteiro de consulta."
summary_medium: "Arquitetura do website da série Trabalhando em Par com IA e roteiro de consulta. Aplicável à governança do website do curso."
---

# Arquitetura e mapa do projeto

O `website-conn2flow` é o site oficial da série **Trabalhando em Par com IA**. A raiz local é `C:\Users\otavi\OneDrive\Documentos\GIT\website-conn2flow`. O repositório irmão `conn2flow` fornece o Gestor v3.0, o compilador oficial e a CLI de deploy.

## Consulte nesta ordem

1. Leia a [mecânica da memória](01-general-memory.md) e a [política](02-policy.md).
2. Abra o [índice geral](index.md), o [ponteiro ativo](human-requests/CURRENT.md) e a requisição apontada.
3. Use a [especificação](SPEC.md), o [índice de lotes](implementation/BATCH-INDEX.md) e o [checklist](validation/VALIDATION-CHECKLIST.md) para confirmar o escopo e o aceite.
4. Consulte as diretrizes da [Chefia](03-memory-engineering-chief.md) e o histórico da [Execução](04-memory-engineering-execution.md).

## Mapa técnico

| Área | Responsabilidade |
| --- | --- |
| `gestor/resources/pt-br/` | Fontes HTML/CSS e metadados de páginas, layouts e componentes. |
| `gestor/contents/tailwindcss/input.css` | Input central do Tailwind v4 e tokens Cyber Emerald. |
| `gestor/db/data/` | Dados gerados pelo compilador do Core para sincronização com o banco. |
| `memory/` | Governança MDD do projeto, índices derivados e evidências. |
| `.codex/skills/`, `.claude/skills/`, `.cursor/skills/`, `.gemini/skills/`, `.github/skills/` | Catálogo canônico sincronizado pela matriz MDD. |

A rota `/` usa a página `pagina-raiz-do-sistema` e o `layout-principal`. A página agrupa as fontes relacionadas em um bundle Tailwind para manter a cascata responsiva. O Gestor serve os recursos sincronizados no SQL. A identidade Cyber Emerald e a fonte Nunito acompanham a versão original do site.
