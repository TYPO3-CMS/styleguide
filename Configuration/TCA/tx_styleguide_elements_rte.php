<?php

return [
    'ctrl' => [
        'title' => 'Form engine elements - rte',
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
        'rte_1' => [
            'label' => 'rte_1 description',
            'description' => 'field description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
            ],
        ],
        'rte_2' => [
            'label' => 'rte_2 default value',
            'config' => [
                'type' => 'text',
                'default' => 'rte_2',
                'enableRichtext' => true,
            ],
        ],
        'rte_3' => [
            'label' => 'rte_3 nullable=true',
            'config' => [
                'type' => 'text',
                'nullable' => true,
                'enableRichtext' => true,
            ],
        ],
        'rte_4' => [
            'label' => 'rte_4 richtextConfiguration=minimal',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'minimal',
            ],
        ],
        'rte_5' => [
            'label' => 'rte_5 richtextConfiguration=full',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'full',
            ],
        ],

        'rte_inline_1' => [
            'label' => 'rte_inline_1',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_elements_rte_inline_1_child',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
            ],
        ],

        'rte_flex_1' => [
            'label' => 'rte_flex_1',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => '
                        <T3DataStructure>
                            <sheets>
                                <sGeneral>
                                    <ROOT>
                                        <sheetTitle>tab</sheetTitle>
                                        <type>array</type>
                                        <el>
                                            <rte_1>
                                                <label>rte_1</label>
                                                <config>
                                                    <type>text</type>
                                                    <enableRichtext>1</enableRichtext>
                                                </config>
                                            </rte_1>
                                            <rte.2>
                                                <label>rte.2</label>
                                                <config>
                                                    <type>text</type>
                                                    <enableRichtext>1</enableRichtext>
                                                </config>
                                            </rte.2>
                                        </el>
                                    </ROOT>
                                </sGeneral>
                                <sSections>
                                    <ROOT>
                                        <sheetTitle>section</sheetTitle>
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
                                                            <rte_1>
                                                                <label>rte_1</label>
                                                                <config>
                                                                    <type>text</type>
                                                                    <enableRichtext>1</enableRichtext>
                                                                </config>
                                                            </rte_1>
                                                        </el>
                                                    </container_1>
                                                </el>
                                            </section_1>
                                        </el>
                                    </ROOT>
                                </sSections>
                                <sInline>
                                    <ROOT>
                                        <sheetTitle>inline</sheetTitle>
                                        <type>array</type>
                                        <el>
                                            <inline_1>
                                                <label>inline_1</label>
                                                <config>
                                                    <type>inline</type>
                                                    <foreign_table>tx_styleguide_elements_rte_flex_1_inline_1_child</foreign_table>
                                                    <foreign_field>parentid</foreign_field>
                                                    <foreign_table_field>parenttable</foreign_table_field>
                                                </config>
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

        'input_palette_1' => [
            'label' => 'input_palette_1',
            'config' => [
                'type' => 'input',
            ],
        ],

        'rte_palette_1' => [
            'label' => 'rte_palette_1',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
            ],
        ],

    ],

    'types' => [
        '0' => [
            'showitem' => '
                --div--;rte,
                    rte_1, rte_2, rte_3, rte_4, rte_5,
                --div--;in inline,
                    rte_inline_1,
                --div--;in flex,
                    rte_flex_1,
                --div--;in palette,
                    --palette--;palette;rte_1,
            ',
        ],
    ],

    'palettes' => [
        'rte_1' => [
            'showitem' => 'input_palette_1,--linebreak--,rte_palette_1',
        ],
    ],

];
