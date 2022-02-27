<?php

return [
    'ctrl' => [
        'title' => 'Form engine - inline expand',
        'label' => 'uid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'iconfile' => 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
    ],

    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'config' => [
                'type' => 'check',
                'items' => [
                    ['Disable'],
                ],
            ],
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'Translation parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'foreign_table' => 'tx_styleguide_inline_expand',
                'foreign_table_where' => 'AND {#tx_styleguide_inline_expand}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_inline_expand}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'exclude' => true,
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'Translation source',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'foreign_table' => 'tx_styleguide_inline_expand',
                'foreign_table_where' => 'AND {#tx_styleguide_inline_expand}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_inline_expand}.{#uid}!=###THIS_UID###',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],

        'inline_1' => [
            'exclude' => 1,
            'label' => 'inline_1',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_inline_expand_inline_1_child',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'appearance' => [
                    'collapseAll' => false,
                ]
            ],
        ],
        'inline_2' => [
            'exclude' => 1,
            'label' => 'inline_2 max_items=3',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_inline_expand_inline_1_child',
                'foreign_field' => 'parentid_2',
                'foreign_table_field' => 'parenttable',
                'minitems' => 1,
                'maxitems' => 3,
                'appearance' => [
                    'collapseAll' => 1
                ],
            ],
        ],

    ],

    'types' => [
        '0' => [
            'showitem' => '
                inline_1,inline_2
            ',
        ],
    ],

];
