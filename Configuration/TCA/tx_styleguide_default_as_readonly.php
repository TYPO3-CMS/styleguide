<?php

/**
 * @todo Currently missing are examples for "inline", "flex" and "MM".
 *       Those will be added step by step, while fixing them in core.
 */

return [
    'ctrl' => [
        'title' => 'Form engine - defaultAsReadonly',
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
                'type' => 'language'
            ]
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
                        0
                    ]
                ],
                'foreign_table' => 'tx_styleguide_elements_select',
                'foreign_table_where' => 'AND {#tx_styleguide_elements_select}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_elements_select}.{#sys_language_uid} IN (-1,0)',
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
                'foreign_table' => 'tx_styleguide_elements_select',
                'foreign_table_where' => 'AND {#tx_styleguide_elements_select}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_elements_select}.{#uid}!=###THIS_UID###',
                'default' => 0
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],

        // type=input
        'input' => [
            'label' => 'input',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
            ],
        ],
        'input_colorpicker' => [
            'label' => 'input_colorpicker',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'renderType' => 'colorpicker',
            ],
        ],
        'input_datetime' => [
            'label' => 'input_datetime',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'date',
            ],
        ],
        'input_link' => [
            'label' => 'input_link',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
            ],
        ],

        // type=slug
        'slug' => [
            'label' => 'slug',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'slug',
                'generatorOptions' => [
                    'fields' => ['input'],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
            ],
        ],

        // type=check
        'checkbox' => [
            'label' => 'checkbox',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['foo'],
                    ['bar'],
                ],
            ],
        ],
        'checkbox_toggle' => [
            'label' => 'checkbox_toggle',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => 'foo',
                        'labelChecked' => 'Enabled',
                        'labelUnchecked' => 'Disabled',
                        'invertStateDisplay' => true
                    ],
                    [
                        0 => 'bar',
                    ]
                ],
            ]
        ],
        'checkbox_labeled_toggle' => [
            'label' => 'checkbox_labeled_toggle',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxLabeledToggle',
                'items' => [
                    [
                        0 => 'foo',
                        'labelChecked' => 'Enabled',
                        'labelUnchecked' => 'Disabled',
                        'invertStateDisplay' => true
                    ],
                    [
                        0 => 'bar',
                        'labelChecked' => 'Enabled',
                        'labelUnchecked' => 'Disabled',
                    ]
                ],
            ]
        ],

        // type=radio
        'radio' => [
            'label' => 'radio',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'radio',
                'items' => [
                    ['foo', 1],
                    ['bar', 2],
                ],
            ],
        ],

        // type=none
        'none' => [
            'label' => 'none',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'none',
                'format' => 'date',
                'format.' => [
                    'strftime' => true,
                    'option' => '%x',
                ],
            ],
        ],

        // type=group
        'group' => [
            'label' => 'group',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'allowed' => 'be_users,be_groups',
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
        'group_folder' => [
            'label' => 'group_folder',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'folder',
            ],
        ],
        'group_file' => [
            'label' => 'group_file',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'allowed' => 'sys_file',
                // This id must exist, as otherwise field "image_manipulation" does not work
                'default' => 14
            ],
        ],

        // type=imageManipulation
        'image_manipulation' => [
            'label' => 'image_manipulation',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'imageManipulation',
                'file_field' => 'group_file'
            ],
        ],

        // type=language
        'language' => [
            'label' => 'language',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'language'
            ]
        ],

        // type=category
        'category_11' => [
            'label' => 'category_11',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'category',
                'relationship' => 'oneToOne'
            ]
        ],
        'category_1n' => [
            'label' => 'category_1n',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'category',
                'relationship' => 'oneToMany'
            ]
        ],

        // type=text
        'text' => [
            'label' => 'text',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'text',
            ],
        ],
        'text_rte' => [
            'label' => 'text_table',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'enableRichtext' => true,
            ],
        ],
        'text_belayoutwizard' => [
            'label' => 'text_belayoutwizard',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'text',
                'renderType' => 'belayoutwizard',
            ],
        ],
        'text_t3editor' => [
            'label' => 'text_t3editor',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'text',
                'renderType' => 't3editor',
                'format' => 'html',
                'rows' => 5,
            ],
        ],
        'text_table' => [
            'label' => 'text_table',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'text',
                'renderType' => 'textTable',
                'wrap' => 'off',
                'cols' => 30,
                'rows' => 5,
                'enableTabulator' => true,
            ],
        ],

        // type=select
        'select_single' => [
            'label' => 'select_single',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Static values', '--div--'],
                    ['static -2', -2],
                    ['static -1', -1],
                    ['DB values', '--div--'],
                ],
                'foreign_table' => 'tx_styleguide_staticdata',
                'foreign_table_where' => 'AND {#tx_styleguide_staticdata}.{#value_1} LIKE \'%foo%\' ORDER BY uid',
                'foreign_table_prefix' => 'A prefix: ',
            ],
        ],
        'select_single_box' => [
            'label' => 'select_single_box',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'items' => [
                    ['Static values', '--div--'],
                    ['static -2', -2],
                    ['static -1', -1],
                    ['DB values', '--div--'],
                ],
                'foreign_table' => 'tx_styleguide_staticdata',
                'foreign_table_where' => 'AND {#tx_styleguide_staticdata}.{#value_1} LIKE \'%foo%\' ORDER BY uid',
                'foreign_table_prefix' => 'A prefix: ',
            ],
        ],
        'select_checkbox' => [
            'label' => 'select_checkbox',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['Static values', '--div--'],
                    ['static -2', -2],
                    ['static -1', -1],
                    ['DB values', '--div--'],
                ],
                'foreign_table' => 'tx_styleguide_staticdata',
                'foreign_table_where' => 'AND {#tx_styleguide_staticdata}.{#value_1} LIKE \'%foo%\' ORDER BY uid',
                'foreign_table_prefix' => 'A prefix: ',
                'appearance' => [
                    'expandAll' => true
                ]
            ],
        ],
        'select_tree' => [
            'label' => 'select_tree',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'items' => [
                    [ 'static from tca 4711', 4711 ],
                    [ 'static from tca 4712', 4712 ],
                ],
                'treeConfig' => [
                    'parentField' => 'pid',
                    'appearance' => [
                        'expandAll' => false,
                        'showHeader' => true,
                    ],
                ],
            ],
        ],
        'select_multipleSideBySide' => [
            'label' => 'select_multipleSideBySide',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND {#pages}.{#sys_language_uid} = 0 ORDER BY pages.sorting LIMIT 10',
                'items' => [
                    [ 'static from tca 4711', 4711 ],
                    [ 'static from tca 4712', 4712 ],
                ],
                'multiSelectFilterItems' => [
                    ['', ''],
                    ['4711', '4711'],
                    ['4712', '4712'],
                ],
                'fieldControl' => [
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => '
                --div--;General,
                    --palette--;;input,
                    --palette--;;slug,
                    --palette--;;check,
                    --palette--;;radio,
                    --palette--;;none,
                    --palette--;;group,
                    --palette--;;groupFile,
                    --palette--;;imageManipulation,
                    --palette--;;language,
                    --palette--;;category,
                --div--;Text,
                    --palette--;;text,
                --div--;Select,
                    --palette--;;select,
                --div--;Meta,
                    sys_language_uid, l10n_parent, l10n_source,
            ',
        ],
    ],

    'palettes' => [
        'input' => [
            'showitem' => 'input,input_colorpicker,--linebreak--,input_datetime,input_link',
            'label' => 'type=input'
        ],
        'slug' => [
            'showitem' => 'slug',
            'label' => 'type=slug'
        ],
        'check' => [
            'showitem' => 'checkbox,checkbox_toggle,checkbox_labeled_toggle',
            'label' => 'type=check'
        ],
        'radio' => [
            'showitem' => 'radio',
            'label' => 'type=radio'
        ],
        'none' => [
            'showitem' => 'none',
            'label' => 'type=none'
        ],
        'group' => [
            'showitem' => 'group,group_folder',
            'label' => 'type=group'
        ],
        'groupFile' => [
            'showitem' => 'group_file',
            'isHiddenPalette' => true
        ],
        'imageManipulation' => [
            'showitem' => 'image_manipulation',
            'label' => 'type=imageManipulation'
        ],
        'language' => [
            'showitem' => 'language',
            'label' => 'type=language'
        ],
        'category' => [
            'showitem' => 'category_11,category_1n',
            'label' => 'type=category'
        ],
        'text' => [
            'showitem' => 'text,--linebreak--,text_rte,--linebreak--,text_belayoutwizard,--linebreak--,text_t3editor,--linebreak--,text_table',
            'labek' => 'type=text'
        ],
        'select' => [
            'showitem' => 'select_single,select_single_box,--linebreak--,select_checkbox,select_tree,--linebreak--,select_multipleSideBySide',
            'label' => 'type=select'
        ],
    ]
];
