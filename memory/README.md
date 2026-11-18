# Governança MDD de [NOME-DO-PROJETO]

Este diretório define a governança local de Memory-Driven Development do projeto.

## Ordem normativa mínima

1. `memory/README.md`
2. `memory/00-baseline-architecture.md`
3. `memory/SPEC.md`
4. `memory/process/00-START-HERE.md`
5. `memory/process/01-WORKFLOW.md`
6. `memory/implementation/BATCH-INDEX.md`
7. `memory/validation/VALIDATION-CHECKLIST.md`
8. `memory/decisions/DECISION-LOG.md`

## Regras de ouro

- `memory/human-requests/` é intake humano não normativo.
- O executor pode atualizar artefatos operacionais como `implementation/` e `validation/`.
- Mudanças normativas devem ser consolidadas em `SPEC.md`, no baseline ou em outros MDD numerados só quando o requisito realmente mudar.
- Cada rodada deve perseguir o menor batch plausível e a menor validação capaz de falsificar o slice atual.

## Estado inicial

- `BATCH-000`: boilerplate MDD instalado.
- `BATCH-001`: primeiro batch funcional aguardando classificação.
- Ponteiro ativo: `memory/human-requests/CURRENT.md`.