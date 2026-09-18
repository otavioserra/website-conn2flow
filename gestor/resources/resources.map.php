<?php

/**********
	Description: resources mapping — Website do Curso de IA (Trabalhando em Par com IA).
**********/

// ===== Variable definition.

$resources = [
	'languages' => [
        'pt-br' => [
            'name' => 'Português (Brasil)',
            'data' => [
                'layouts' => 'layouts.json',
                'pages' => 'pages.json',
                'components' => 'components.json',
            ],
            'version' => '1',
        ],
    ],
];

// ===== Return the variable.

return $resources;
