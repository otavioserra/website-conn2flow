# Batch Index

## Status

- `complete`: batch validado e integrado.
- `ready-for-review`: execução técnica validada e disponível para revisão.
- `in-progress`: execução ativa.
- `ready-for-intake`: aguardando briefing detalhado.
- `blocked`: depende de decisão adicional.

## Batches

| Batch | Status | Escopo | Alvo de validação | Observações |
| --- | --- | --- | --- | --- |
| BATCH-000 | complete | Bootstrap do SDD local | Estrutura `sdd/` criada | Boilerplate inicial instalado e commitado. |
| BATCH-001 | complete | Construção do Website do Curso de IA (REQ-001) | Landing page com Tailwind, Nunito e Verde Esmeralda | Implementado, validado (Playwright 390/820/1440) e homologado. Detalhes em [batch-001.md](batch-001.md). |
| BATCH-002 | complete | Governança MDD e Home no Conn2Flow v3.0 (REQ-002) | Deploy local em `ia-parceria` e Playwright em 390/820/1440 | [Execução e evidências](batch-002.md). |
| BATCH-003 | ready-for-review | Evolução para Portal Dinâmico dos Seriados (REQ-003) | Módulos `menus`, `publisher`, `publisher-highlights`, `publisher-index`, 13 templates e 9 publicações em `ia-parceria` | Executado e validado (Playwright 45/45 em três configurações de template). Aguarda o `c2f-reviewer-agent`. [Execução e evidências](batch-003.md). |
