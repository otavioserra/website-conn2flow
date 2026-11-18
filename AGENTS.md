# Agentes MDD — Configuração Multi-Agente OpenAI Codex & Antigravity

- **Projeto** `website-conn2flow`
- **Raiz** `C:\Users\otavi\OneDrive\Documentos\GIT\website-conn2flow`
- **Governança** MDD (Memory-Driven Development), em `memory/`. Use `memory/` também onde regras sincronizadas da matriz ainda citam a antiga pasta SDD.

Consulte [00 · Arquitetura](memory/00-baseline-architecture.md), [01 · Mecânica](memory/01-general-memory.md), [02 · Política](memory/02-policy.md), [03 · Chefia](memory/03-memory-engineering-chief.md) e [04 · Execução](memory/04-memory-engineering-execution.md). Abra o [índice MDD](memory/index.md) e o [ponteiro ativo](memory/human-requests/CURRENT.md) antes de iniciar o lote.

As 46 skills canônicas estão em `.gemini/skills/`, `.claude/skills/`, `.cursor/skills/`, `.codex/skills/` e `.github/skills/`.


## 👥 Papéis de Agente Duplo

### 🏛️ Arquiteto (Macro-Orquestrador)
- **Responsabilidade**: Traduzir necessidades humanas e briefings em especificações normativas (`memory/SPEC.md`), registros de decisão (`memory/decisions/`) e requisições formais (`memory/human-requests/req-XXX.md`).
- **Ferramentas**: Antigravity / Gemini / GPT no modo planejamento.
- **Regra**: Nunca realiza commits ou push de código diretamente no core ou módulos.

### ⚙️ Executor (Micro-Operador)
- **Responsabilidade**: Implementar código, compilar recursos, rodar testes e registrar evidências no lote em `memory/implementation/batch-YYY.md` e `memory/validation/VALIDATION-CHECKLIST.md`.
- **Ferramentas**: OpenAI Codex / GPT no VS Code / Claude Code.
- **Regra**: Lê o briefing em `memory/human-requests/CURRENT.md` antes de iniciar qualquer alteração e atualiza a Live Todo List (`[ ]` ➔ `[x]`).

### 👨‍💻 Humano-no-Loop (Você)
- **Responsabilidade**: Direcionar o Arquiteto e revisar diffs de código antes da consolidação final.

---

## ⚡ Protocolo de Inicialização Zero-Prompt (Auto-Boot)

Quando o usuário abrir um chat e enviar comandos curtos (ex: `"começa aí"`, `"chefe"`, `"inicia"`, `"bora"`, `"executa"`, `"status"`):
1. **Identificação Automática**: O agente assume imediatamente o contexto do repositório local.
2. **Leitura Mandatória de `CURRENT.md`**: O agente abre `memory/human-requests/CURRENT.md` para inspecionar o ponteiro da requisição ativa (`req-XXX.md`), o lote correspondente e o modo de autonomia (`supervisionado`, `autonomo_monitorado` ou `autonomo_headless`).
3. **Ativação Automática por Papel**:
   - **No Antigravity (Arquiteto Master / Engenheiro Chefe)**: Ativa `c2f-architect-master`, lê `memory/03-memory-engineering-chief.md`, verifica pendências e propõe o próximo plano estratégico ao usuário.
   - **No VS Code / Claude Code / Codex (Executor Tático)**: Ativa `c2f-executor-agent`, renderiza de imediato a **Live Todo List (`[ ]` ➔ `[x]`)** a partir da requisição ativa e inicia a implementação do menor slice aprovado.
   - **No Revisor (Auditor de Qualidade)**: Ativa `c2f-reviewer-agent`, audita diffs e valida contratos de segurança/skills.
4. **Integração MCP Automática**: Utiliza o MCP Hub (`conn2flow-hub`) para operações de CLI (`c2f_run_command`), despacho (`dispatch_task`) e recibos de conclusão (`report_completion`).

---

## 🛡️ Regras Invioláveis de Governança

1. **Proibição Absoluta de `git add -A` e `git add .`**: Commits devem SEMPRE listar arquivos específicos (`git add <caminhos-especificos>`).
2. **Proibição de Sincronização por Cópia Manual**: NUNCA copie arquivos manualmente (`cp`, `copy`, `Copy-Item`) para pastas de teste/espelho (`dev-environment/data/sites/`). Use sempre `./c2f manager:update-all` (sistema) ou `./c2f project:deploy <id>` (projeto).
3. **Execução Sequencial Exclusiva**: Comandos de compilação em lote (`manager:update-all`, `project:deploy`, `css:rebuild`, `resources:sync`) devem executar um por vez em foreground com logs desbufferizados.
4. **Fonte da Verdade em Runtime**: O runtime serve HTML e CSS exclusivamente do banco de dados SQL. `resources/` é a semente de autoria.
5. **Version Bump Mandatório**: Ao alterar scripts JS ou estilos estáticos, incremente a versão no metadado `<id>.json` do recurso.
6. **Goal Mode (`/goal`)**: Utilize `/goal` no prompt para execução ininterrupta de fatias complexas no modo Autônomo Monitorado até cumprimento de todos os critérios de aceite do `VALIDATION-CHECKLIST.md`.
7. **Identificação de Repositório em Handoffs e Prompts**: Sempre explicitar o identificador do projeto e o caminho absoluto da raiz do repositório alvo nas mensagens de acionamento para outros agentes.

