<?php

return [
    'ctrl' => [
        'title' => 'Form engine elements - imageManipulation',
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
                    '1' => [
                        '0' => 'Disable',
                    ],
                ],
            ],
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language'
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0
                    ]
                ],
                'foreign_table' => 'tx_styleguide_elements_group',
                'foreign_table_where' => 'AND {#tx_styleguide_elements_group}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_elements_group}.{#sys_language_uid} IN (-1,0)',
                'default' => 0
            ]
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
                        0
                    ]
                ],
                'foreign_table' => 'tx_styleguide_elements_group',
                'foreign_table_where' => 'AND {#tx_styleguide_elements_group}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_elements_group}.{#uid}!=###THIS_UID###',
                'default' => 0
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'file_1' => [
            'exclude' => 1,
            'label' => 'file_1',
            'config' => [
                'type' => 'input',
                'eval' => 'int'
            ],
        ],
        'file_2' => [
            'exclude' => 1,
            'label' => 'file_2',
            'config' => [
                'type' => 'input',
                'eval' => 'int'
            ],
        ],
        'file_3' => [
            'exclude' => 1,
            'label' => 'file_3',
            'config' => [
                'type' => 'input',
                'eval' => 'int'
            ],
        ],
        'crop_1' => [
            'exclude' => 1,
            'label' => 'crop_1',
            'description' => 'standard configuration',
            'config' => [
                'type' => 'imageManipulation',
                'file_field' => 'file_1'
            ],
        ],
        'crop_2' => [
            'exclude' => 1,
            'label' => 'crop_2',
            'description' => 'limit to png',
            'config' => [
                'type' => 'imageManipulation',
                'file_field' => 'file_2',
                'allowedExtensions' => 'png'
            ],
        ],
        'crop_4' => [
            'exclude' => 1,
            'label' => 'crop_4',
            'description' => 'limit to jpg',
            'config' => [
                'type' => 'imageManipulation',
                'file_field' => 'file_2',
                'allowedExtensions' => 'jpg'
            ],
        ],
        'crop_3' => [
            'exclude' => 1,
            'label' => 'crop_3',
            'description' => 'mobile cropVariant with cropArea',
            'config' => [
                'type' => 'imageManipulation',
                'file_field' => 'file_3',
                'cropVariants' => [
                    'mobile' => [
                        'title' => 'mobile cropVariant with cropArea',
                        'cropArea' => [
                            'x' => 0.1,
                            'y' => 0.1,
                            'width' => 0.8,
                            'height' => 0.8,
                        ],
                    ],
                ],
            ],
        ],

    ],

    'types' => [
        '0' => [
            'showitem' => '
                --div--;crop,
                    file_1, crop_1, file_2, crop_2, crop_4, file_3, crop_3,
                --div--;meta,
                disable, sys_language_uid, l10n_parent, l10n_source,
            ',
        ],
    ],

];
