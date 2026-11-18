# Projeto Memory-Driven Development

- Trate `memory/README.md` e os documentos normativos como fonte normativa.
- Antes de editar código ou memória, leia `memory/README.md`, `memory/process/00-START-HERE.md`, `memory/process/01-WORKFLOW.md`, `memory/implementation/BATCH-INDEX.md`, o batch atual, `memory/validation/VALIDATION-CHECKLIST.md` e `memory/decisions/DECISION-LOG.md`.
- Use `memory/human-requests/` apenas como intake humano não normativo. Se a demanda vier como caminho de arquivo Markdown ou como a própria pasta, leia esse material primeiro e depois classifique a demanda no artefato MDD correto.
- **Memórias de Engenharia**: No início de cada sessão, leia obrigatoriamente `memory/03-memory-engineering-chief.md` e `memory/04-memory-engineering-execution.md` para alinhar contexto antes de qualquer alteração.
- **Manutenção da Memória de Execução**: Ao término de cada tarefa, atualize `memory/04-memory-engineering-execution.md` com novos aprendizados, bugs resolvidos e particularidades do ambiente. Nunca modifique `memory/03-memory-engineering-chief.md` sem instrução explícita do usuário humano.
- Classifique a demanda cedo: change request, implementação de batch, review ou validação.
- Não reescreva os documentos normativos para comentários pequenos de review.
- Edite documentos normativos apenas quando requisito, contrato, critério de aceite ou decisão aprovada realmente mudar.
- Mantenha o trabalho em batches pequenos com alvo de validação explícito.

## Skills OBRIGATÓRIAS por Marco de Fluxo

Invoque explicitamente a skill correspondente ANTES de editar código ou fechar lotes:
- **Início de Tarefa**: `/start-mdd-slice` (nova demanda), `/continue-mdd-batch` (retomar batch), `mdd-workflow` (alinhar fluxo).
- **Durante a Edição**: invoque as Core Skills (`c2f-*`) relevantes para a stack tocada (banco, variáveis, recursos, layout, etc.).
- **Fechamento e Validação**: `project-validation` (estratégia de testes), `/review-current-batch` (review findings-first), `mdd-memory-gardening` (podar memórias).
- **Mudança Normativa**: `/raise-spec-change` (se houver alteração de contrato/requisito).

## Otimização de Contexto e Arquivamento

- Mantenha `memory/decisions/DECISION-LOG.md`, `memory/implementation/BATCH-INDEX.md` e `memory/validation/VALIDATION-CHECKLIST.md` com no máximo 10 itens correntes ou ativos.
- Mantenha também `memory/human-requests/` enxuto, preservando no máximo 10 requisições correntes ou recentes fora de `archive/`.
- Mova históricos antigos para a subpasta `archive/` correspondente: `memory/decisions/archive/`, `memory/human-requests/archive/`, `memory/implementation/archive/` ou `memory/validation/archive/`.
- Nos arquivos principais, substitua o histórico arquivado por tabelas Markdown resumidas com 1 linha por item e link direto para o arquivo em `archive/`.
- Ao carregar contexto inicial, priorize os arquivos principais e abra itens em `archive/` apenas quando o batch, a requisição ativa ou um link de rastreabilidade exigir.

## Intake Gate do backlog

- `memory/backlog/` é uma incubadora de rascunhos administrada pelo Usuário e pelo Arquiteto IA.
- O Executor pode ler itens para contexto, mas é estritamente proibido de implementá-los, abrir batch de execução ou alterar código diretamente a partir deles.
- Um item, inclusive `READY`, só se torna executável após promoção humana explícita para `memory/human-requests/req-XXX.md`, atualização de `CURRENT.md` e associação a um batch.
