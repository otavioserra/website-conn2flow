# Trabalhando em Par com IA

Website oficial da série sobre como planejar, construir e evoluir projetos reais com agentes de IA. A página inicial reúne os episódios, os materiais de apoio e os recursos do Conn2Flow.

## Desenvolvimento local

- **Projeto** `website-conn2flow`
- **Raiz** `C:\Users\otavi\OneDrive\Documentos\GIT\website-conn2flow`
- **Governança** MDD (Memory-Driven Development), em `memory/`. Use `memory/` também onde regras sincronizadas da matriz ainda citam a antiga pasta SDD.

Consulte [00 · Arquitetura](memory/00-baseline-architecture.md), [01 · Mecânica](memory/01-general-memory.md), [02 · Política](memory/02-policy.md), [03 · Chefia](memory/03-memory-engineering-chief.md) e [04 · Execução](memory/04-memory-engineering-execution.md). Abra o [índice MDD](memory/index.md) e o [ponteiro ativo](memory/human-requests/CURRENT.md) antes de iniciar o lote.

As 46 skills canônicas estão em `.gemini/skills/`, `.claude/skills/`, `.cursor/skills/`, `.codex/skills/` e `.github/skills/`.

O código-fonte da página, do layout e dos componentes está em `gestor/resources/pt-br/`. O Core Conn2Flow v3.0 compila o HTML e o CSS do projeto e oferece a CLI de deploy. Consulte a [especificação do projeto](memory/SPEC.md) para ver o fluxo de publicação.
