<?php
return [
    'ctrl' => [
        'title' => 'Form engine elements - select',
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
                'foreign_table' => 'tx_styleguide_elements_select',
                'foreign_table_where' => 'AND tx_styleguide_elements_select.pid=###CURRENT_PID### AND tx_styleguide_elements_select.sys_language_uid IN (-1,0)',
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
                'foreign_table_where' => 'AND tx_styleguide_elements_select.pid=###CURRENT_PID### AND tx_styleguide_elements_select.uid!=###THIS_UID###',
                'default' => 0
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],

        'select_single_1' => [
            'exclude' => 1,
            'label' => 'select_single_1 two items, long text',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'foo and this here is very long text that maybe does not really fit into the form in one line.'
                            . ' Ok let us add even more text to see how this looks like if wrapped. Is this enough now? No?'
                            . ' Then let us add some even more useless text here!',
                        1
                    ],
                    ['bar', 'bar'],
                ],
            ],
        ],
        'select_single_2' => [
            'exclude' => 1,
            'label' => 'select_single_2 itemsProcFunc',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['foo', 1],
                    ['bar', 'bar'],
                ],
                'itemsProcFunc' => 'TYPO3\\CMS\\Styleguide\\UserFunctions\\FormEngine\\TypeSelect2ItemsProcFunc->itemsProcFunc',
            ],
        ],
        'select_single_3' => [
            'exclude' => 1,
            'label' => 'select_single_3 static values, dividers, foreign_table_where',
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
                'foreign_table_where' => 'AND tx_styleguide_staticdata.value_1 LIKE \'%foo%\' ORDER BY uid',
                // @todo: docu of rootLevel says, foreign_table_where is *ignored*, which is NOT true.
                'rootLevel' => 1,
                'foreign_table_prefix' => 'A prefix: ',
            ],
        ],
        'select_single_4' => [
            'exclude' => 1,
            'label' => 'select_single_4 items with icons',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['foo 1', 'foo1', 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg'],
                    ['foo 2', 'foo2', 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg'],
                ],
            ],
        ],
        'select_single_5' => [
            'exclude' => 1,
            'label' => 'select_single_5 selectIcons, items with icons',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['foo 1', 'foo1', 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg'],
                    ['foo 2', 'foo2', 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg'],
                ],
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
        'select_single_7' => [
            'exclude' => 1,
            'label' => 'select_single_7 fileFolder, dummy first entry, selectIcons',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'fileFolder' => 'EXT:styleguide/Resources/Public/Icons',
                'fileFolder_extList' => 'svg',
                'fileFolder_recursions' => 1,
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
        'select_single_8' => [
            'exclude' => 1,
            'label' => 'select_single_8 drop down with empty div',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['First div with items', '--div--'],
                    ['item 1', 1],
                    ['item 2', 2],
                    ['Second div without items', '--div--'],
                    ['Third div with items', '--div--'],
                    ['item 3', 3],
                ],
            ],
        ],
        // @todo: selectSingle with size > 1 overlaps with selectSingleBox, except that only one item can be selected
        'select_single_10' => [
            'exclude' => 1,
            'label' => 'select_single_10 size=6, three options',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['a divider', '--div--'],
                    ['foo 3', 3],
                ],
                'size' => 6,
            ],
        ],
        'select_single_11' => [
            'exclude' => 1,
            'label' => 'select_single_11 size=2, two options',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                ],
                'size' => 2,
            ],
        ],
        'select_single_12' => [
            'exclude' => 1,
            'label' => 'select_single_12 foreign_table selicon_field',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_styleguide_elements_select_single_12_foreign',
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
        'select_single_13' => [
            'exclude' => 1,
            'label' => 'select_single_13 l10n_display=defaultAsReadonly',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['foo', 'foo'],
                    ['bar', 'bar'],
                ],
            ],
        ],


        'select_singlebox_1' => [
            'exclude' => 1,
            'label' => 'select_singlebox_1',
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
            ],
        ],


        'select_checkbox_1' => [
            'exclude' => 1,
            'label' => 'select_checkbox_1',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['foo 3', 3],
                ],
            ],
        ],
        'select_checkbox_2' => [
            'exclude' => 1,
            'label' => 'select_checkbox_2, maxitems=1',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'maxitems' => 1,
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['foo 3', 3],
                ],
            ],
        ],
        'select_checkbox_3' => [
            'exclude' => 1,
            'label' => 'select_checkbox_3 icons, description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['foo 1', 1, '', 'optional description'],
                    ['foo 2', 2, 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg', 'description'],
                    ['foo 3', 3, 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg'],
                    ['foo 4', 4],
                ],
            ],
        ],


        'select_multiplesidebyside_1' => [
            'exclude' => 1,
            'label' => 'select_multiplesidebyside_1 autoSizeMax=5, size=3',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['a divider', '--div--'],
                    ['foo 3', 3],
                    ['foo 4', 4],
                    ['foo 5', 5],
                    ['foo 6', 6],
                ],
                'size' => 3,
                'autoSizeMax' => 5,
                'multiple' => true,
            ],
        ],
        'select_multiplesidebyside_2' => [
            'exclude' => 1,
            'label' => 'select_multiplesidebyside_2 exclusiveKeys=1,2',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => [
                    ['two exclusive items', '--div--'],
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['casual multiple items', '--div--'],
                    ['foo 3', 3],
                    ['foo 4', 4],
                    ['foo 5', 5],
                    ['foo 6', 6],
                ],
                'multiple' => true,
                'exclusiveKeys' => '1,2',
            ],
        ],
        'select_multiplesidebyside_3' => [
            'exclude' => 1,
            'label' => 'select_multiplesidebyside_3 itemListStyle, selectedListStyle',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['foo 3', 3],
                ],
                'itemListStyle' => 'width:250px;background-color:#ffcccc;',
                'selectedListStyle' => 'width:250px;background-color:#ccffcc;',
                'size' => 2,
            ],
        ],
        'select_multiplesidebyside_4' => [
            'exclude' => 1,
            'label' => 'select_multiplesidebyside_4 enableMultiSelectFilterTextfield=true',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['foo 3', 3],
                    ['bar', 4],
                ],
                'enableMultiSelectFilterTextfield' => true,
            ],
        ],
        'select_multiplesidebyside_5' => [
            'exclude' => 1,
            'label' => 'select_multiplesidebyside_5 multiSelectFilterItems, enableMultiSelectFilterTextfield=true',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => [
                    ['foo 1', 1],
                    ['foo 2', 2],
                    ['foo 3', 3],
                    ['bar', 4],
                ],
                'enableMultiSelectFilterTextfield' => true,
                'multiSelectFilterItems' => [
                    ['', ''],
                    ['foo', 'foo'],
                    ['bar', 'bar'],
                ],
            ],
        ],
        'select_multiplesidebyside_6' => [
            'exclude' => 1,
            'label' => 'select_multiplesidebyside_6 fieldControl',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_styleguide_staticdata',
                'rootLevel' => 1,
                'size' => 5,
                'autoSizeMax' => 20,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],


        'select_tree_1' => [
            'exclude' => 1,
            'label' => 'select_tree_1 pages, showHeader=true, expandAll=true, size=20, order by sorting, static items',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'ORDER BY pages.sorting',
                'size' => 20,
                'items' => [
                    [ 'static from tca 4711', 4711 ],
                    [ 'static from tca 4712', 4712 ],
                ],
                'treeConfig' => [
                    'parentField' => 'pid',
                    'appearance' => [
                        'expandAll' => true,
                        'showHeader' => true,
                    ],
                ],
            ],
        ],
        'select_tree_2' => [
            'exclude' => 1,
            'label' => 'select_tree_2 pages, showHeader=false, nonSelectableLevels=0,1, maxitems=4, size=10',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'maxitems' => 4,
                'size' => 10,
                'treeConfig' => [
                    'parentField' => 'pid',
                    'appearance' => [
                        'expandAll' => true,
                        'showHeader' => false,
                        'nonSelectableLevels' => '0,1'
                    ],
                ],
            ],
        ],
        'select_tree_3' => [
            'exclude' => 1,
            'label' => 'select_tree_3 pages, maxLevels=1, minitems=1, maxitems=2',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'size' => 20,
                'minitems' => 1,
                'maxitems' => 2,
                'treeConfig' => [
                    'parentField' => 'pid',
                    'appearance' => [
                        'showHeader' => true,
                        'expandAll' => true,
                        'maxLevels' => 1,
                    ],
                ],
            ],
        ],
        'select_tree_4' => [
            'exclude' => 1,
            'label' => 'select_tree_4 pages, maxLevels=2, requestUpdate, expandAll=false',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'size' => 20,
                'maxitems' => 4,
                'treeConfig' => [
                    'parentField' => 'pid',
                    'appearance' => [
                        'expandAll' => false,
                        'showHeader' => true,
                        'maxLevels' => 2,
                    ],
                ],
            ],
        ],
        'select_tree_5' => [
            'exclude' => 1,
            'label' => 'select_tree_5 pages, readOnly, showHeader=true',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'size' => 20,
                'readOnly' => true,
                'maxitems' => 4,
                'treeConfig' => [
                    'parentField' => 'pid',
                    'appearance' => [
                        'showHeader' => true,
                        'expandAll' => true,
                    ],
                ],
            ],
        ],
        'select_tree_6' => [
            'exclude' => 1,
            'label' => 'select_tree_6 categories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'sys_category',
                'foreign_table_where' => 'AND (sys_category.sys_language_uid = 0 OR sys_category.l10n_parent = 0) ORDER BY sys_category.sorting',
                'size' => 20,
                'treeConfig' => [
                    'parentField' => 'parent',
                    'appearance' => [
                        'expandAll' => true,
                        'showHeader' => true,
                    ],
                ],
            ],
        ],


        'select_requestUpdate_1' => [
            'exclude' => 1,
            'label' => 'select_requestUpdate_1',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'Just an item',
                        1
                    ],
                    ['bar', 'bar'],
                    ['and yet another one', -1],
                ],
            ],
        ],


        'flex_1' => [
            'exclude' => 1,
            'label' => 'flex_1',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => '
                        <T3DataStructure>
                            <sheets>

                                <sSingle>
                                    <ROOT>
                                        <type>array</type>
                                        <TCEforms>
                                            <sheetTitle>selectSingle</sheetTitle>
                                        </TCEforms>
                                        <el>
                                            <select_single_1>
                                                <TCEforms>
                                                    <label>select_single_1</label>
                                                    <config>
                                                        <type>select</type>
                                                        <renderType>selectSingle</renderType>
                                                        <items>
                                                            <numIndex index="0">
                                                                <numIndex index="0">foo1</numIndex>
                                                                <numIndex index="1">foo1</numIndex>
                                                            </numIndex>
                                                            <numIndex index="1">
                                                                <numIndex index="0">foo2</numIndex>
                                                                <numIndex index="1">foo2</numIndex>
                                                            </numIndex>
                                                        </items>
                                                    </config>
                                                </TCEforms>
                                            </select_single_1>
                                        </el>
                                    </ROOT>
                                </sSingle>

                                <sCheckbox>
                                    <ROOT>
                                        <type>array</type>
                                        <TCEforms>
                                            <sheetTitle>selectCheckBox</sheetTitle>
                                        </TCEforms>
                                        <el>
                                            <select_checkxox_1>
                                                <TCEforms>
                                                    <label>select_checkxox_1</label>
                                                    <config>
                                                        <type>select</type>
                                                        <renderType>selectCheckBox</renderType>
                                                        <items>
                                                            <numIndex index="0">
                                                                <numIndex index="0">foo1</numIndex>
                                                                <numIndex index="1">1</numIndex>
                                                            </numIndex>
                                                            <numIndex index="1">
                                                                <numIndex index="0">foo 2</numIndex>
                                                                <numIndex index="1">2</numIndex>
                                                            </numIndex>
                                                        </items>
                                                    </config>
                                                </TCEforms>
                                            </select_checkxox_1>
                                        </el>
                                    </ROOT>
                                </sCheckbox>

                                <sTree>
                                    <ROOT>
                                        <type>array</type>
                                        <TCEforms>
                                            <sheetTitle>selectTree</sheetTitle>
                                        </TCEforms>
                                        <el>
                                            <select_tree_1>
                                                <TCEforms>
                                                    <label>select_tree_1</label>
                                                    <config>
                                                        <type>select</type>
                                                        <renderType>selectTree</renderType>
                                                        <foreign_table>pages</foreign_table>
                                                        <size>20</size>
                                                        <maxitems>4</maxitems>
                                                        <treeConfig>
                                                            <expandAll>1</expandAll>
                                                            <parentField>pid</parentField>
                                                            <appearance>
                                                                <showHeader>1</showHeader>
                                                            </appearance>
                                                        </treeConfig>
                                                    </config>
                                                </TCEforms>
                                            </select_tree_1>
                                            <select_tree_2_condition>
                                                <TCEforms>
                                                    <label>select_tree_2_condition, display select_tree_2?</label>
                                                    <config>
                                                        <type>check</type>
                                                    </config>
                                                </TCEforms>
                                            </select_tree_2_condition>
                                            <select_tree_2>
                                                <TCEforms>
                                                    <label>select_tree_2 displayCond</label>
                                                    <displayCond>FIELD:select_tree_2_condition:REQ:TRUE</displayCond>
                                                    <config>
                                                        <type>select</type>
                                                        <renderType>selectTree</renderType>
                                                        <foreign_table>pages</foreign_table>
                                                        <size>20</size>
                                                        <maxitems>4</maxitems>
                                                        <treeConfig>
                                                            <expandAll>1</expandAll>
                                                            <parentField>pid</parentField>
                                                            <appearance>
                                                                <showHeader>1</showHeader>
                                                            </appearance>
                                                        </treeConfig>
                                                    </config>
                                                </TCEforms>
                                            </select_tree_2>
                                        </el>
                                    </ROOT>
                                </sTree>

                                <sMultiplesidebyside>
                                    <ROOT>
                                        <type>array</type>
                                        <TCEforms>
                                            <sheetTitle>selectMultipleSideBySide</sheetTitle>
                                        </TCEforms>
                                        <el>
                                            <select_multiplesidebyside_1>
                                                <TCEforms>
                                                    <label>select_multiplesidebyside_1</label>
                                                    <config>
                                                        <type>select</type>
                                                        <renderType>selectMultipleSideBySide</renderType>
                                                        <foreign_table>tx_styleguide_staticdata</foreign_table>
                                                        <rootLevel>1</rootLevel>
                                                        <size>5</size>
                                                        <autoSizeMax>5</autoSizeMax>
                                                        <minitems>0</minitems>
                                                        <enableMultiSelectFilterTextfield>1</enableMultiSelectFilterTextfield>
                                                        <multiSelectFilterItems>
                                                            <numIndex index="0">
                                                                <numIndex index="0"></numIndex>
                                                                <numIndex index="1"></numIndex>
                                                            </numIndex>
                                                            <numIndex index="1">
                                                                <numIndex index="0">foo</numIndex>
                                                                <numIndex index="1">foo</numIndex>
                                                            </numIndex>
                                                            <numIndex index="2">
                                                                <numIndex index="0">bar</numIndex>
                                                                <numIndex index="1">bar</numIndex>
                                                            </numIndex>
                                                        </multiSelectFilterItems>
                                                        <fieldControl>
                                                            <editPopup>
                                                                <renderType>editPopup</renderType>
                                                            </editPopup>
                                                            <addRecord>
                                                                <renderType>addRecord</renderType>
                                                                <options>
                                                                    <pid>0</pid>
                                                                    <setValue>prepend</setValue>
                                                                </options>
                                                            </addRecord>
                                                            <listModule>
                                                                <renderType>listModule</renderType>
                                                                <options>
                                                                    <pid>0</pid>
                                                                </options>
                                                            </listModule>
                                                        </fieldControl>
                                                    </config>
                                                </TCEforms>
                                            </select_multiplesidebyside_1>
                                        </el>
                                    </ROOT>
                                </sMultiplesidebyside>

                                <sSection>
                                    <ROOT>
                                        <type>array</type>
                                        <TCEforms>
                                            <sheetTitle>section</sheetTitle>
                                        </TCEforms>
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
                                                            <select_tree_1>
                                                                <TCEforms>
                                                                    <label>select_tree_1 pages</label>
                                                                    <config>
                                                                        <type>select</type>
                                                                        <renderType>selectTree</renderType>
                                                                        <foreign_table>pages</foreign_table>
                                                                        <foreign_table_where>ORDER BY pages.sorting</foreign_table_where>
                                                                        <size>20</size>
                                                                        <treeConfig>
                                                                            <parentField>pid</parentField>
                                                                            <appearance>
                                                                                <expandAll>true</expandAll>
                                                                                <showHeader>true</showHeader>
                                                                            </appearance>
                                                                        </treeConfig>
                                                                    </config>
                                                                </TCEforms>
                                                            </select_tree_1>
                                                        </el>
                                                    </container_1>
                                                </el>
                                            </section_1>
                                        </el>
                                    </ROOT>
                                </sSection>

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
                --div--;renderType=selectSingle,
                    select_single_1, select_single_2, select_single_3, select_single_4, select_single_5,
                    select_single_7, select_single_12, select_single_8, select_single_13, select_single_10,
                    select_single_11,
                --div--;renderType=selectSingleBox,
                    select_singlebox_1,
                --div--;renderType=selectCheckBox,
                    select_checkbox_1, select_checkbox_2, select_checkbox_3,
                --div--;renderType=selectMultipleSideBySide,
                    select_multiplesidebyside_1, select_multiplesidebyside_2, select_multiplesidebyside_3,
                    select_multiplesidebyside_4, select_multiplesidebyside_5, select_multiplesidebyside_6,
                --div--;renderType=selectTree,
                    select_tree_1, select_tree_2, select_tree_3, select_tree_4, select_tree_5, select_tree_6,
                --div--;in flex,
                    flex_1,
                --div--;requestUpdate,
                    select_requestUpdate_1,
            ',
        ],
    ],


];
