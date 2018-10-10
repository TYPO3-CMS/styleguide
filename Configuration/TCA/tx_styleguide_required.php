<?php
return [
    'ctrl' => [
        'title' => 'Form engine - required',
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
                ]
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'Translation parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_styleguide_required',
                'foreign_table_where' => 'AND {#tx_styleguide_required}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_required}.{#sys_language_uid} IN (-1,0)',
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

        'notrequired_1' => [
            'exclude' => 1,
            'label' => 'notrequired_1',
            'config' => [
                'type' => 'input',
            ],
        ],


        'input_1' => [
            'exclude' => 1,
            'label' => 'input_1 eval=required',
            'config' => [
                'type' => 'input',
                'max' => 23,
                'eval' => 'required',
            ],
        ],
        'input_2' => [
            'exclude' => 1,
            'label' => 'input_2 eval=required,trim,date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'trim,required,date',
            ],
        ],
        'input_3' => [
            'exclude' => 1,
            'label' => 'input_3 eval=required, renderType inputLink',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 60,
                'eval' => 'trim,required',
            ],
        ],


        'text_1' => [
            'exclude' => 1,
            'label' => 'text_1 eval=required',
            'config' => [
                'type' => 'text',
                'eval' => 'required',
            ],
        ],


        'select_1' => [
            'exclude' => 1,
            'label' => 'select_1 selectMultipleSideBySide, minitems=2, maxitems=5',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 3,
                'maxitems' => 5,
                'minitems' => 2,
                'items' => [
                    ['foo1', 1],
                    ['foo2', 2],
                    ['foo3', 3],
                    ['foo4', 4],
                    ['foo5', 5],
                    ['foo6', 6],
                ],
            ],
        ],
        'select_2' => [
            'exclude' => 1,
            'label' => 'select_2 selectSingle, minitems=1, maxitems=1',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['foo1', 1],
                    ['foo2', 2],
                    ['foo3', 3],
                ],
                // combination size > 1 & maxitems 1 triggers "singlebox" mode
                'size' => 2,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'select_3' => [
            'exclude' => 1,
            'label' => 'select_3, selectSingleBox, minitems=1, maxitems=2',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['divider', '--div--'],
                    ['foo 3', 3],
                    ['foo 4', 4],
                ],
                'minitems' => 1,
                'maxitems' => 2,
            ],
        ],
        'select_4' => [
            'exclude' => 1,
            'label' => 'select_4 selectCheckBox, minitems=1, maxitems=2',
            'config' => [
                'type' => 'select',
                // @todo: required handling on this type does not work yet
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['foo1', 1],
                    ['foo2', 2],
                    ['foo3', 3],
                ],
                'minitems' => 1,
                // @todo: maxitems does not work?
                'maxitems' => 2,
            ],
        ],
        'select_5' => [
            'exclude' => 1,
            'label' => 'select_5 selectTree, minitems=1, maxitems=3',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'size' => 20,
                'minitems' => 1,
                'maxitems' => 3,
                'treeConfig' => [
                    'expandAll' => true,
                    'parentField' => 'pid',
                    'appearance' => [
                        'showHeader' => true,
                    ],
                ],
            ],
        ],


        'group_1' => [
            'exclude' => 1,
            'label' => 'group_1 db, minitems=1, maxitems=3',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_styleguide_staticdata',
                'minitems' => 1,
                'maxitems' => 3,
            ],
        ],
        'group_2' => [
            'exclude' => 1,
            'label' => 'group_2 db, minitems = 1, maxitems=1, size=1',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_styleguide_staticdata',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],


        'rte_1' => [
            'exclude' => 1,
            'label' => 'rte_1 eval=required',
            'config' => [
                'type' => 'text',
                'eval' => 'required',
                'rows' => '15',
                'cols' => '80',
                'enableRichtext' => true,
            ],
        ],
        'rte_2' => [
            'exclude' => 1,
            'label' => 'rte_2 inline',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_required_rte_2_child',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
            ],
        ],


        'inline_1' => [
            'exclude' => 1,
            'label' => 'inline_1 minitems=1, maxitems=1',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_required_inline_1_child',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'inline_2' => [
            'exclude' => 1,
            'label' => 'inline_2 required field in inline child',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_required_inline_2_child',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
            ],
        ],
        'inline_3' => [
            'exclude' => 1,
            'label' => 'inline_3 minitems=1, maxitems=3, required field in inline child',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_required_inline_3_child',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'minitems' => 1,
                'maxitems' => 3,
            ],
        ],


        'flex_1' => [
            'exclude' => 1,
            'label' => 'flex_1 required field in flex',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => '
                        <T3DataStructure>
                            <ROOT>
                                <type>array</type>
                                <el>
                                    <text_1>
                                        <TCEforms>
                                            <label>text required</label>
                                            <config>
                                                <type>text</type>
                                                <eval>required</eval>
                                            </config>
                                        </TCEforms>
                                    </text_1>
                                </el>
                            </ROOT>
                        </T3DataStructure>
                    ',
                ],
            ],
        ],
        'flex_2' => [
            'exclude' => 1,
            'label' => 'flex_2 tabs, section container, inline',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => '
                        <T3DataStructure>
                            <sheets>
                                <sGeneral>
                                    <ROOT>
                                        <TCEforms>
                                            <sheetTitle>tab</sheetTitle>
                                        </TCEforms>
                                        <type>array</type>
                                        <el>
                                            <input_1>
                                                <TCEforms>
                                                    <label>input_1, eval=required</label>
                                                    <config>
                                                        <type>input</type>
                                                        <eval>required</eval>
                                                    </config>
                                                </TCEforms>
                                            </input_1>
                                        </el>
                                    </ROOT>
                                </sGeneral>
                                <sSections>
                                    <ROOT>
                                        <TCEforms>
                                            <sheetTitle>section</sheetTitle>
                                        </TCEforms>
                                        <type>array</type>
                                        <el>
                                            <section_1>
                                                <title>section_1</title>
                                                <type>array</type>
                                                <section>1</section>
                                                <el>
                                                    <container_1>
                                                        <type>array</type>
                                                        <title>container_1</title>
                                                        <el>
                                                            <input_1>
                                                                <TCEforms>
                                                                    <label>input_1, eval=required</label>
                                                                    <config>
                                                                        <type>input</type>
                                                                        <eval>required</eval>
                                                                    </config>
                                                                </TCEforms>
                                                            </input_1>
                                                        </el>
                                                    </container_1>
                                                </el>
                                            </section_1>
                                        </el>
                                    </ROOT>
                                </sSections>
                                <sInline>
                                    <ROOT>
                                        <TCEforms>
                                            <sheetTitle>inline</sheetTitle>
                                        </TCEforms>
                                        <type>array</type>
                                        <el>
                                            <inline_1>
                                                <TCEforms>
                                                    <label>inline_1 required field in inline child</label>
                                                    <config>
                                                        <type>inline</type>
                                                        <foreign_table>tx_styleguide_required_flex_2_inline_1_child</foreign_table>
                                                        <foreign_field>parentid</foreign_field>
                                                        <foreign_table_field>parenttable</foreign_table_field>
                                                    </config>
                                                </TCEforms>
                                            </inline_1>
                                        </el>
                                    </ROOT>
                                </sInline>
                            </sheets>
                        </T3DataStructure>
                    ',
                ],
            ],
        ],


        'palette_input_1' => [
            'exclude' => 1,
            'label' => 'palette_input_1 eval=required',
            'config' => [
                'type' => 'input',
                'eval' => 'required',
            ],
        ],
        'palette_input_2' => [
            'exclude' => 1,
            'label' => 'palette_input_2 eval=required',
            'config' => [
                'type' => 'input',
                'eval' => 'required',
            ],
        ],


    ],


    'types' => [
        '0' => [
            'showitem' => '
                --div--;not required,
                    notrequired_1,
                --div--;Input,
                    input_1, input_2, input_3,
                --div--;Text,
                    text_1,
                --div--;Rte,
                    rte_1, rte_2,
                --div--;Select,
                    select_1, select_2, select_3, select_4, select_5,
                --div--;Group,
                    group_1, group_2,
                --div--;Inline,
                    inline_1, inline_2, inline_3,
                --div--;Flex,
                    flex_1, flex_2,
                --div--;palette,
                    --palette--;palette_1;palette_1,
            ',
        ],
    ],


    'palettes' => [
        'palette_1' => [
            'showitem' => 'palette_input_1, palette_input_2',
        ],
    ],


];
