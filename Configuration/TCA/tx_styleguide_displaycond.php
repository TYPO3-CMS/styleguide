<?php

return [
    'ctrl' => [
        'title' => 'Form engine - displayCond',
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
                        '0' => 'Disable'
                    ],
                ],
            ],
        ],
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0]
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'Translation parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_styleguide_required',
                'foreign_table_where' => 'AND {#tx_styleguide_required}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_required}.{#sys_language_uid} IN (-1,0)',
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
                'foreign_table' => 'tx_styleguide_required',
                'foreign_table_where' => 'AND {#tx_styleguide_required}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_required}.{#uid}!=###THIS_UID###',
                'default' => 0
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],

        // Tab FIELD REQ start
        'select_1' => [
            'exclude' => 1,
            'label' => 'select_1',
            'description' => 'Displays input_1 (true values) or input_2 (false values)',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1,
                'maxitems' => 1,
                'items' => [
                    ['false values', '--div--'],
                    ['integer 0', 0],
                    ['string "0"', '0'],
                    ['bool false', false],
                    ['string empty', ''],
                    ['true values', '--div--'],
                    ['integer 1', 1],
                    ['bool true', true],
                    ['string "1"', '1'],
                    ['string "true"', 'true'],
                    ['string "false"', 'false'],
                ],
            ],
        ],

        'input_1' => [
            'exclude' => 1,
            'label' => 'input_1',
            'description' => 'displayCond=FIELD:select_1:REQ:true',
            'displayCond' => 'FIELD:select_1:REQ:true',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_2' => [
            'exclude' => 1,
            'label' => 'input_2',
            'description' => 'displayCond=FIELD:select_1:REQ:false',
            'displayCond' => 'FIELD:select_1:REQ:false',
            'config' => [
                'type' => 'input',
            ],
        ],
        // Tab FIELD REQ end
        // Tab FIELD compare start
        'input_3' => [
            'exclude' => 1,
            'label' => 'input_3',
            'description' => 'Try values between 0 and 6',
            // @todo onChange does not work for input fields. See: https://forge.typo3.org/issues/93613
            'onChange' => 'reload',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,int',
            ],
        ],
        'input_4' => [
            'exclude' => 1,
            'label' => 'input_4',
            'description' => 'displayCond=FIELD:input_3:=:0',
            'displayCond' => 'FIELD:input_3:=:0',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_5' => [
            'exclude' => 1,
            'label' => 'input_5',
            'description' => 'displayCond=FIELD:input_3:<:5',
            'displayCond' => 'FIELD:input_3:<:5',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_6' => [
            'exclude' => 1,
            'label' => 'input_6',
            'description' => 'displayCond=FIELD:input_3:>=:5',
            'displayCond' => 'FIELD:input_3:>=:5',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_7' => [
            'exclude' => 1,
            'label' => 'input_7',
            'description' => 'displayCond=FIELD:input_3:-:2-4',
            'displayCond' => 'FIELD:input_3:-:2-4',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_8' => [
            'exclude' => 1,
            'label' => 'input_8',
            'description' => 'displayCond=FIELD:input_3:IN:1,3,5',
            'displayCond' => 'FIELD:input_3:IN:1,3,5',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_9' => [
            'exclude' => 1,
            'label' => 'input_9',
            'description' => 'displayCond=FIELD:input_3:!IN:1,3,5',
            'displayCond' => 'FIELD:input_3:!IN:1,3,5',
            'config' => [
                'type' => 'input',
            ],
        ],
        // Tab FIELD compare end

        // Tab FIELD AND OR start
        'select_2' => [
            'exclude' => 1,
            'label' => 'select_2',
            'description' => 'To display input_19 choose foo1, for foo1 or foo42',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['foo1', 1],
                    ['foo2', 2],
                    ['foo42', 42],
                ],
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        // Tab FIELD AND OR start
        'checkbox_1' => [
            'exclude' => 1,
            'label' => 'checkbox_1',
            'onChange' => 'reload',
            'description' => 'To display input_19 choose one checkbox, for input_20 neither',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['foo', ''],
                    ['bar', ''],
                ],
            ]
        ],
        'input_19' => [
            'exclude' => 1,
            'label' => 'input_19:',
            'description' => 'displayCond=FIELD:select_2:=:1 AND checkbox_1:BIT:1',
            'displayCond' => [
                'AND' => [
                    'FIELD:select_2:=:1',
                    'FIELD:checkbox_1:BIT:1',
                ],
            ],
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_20' => [
            'exclude' => 1,
            'label' => 'input_20',
            'description' => 'FIELD:checkbox_1:=:0 AND (FIELD:select_2:=:1 OR FIELD:select_2:>:3)',
            'displayCond' => [
                'AND' => [
                    'FIELD:checkbox_1:=:0',
                    'OR' => [
                        'FIELD:select_2:=:1',
                        'FIELD:select_2:>:3'
                    ]
                ]
            ]
        ],
        // Tab FIELD AND OR end

        // Tab REC:NEW start
        'input_10' => [
            'exclude' => 1,
            'label' => 'input_10',
            'description' => 'displayCond=REC:NEW:true',
            'displayCond' => 'REC:NEW:true',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_11' => [
            'exclude' => 1,
            'label' => 'input_11',
            'description' => 'displayCond=REC:NEW:false',
            'displayCond' => 'REC:NEW:false',
            'config' => [
                'type' => 'input',
            ],
        ],
        // Tab REC:NEW OR end

        // Tab HIDE_FOR_NON_ADMINS start
        'input_13' => [
            'exclude' => 1,
            'label' => 'input_13',
            'description' => 'displayCond=HIDE_FOR_NON_ADMINS',
            'displayCond' => 'HIDE_FOR_NON_ADMINS',
            'config' => [
                'type' => 'input',
            ],
        ],
        // Tab HIDE_FOR_NON_ADMINS end

        // Tab USER start
        'input_14' => [
            'exclude' => 1,
            'label' => 'input_14',
            'description' => 'Smaller value',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,int',
            ],
        ],
        'input_15' => [
            'exclude' => 1,
            'label' => 'input_15',
            'description' => 'Larger value',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,int',
            ],
        ],
        'input_16' => [
            'exclude' => 1,
            'label' => 'input_16',
            'description' => 'displayCond=USER:TYPO3\CMS\Styleguide\UserFunctions\FormEngine\DisplayConditionUserFunc->lessThen:input_14:input_15',
            'displayCond' => 'USER:TYPO3\CMS\Styleguide\UserFunctions\FormEngine\DisplayConditionUserFunc->lessThen:input_14:input_15',
            'config' => [
                'type' => 'input',
            ],
        ],
        // Tab USER end

        // Tab VERSION:IS start
        'input_17' => [
            'exclude' => 1,
            'label' => 'input_17',
            'description' => 'displayCond=VERSION:IS:true',
            'displayCond' => 'VERSION:IS:true',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_18' => [
            'exclude' => 1,
            'label' => 'input_18',
            'description' => 'displayCond=VERSION:IS:false',
            'displayCond' => 'VERSION:IS:false',
            'config' => [
                'type' => 'input',
            ],
        ],
        // Tab VERSION:IS end
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;FIELD REQ,
                    select_1,
                    input_1,
                    input_2,
                --div--;FIELD compare,
                    input_3,
                    input_4,
                    input_5,
                    input_6,
                    input_7,
                    input_8,
                    input_9,
                --div--;FIELD AND OR,
                    select_2,
                    checkbox_1,
                    input_19,
                    input_20,
                --div--;REC:NEW,
                    input_10,
                    input_11,
                --div--;HIDE_FOR_NON_ADMINS,
                    input_13,
                --div--;USER,
                    input_14,
                    input_15,
                    input_16,
                --div--;VERSION:IS,
                    input_17,
                    input_18,
            ',
        ],
    ],

];
