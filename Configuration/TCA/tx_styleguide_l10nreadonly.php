<?php

return [
    'ctrl' => [
        'title' => 'Form engine - defaultAsReadonly',
        'label' => 'uid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'iconfile' => 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],

    'columns' => [
        // type=input
        'input' => [
            'label' => 'input',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
            ],
        ],

        // type=color
        'color' => [
            'label' => 'color',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'color',
            ],
        ],

        // type=datetime
        'datetime' => [
            'label' => 'atetime',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
            ],
        ],

        // type=link
        'link' => [
            'label' => 'link',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'link',
            ],
        ],

        // type=slug
        'slug' => [
            'label' => 'slug',
            'l10n_mode' => 'exclude',
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
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['label' => 'foo'],
                    ['label' => 'bar'],
                ],
            ],
        ],
        'checkbox_toggle' => [
            'label' => 'checkbox_toggle',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => 'foo',
                        'invertStateDisplay' => true,
                    ],
                    [
                        'label' => 'bar',
                    ],
                ],
            ],
        ],
        'checkbox_labeled_toggle' => [
            'label' => 'checkbox_labeled_toggle',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxLabeledToggle',
                'items' => [
                    [
                        'label' => 'foo',
                        'labelChecked' => 'Enabled',
                        'labelUnchecked' => 'Disabled',
                        'invertStateDisplay' => true,
                    ],
                    [
                        'label' => 'bar',
                        'labelChecked' => 'Enabled',
                        'labelUnchecked' => 'Disabled',
                    ],
                ],
            ],
        ],

        // type=radio
        'radio' => [
            'label' => 'radio',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'radio',
                'items' => [
                    ['label' => 'foo', 'value' => 1],
                    ['label' => 'bar', 'value' => 2],
                ],
            ],
        ],

        // type=none
        'none' => [
            'label' => 'none',
            'l10n_mode' => 'exclude',
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
            'l10n_mode' => 'exclude',
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
        'group_mm' => [
            'label' => 'group_mm',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'allowed' => 'pages',
                'MM' => 'tx_styleguide_l10nreadonly_group_mm',
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
        'group_file' => [
            'label' => 'group_file',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'allowed' => 'sys_file',
            ],
        ],

        'folder' => [
            'label' => 'group_folder',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'folder',
            ],
        ],

        // type=imageManipulation
        'image_manipulation' => [
            'label' => 'image_manipulation',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'imageManipulation',
                'file_field' => 'group_file',
            ],
        ],

        // type=language
        'language' => [
            'label' => 'language',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'language',
            ],
        ],

        // type=category
        'category_11' => [
            'label' => 'category_11',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'category',
                'relationship' => 'oneToOne',
            ],
        ],
        'category_1n' => [
            'label' => 'category_1n',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'category',
                'relationship' => 'oneToMany',
            ],
        ],
        'category_mm' => [
            'label' => 'category_mm',
            // TcaPreparation sets exclude by default, but styleguide has no individual exclude fields
            'exclude' => false,
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'category',
            ],
        ],

        // type=text
        'text' => [
            'label' => 'text',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'text',
            ],
        ],
        'text_rte' => [
            'label' => 'text_table',
            'l10n_mode' => 'exclude',
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
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'text',
                'renderType' => 'belayoutwizard',
            ],
        ],
        'text_t3editor' => [
            'label' => 'text_t3editor',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'text',
                'renderType' => 'codeEditor',
                'format' => 'html',
                'rows' => 5,
            ],
        ],
        'text_table' => [
            'label' => 'text_table',
            'l10n_mode' => 'exclude',
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
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'Static values', 'value' => '--div--'],
                    ['label' => 'static -2', 'value' => -2],
                    ['label' => 'static -1', 'value' => -1],
                    ['label' => 'DB values', 'value' => '--div--'],
                ],
                'foreign_table' => 'tx_styleguide_staticdata',
                'foreign_table_where' => 'AND {#tx_styleguide_staticdata}.{#value_1} LIKE \'%foo%\' ORDER BY uid',
                'foreign_table_prefix' => 'A prefix: ',
            ],
        ],
        'select_single_box' => [
            'label' => 'select_single_box',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'items' => [
                    ['label' => 'Static values', 'value' => '--div--'],
                    ['label' => 'static -2', 'value' => -2],
                    ['label' => 'static -1', 'value' => -1],
                    ['label' => 'DB values', 'value' => '--div--'],
                ],
                'foreign_table' => 'tx_styleguide_staticdata',
                'foreign_table_where' => 'AND {#tx_styleguide_staticdata}.{#value_1} LIKE \'%foo%\' ORDER BY uid',
                'foreign_table_prefix' => 'A prefix: ',
            ],
        ],
        'select_checkbox' => [
            'label' => 'select_checkbox',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['label' => 'Static values', 'value' => '--div--'],
                    ['label' => 'static -2', 'value' => -2],
                    ['label' => 'static -1', 'value' => -1],
                    ['label' => 'DB values', 'value' => '--div--'],
                ],
                'foreign_table' => 'tx_styleguide_staticdata',
                'foreign_table_where' => 'AND {#tx_styleguide_staticdata}.{#value_1} LIKE \'%foo%\' ORDER BY uid',
                'foreign_table_prefix' => 'A prefix: ',
                'appearance' => [
                    'expandAll' => true,
                ],
            ],
        ],
        'select_tree' => [
            'label' => 'select_tree',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'items' => [
                    ['label' => 'static from tca 4711', 'value' => 4711],
                    ['label' => 'static from tca 4712', 'value' => 4712],
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
        'select_tree_mm' => [
            'label' => 'select_tree_mm',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'MM' => 'tx_styleguide_l10nreadonly_select_tree_mm',
                'items' => [
                    ['label' => 'static from tca 4711', 'value' => 4711],
                    ['label' => 'static from tca 4712', 'value' => 4712],
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
        'select_multiplesidebyside' => [
            'label' => 'select_multiplesidebyside',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND {#pages}.{#sys_language_uid} = 0 ORDER BY pages.sorting LIMIT 10',
                'items' => [
                    ['label' => 'static from tca 4711', 'value' => 4711],
                    ['label' => 'static from tca 4712', 'value' => 4712],
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
        'select_multiplesidebyside_mm' => [
            'label' => 'select_multiplesidebyside_mm',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_styleguide_staticdata',
                'MM' => 'tx_styleguide_l10nreadonly_select_multiplesidebyside_mm',
                'items' => [
                    ['label' => 'static from tca 4711', 'value' => 4711],
                    ['label' => 'static from tca 4712', 'value' => 4712],
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

        // type=inline
        'inline' => [
            'label' => 'inline',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_l10nreadonly_inline_child',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
            ],
        ],

        // type=flex
        // @todo Flex does not implement readOnly at all
        'flex' => [
            'label' => 'flex',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => '
<T3DataStructure>
    <sheets>
        <sDEF>
            <ROOT>
                <sheetTitle>Sheet Title</sheetTitle>
                <type>array</type>
                <el>
                    <input>
                        <label>input</label>
                        <config>
                            <type>input</type>
                        </config>
                    </input>
                </el>
            </ROOT>
        </sDEF>
    </sheets>
</T3DataStructure>
                    ',
                ],
            ],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => '
                --div--;General,
                    --palette--;;input,
                    --palette--;;link,
                    --palette--;;slug,
                    --palette--;;check,
                    --palette--;;radio,
                    --palette--;;none,
                    --palette--;;group,
                    --palette--;;groupFile,
                    --palette--;;folder,
                    --palette--;;imageManipulation,
                    --palette--;;language,
                    --palette--;;category,
                --div--;Text,
                    --palette--;;text,
                --div--;Select,
                    --palette--;;select,
                --div--;Inline,
                    --palette--;;inline,
                --div--;Flex,
                    --palette--;;flex,
                --div--;Meta,
                    sys_language_uid, l10n_parent, l10n_source,
            ',
        ],
    ],

    'palettes' => [
        'input' => [
            'showitem' => 'input,color,--linebreak--,datetime',
            'label' => 'type=input',
        ],
        'link' => [
            'showitem' => 'link',
            'label' => 'type=link',
        ],
        'slug' => [
            'showitem' => 'slug',
            'label' => 'type=slug',
        ],
        'check' => [
            'showitem' => 'checkbox,checkbox_toggle,checkbox_labeled_toggle',
            'label' => 'type=check',
        ],
        'radio' => [
            'showitem' => 'radio',
            'label' => 'type=radio',
        ],
        'none' => [
            'showitem' => 'none',
            'label' => 'type=none',
        ],
        'group' => [
            'showitem' => 'group,group_mm,--linebreak--,group_folder',
            'label' => 'type=group',
        ],
        'groupFile' => [
            'showitem' => 'group_file',
            'isHiddenPalette' => true,
        ],
        'folder' => [
            'showitem' => 'folder',
            'label' => 'type=folder',
        ],
        'imageManipulation' => [
            'showitem' => 'image_manipulation',
            'label' => 'type=imageManipulation',
        ],
        'language' => [
            'showitem' => 'language',
            'label' => 'type=language',
        ],
        'category' => [
            'showitem' => 'category_11,category_1n,category_mm',
            'label' => 'type=category',
        ],
        'text' => [
            'showitem' => 'text,--linebreak--,text_rte,--linebreak--,text_belayoutwizard,--linebreak--,text_t3editor,--linebreak--,text_table',
            'labek' => 'type=text',
        ],
        'select' => [
            'showitem' => '
                select_single,select_single_box,
                --linebreak--,select_checkbox,
                --linebreak--,select_tree,select_tree_mm,
                --linebreak--,select_multiplesidebyside,
                --linebreak--,select_multiplesidebyside_mm
            ',
            'label' => 'type=select',
        ],
        'inline' => [
            'showitem' => 'inline',
            'label' => 'type=inline',
        ],
        'flex' => [
            'showitem' => 'flex',
            'label' => 'type=flex',
        ],
    ],
];
