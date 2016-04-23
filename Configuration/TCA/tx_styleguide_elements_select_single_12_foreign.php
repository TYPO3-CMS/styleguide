<?php
return [
    'ctrl' => [
        'title' => 'Form engine elements - select foreign single_12',
        'label' => 'group_1',
        'iconfile' => 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'default_sortby' => 'ORDER BY crdate',
        'selicon_field' => 'group_1',
        'selicon_field_path' => 'uploads/tx_styleguide',
    ],


    'columns' => [


        'sys_language_uid' => [
            'exclude' => 1,
            'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0]
                ]
            ]
        ],
        'l18n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_styleguide_forms_inline_2_child2',
                'foreign_table_where' => 'AND tx_styleguide_forms_inline_2_child2.pid=###CURRENT_PID### AND tx_styleguide_forms_inline_2_child2.sys_language_uid IN (-1,0)',
            ]
        ],
        'l18n_diffsource' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'hidden' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0'
            ],
        ],


        'group_1' => [
            'label' => 'group_1',
            'exclude' => 1,
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => 'jpg,gif,png,svg',
                'uploadfolder' => 'uploads/tx_styleguide',
                'show_thumbs' => 1,
                'size' => 1,
                'maxitems' => 1,
            ],
        ],


    ],


    'types' => [
        '0' => [
            'showitem' => 'group_1',
        ],
    ],


];
