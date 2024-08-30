<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Workday Job Listings',
    'description' => 'Displays job listings from Workday API',
    'category' => 'plugin',
    'author' => 'Marko Röper-Grewe',
    'author_email' => 'marko.roeper-grewe@udg.de',
    'author_company' => 'PIA / UDG',
    'clearCacheOnLoad' => 1,
    'state' => 'alpha',
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
