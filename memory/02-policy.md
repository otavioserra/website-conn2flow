---
id: "MDD-02"
title: "Política de governança MDD"
status: "ACTIVE"
date: "2026-11-18"
author: "executor"
target_repo: "website-conn2flow"
summary_short: "Pastas canônicas, limites de memória, SLAs dos agentes e regras de preservação."
summary_medium: "Pastas canônicas, limites de memória, SLAs dos agentes e regras de preservação. Aplicável à governança do website do curso."
---

# Política de governança MDD

| Pasta | Finalidade |
| --- | --- |
| `backlog/`, `change-requests/`, `decisions/` | Propostas, mudanças de contrato e decisões normativas. |
| `human-requests/`, `human-reviews/` | Requisições humanas, ponteiro ativo e homologação. |
| `implementation/`, `validation/` | Lotes, Live Todo List, testes e evidências. |
| `handoffs/`, `reports/`, `sessions/` | Transferências, auditorias e registros de sessão. |
| `process/`, `proxies/` | Runbooks e referências externas com procedência. |
| `raw/` | Observações intermediárias, com `active/` e arquivo dual. |

Cada pasta canônica e cada nó de arquivo tem um `index.md` derivado. As áreas episódicas e normativas mantêm originais integrais e sínteses vinculadas em `archive/original/` e `archive/compacted/`.

## Regra dos 10 e limites

Mantenha até dez itens correntes em requisições, revisões humanas, lotes, decisões e relatórios. A mesma janela vale para o índice de lotes, log de decisões e checklist. Índices, READMEs e ponteiros são infraestrutura. Preserve revisões pendentes e arquive excedentes com vínculos aos originais.

Mantenha a baseline abaixo de 30 KB e use 50 KB como teto preventivo dos documentos ativos. A memória de execução requer avaliação aos 50 KB ou 200 linhas e manutenção conforme a política da Chefia aos 75 KB ou 300 linhas. Quando autorizada, a compactação preserva os 20 a 25 registros mais recentes e todas as pendências.

## SLAs por papel

- **Arquiteto:** antes da execução, registra o escopo, o aceite, a autorização e a autonomia. Após o parecer técnico, encaminha a homologação.
- **Executor:** na abertura, lê o ponteiro e apresenta a Live Todo List. A cada etapa, registra progresso. Antes da entrega, registra testes e evidências.
- **Revisor:** antes da consolidação, emite parecer independente com achados, gravidade e evidências. A assinatura humana fica na ficha de homologação.

O modo definido em `CURRENT.md` governa as transições. Em autonomia monitorada, o executor avança no escopo aprovado e comunica resultados e bloqueios. Promoção do backlog exige requisição humana aprovada vinculada a um lote.

## Preservação e pipeline

A DEC-136 da matriz estabelece preservação por padrão. Retiradas de recursos ou registros exigem confirmação explícita do operador. Registre divergências antes de considerar `--confirmar-retirada`. No Git, liste caminhos explícitos ao adicionar arquivos. Use o compilador e o deploy oficiais, em sequência, e confirme a origem e o destino antes do deploy.
