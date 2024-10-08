<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'TYPO3 CMS Backend Styleguide and Testing use cases',
    'description' => 'TYPO3 extension to showcase TYPO3 Backend capabilities',
    'category' => 'plugin',
    'author' => 'TYPO3 Core Team',
    'author_email' => 'typo3cms@typo3.org',
    'state' => 'stable',
    'version' => '13.3.2',
    'constraints' => [
        'depends' => [
            'typo3' => '13.3.2',
            'felogin' => '13.3.2',
            'fluid_styled_content' => '13.3.2',
            'seo' => '13.3.2',
            'form' => '13.3.2',
            'indexed_search' => '13.3.2',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
