<?php
return [
    'ctrl' => [
        'title' => 'Form engine elements - special access rights',
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
            'starttime' => 'starttime',
            'endtime' => 'endtime',
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
        'starttime' => [
            'exclude' => 1,
            'label' => 'Publish Date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => '0'
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'Expiration Date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => '0',
                'range' => [
                    'upper' => mktime(0, 0, 0, 12, 31, 2020)
                ]
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'exclude' => true,
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'Translation parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0
                    ]
                ],
                'foreign_table' => 'tx_styleguide_elements_special',
                'foreign_table_where' => 'AND tx_styleguide_elements_special.pid=###CURRENT_PID### AND tx_styleguide_elements_special.sys_language_uid IN (-1,0)',
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
                'foreign_table' => 'tx_styleguide_elements_special',
                'foreign_table_where' => 'AND tx_styleguide_elements_special.pid=###CURRENT_PID### AND tx_styleguide_elements_special.uid!=###THIS_UID###',
                'default' => 0
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],

        'special_custom_1' => [
            'exclude' => 1,
            'label' => 'special_custom_1, identical to be_groups custom_options',
            'config' => [
                // @todo: register a "custom" option so something is shown here
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'custom',
            ],
        ],
        'special_exclude_1' => [
            'exclude' => 1,
            'label' => 'special_exclude_1, identical to be_groups non_exclude_fields',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'exclude',
                'size' => '25',
                'autoSizeMax' => 50,
            ],
        ],
        'special_explicitvalues_1' => [
            'exclude' => 1,
            'label' => 'special_explicitvalues_1, identical to be_groups explicit_allowdeny',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'explicitValues',
            ],
        ],
        'special_languages_1' => [
            'exclude' => 1,
            'label' => 'special_languages_1, identical to be_groups allowed_languages',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'languages',
            ],
        ],
        'special_modlistgroup_1' => [
            'exclude' => 1,
            'label' => 'special_modlistgroup_1, identical to be_groups groupMods',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'modListGroup',
                'size' => '5',
                'autoSizeMax' => 50,
            ],
        ],
        'special_pagetypes_1' => [
            'exclude' => 1,
            'label' => 'special_pagetypes_1, identical to be_groups pagetypes_select',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'pagetypes',
                'size' => '5',
                'autoSizeMax' => 50,
            ],
        ],
        'special_tables_1' => [
            'exclude' => 1,
            'label' => 'special_tables_1, identical to be_groups tables_modify & tables_select',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'tables',
                'size' => '5',
                'autoSizeMax' => 50,
            ],
        ],
        'special_tables_2' => [
            'exclude' => 1,
            'label' => 'special_tables_2, identical to index_config table2index',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['dummy entry', '0']
                ],
                'special' => 'tables',
            ],
        ],
        'special_tables_3' => [
            'exclude' => 1,
            'label' => 'special_tables_3, identical to sys_collection table_name',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'tables',
            ],
        ],
        'special_usermods_1' => [
            'exclude' => 1,
            'label' => 'special_usermods_1, identical to be_users userMods',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'modListUser',
                'size' => '5',
                'autoSizeMax' => 50,
            ],
        ],


    ],


    'types' => [
        '0' => [
            'showitem' => '
                --div--;special=custom,
                    special_custom_1,
                --div--;special=exclude,
                    special_exclude_1,
                --div--;special=explicitvalues,
                    special_explicitvalues_1,
                --div--;special=languages,
                    special_languages_1,
                --div--;special=modlistgroup,
                    special_modlistgroup_1,
                --div--;special=pagetypes,
                    special_pagetypes_1,
                --div--;special=tables,
                    special_tables_1, special_tables_2, special_tables_3,
                --div--;special=usermods,
                    special_usermods_1,
            ',
        ],
    ],


];
