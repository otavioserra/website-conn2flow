# Validation Checklist

## BATCH-001 (REQ-001)

### Checklist de aceite

- [x] Estrutura de diretórios criada sob `gestor/resources/pt-br/` (`layouts/`, `paginas/`, `componentes/` + JSONs de metadados e `resources.map.php`).
- [x] **Layout Principal** implementado com `<head>`, Google Fonts (`Nunito`), cabeçalho/menu, slot de conteúdo (`@[[pagina#corpo]]@`) e rodapé — `layouts/layout-principal/`.
- [x] **Página Home** implementada e acoplada ao Layout Principal — `paginas.json` → `"layout": "layout-principal"`, `path: /`.
- [x] Tipografia `Nunito` do Google Fonts configurada como padrão global — `layout-principal.css` (`html, body { font-family: 'Nunito' }`) + `@theme --font-sans`. Evidência: `report.json` → `fontFamily`/`h1Font` = Nunito nos 3 viewports.
- [x] Identidade visual em **Verde Esmeralda** aplicada com contraste, legibilidade e efeitos luminosos modernos — fundos `#060e0a`/`#0a1510`, `emerald-400/500/600`, glows `blur-3xl`, bordas `emerald-500/20`. Evidência: `desktop-1440-fold.png`.
- [x] Hero Section com badges, headline, subheadline e CTAs duplos — seção `hero` (+ mockup terminal/player e métricas).
- [x] Grade de Episódios completa (Episódios 01 a 04 disponíveis, Episódio 05+ em breve) — seção `episodios`, 5 cards (`report.json` → `episodes: 5`).
- [x] Seção de Metodologia & Metáforas (Prótese Cognitiva, SDD Memória da IA, Agente Duplo/Triplo, Empresa de 1 Pessoa) — seção `metodologia`, 4 pilares + citação.
- [x] Hub de Materiais & Downloads com links para o repositório e recursos — seção `materiais`, card do repo + 4 materiais.
- [x] Seção de Stack Tecnológica & Ferramentas Agênticas — seção `stack`, 8 cards.
- [x] Call to Action de conversão para Conn2Flow Pro e Playlist do YouTube — seção `cta` (`conn2flow.com/pro/#planos`, playlist `PLBjofG88X62Y`).
- [x] Rodapé completo com links institucionais e direitos autorais — marca, Curso/Recursos/Conn2Flow, redes sociais, status, © 2026.
- [x] Elementos criativos adicionais implementados pelo executor para enriquecer a experiência — FAQ, barra de progresso, marquee, terminal 3D, reveal progressivo, linha do tempo (lista completa em `batch-001.md`).
- [x] Responsividade testada em mobile, tablet e desktop — Playwright 390/820/1440: sem overflow horizontal, menu mobile funcional, 0 erros de console. Evidências em `evidence/batch-001/`.

### Pendências fora do aceite (ver `implementation/batch-001.md`)

- [ ] Decisão do Arquiteto sobre nomenclatura `paginas/componentes` × `pages/components` do compilador do Core.
- [ ] Execução do pipeline oficial (`c2f resources:sync` + `css:rebuild`) quando o projeto for registrado no ambiente Docker.
- [ ] Revisão técnica (`/review-current-batch`).
