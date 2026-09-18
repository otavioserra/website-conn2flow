<?php

/**********
	Description: resources mapping — Website do Curso de IA (Trabalhando em Par com IA).

	Observação (REQ-001 / SPEC.md): a SPEC define as pastas `paginas/` e `componentes/`
	em português. O compilador do Core (`atualizacao-dados-recursos.php`) varre `pages/`
	e `components/`; a equivalência está registrada abaixo e a decisão de alinhamento
	(renomear pastas ou estender o compilador) está pendente no DECISION-LOG.
**********/

// ===== Variable definition.

$resources = [
	'languages' => [
        'pt-br' => [
            'name' => 'Português (Brasil)',
            'data' => [
                'layouts' => 'layouts.json',
                'pages' => 'paginas.json',
                'components' => 'componentes.json',
            ],
            'directories' => [
                'layouts' => 'layouts',
                'pages' => 'paginas',
                'components' => 'componentes',
            ],
            'version' => '1',
        ],
    ],
];

// ===== Return the variable.

return $resources;
