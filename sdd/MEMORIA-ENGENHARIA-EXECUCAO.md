# Memória de Engenharia — Execução

> **Propósito**: Este diário de bordo é reservado aos **Agentes Executores IA**. Registre aqui aprendizados sobre o ambiente local, particularidades do compilador/build, hacks temporários, bugs resolvidos e lições aprendidas durante a execução de tarefas.
>
> **Permissão**: Leitura e escrita para agentes executores IA. Atualize este arquivo **compulsoriamente** ao término de cada tarefa, registrando novos aprendizados para garantir a persistência do contexto entre sessões.
>
> **Política**: é proibido podar abaixo de 50 KB / 200 linhas; emitir alerta preventivo nesse patamar, podar obrigatoriamente ao atingir 75 KB / 300 linhas e mirar ~25 KB, preservando 20 a 25 tarefas e aprendizados recentes. O fim da sessão ou do batch não aciona poda. A memória de Chefia é somente leitura.

---

## Dependências & Ambiente Local

- Este repositório (`website-conn2flow`) **não** contém o CLI `c2f` nem Docker. O Core vive em `C:\Users\otavi\OneDrive\Documentos\GIT\conn2flow` (skills em `.claude/skills/`, compilador em `gestor/controladores/agents/arquitetura/atualizacao-dados-recursos.php`).
- Playwright + Chromium já instalados no Core: `require('C:/Users/otavi/OneDrive/Documentos/GIT/conn2flow/node_modules/playwright')` (Node v20.14.0). Browsers em `%LOCALAPPDATA%\ms-playwright`.
- Windows/Git Bash: heredocs `<<'EOF'` com conteúdo grande/`\\` corrompem (erro "unexpected EOF" ou barras duplas colapsadas). Usar a ferramenta Write para arquivos e scripts.

---

## Aprendizados do Compilador / Build

- Marcadores do layout: `<!-- pagina#titulo -->`, `<!-- pagina#css -->`, `<!-- pagina#js -->`, `@[[pagina#corpo]]@` (slot), `@[[pagina#url-raiz]]@`.
- Metadados são JSONs coletivos por tipo (`layouts.json`, `pages.json`, `components.json`), com `framework_css: "tailwindcss"`, `tailwind_dependencies`, `version` e `checksum` = `{ html: md5(html), css: md5(css), combined: md5(html+css+css_precompiled) }` (função `buildChecksum`).
- Páginas Tailwind de sites públicos (ex.: projeto `digitalfluxus`) carregam `https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4` no layout como fallback ao `css_compiled`; `@theme` pode ser declarado em `<style type="text/tailwindcss">`.
- **O compilador varre pastas fixas `pages/` e `components/`** (linha 258). Nomenclatura de `resources/<lang>/` é sempre em inglês (`layouts`, `pages`, `components`), mesmo em projetos pt-br. A SPEC/REQ-001 vieram com `paginas/componentes` e foram corrigidas por instrução humana em 2026-09-18.

---

## Hacks Locais & Workarounds

- Validação visual sem Gestor: script `build-and-validate.js` (scratchpad da sessão) compõe layout + página substituindo marcadores e roda Playwright em 390/820/1440, gravando `report.json` + PNGs em `sdd/validation/evidence/batch-XXX/`. Reaproveitar o padrão em batches futuros.

---

## Bugs Resolvidos & Lições Aprendidas

- **[BATCH-001] Overflow horizontal em 390px**: `grid` sem `grid-cols-1` cria coluna implícita `auto`, que cresce até a min-content de um texto monoespaçado longo (`otavioserra/conn2flow-ai-workspace`), mesmo com `truncate` no filho. Fix: `grid-cols-1` (`minmax(0,1fr)`) + `min-w-0` no item. Sempre declarar o breakpoint base dos grids.

---

## Notas Cross-Session

- BATCH-001 implementado e validado em 2026-09-18; aguarda revisão técnica e decisão sobre nomenclatura de pastas antes do primeiro `c2f resources:sync`.
- Favicons (`favicon/*`) e imagens do projeto ainda não existem no repositório.
