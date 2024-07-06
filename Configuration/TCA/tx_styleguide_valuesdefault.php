<?php

return [
    'ctrl' => [
        'title' => 'Form engine - default values new records',
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
        'input_1' => [
            'label' => 'input_1 default=Default value"',
            'config' => [
                'type' => 'input',
                'default' => 'Default value',
            ],
        ],
        'input_2' => [
            'label' => 'input_26 default=0, eval=datetime, readonly=1',
            'config' => [
                'type' => 'datetime',
                'readOnly' => 1,
                'default' => 0,
            ],
        ],

        'number_1' => [
            'label' => 'number_1 default=3, range lower=2, range upper=7',
            'config' => [
                'type' => 'number',
                'range' => [
                    'lower' => 2,
                    'upper' => 7,
                ],
                'default' => 3,
            ],
        ],

        'text_1' => [
            'label' => 'text_12 default="text_12"',
            'config' => [
                'type' => 'text',
                'default' => 'text_12',
            ],
        ],

        'checkbox_1' => [
            'label' => 'checkbox_1 default=1',
            'config' => [
                'type' => 'check',
                'default' => 1,
            ],
        ],
        'checkbox_2' => [
            'label' => 'checkbox_2 default=1, one checkbox with label',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['label' => 'foo'],
                ],
                'default' => 1,
            ],
        ],
        'checkbox_3' => [
            'label' => 'checkbox_3 default=5, four checkboxes, 1 and 3 pre-selected',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['label' => 'foo1'],
                    ['label' => 'foo2'],
                    ['label' => 'foo3'],
                    ['label' => 'foo4'],
                ],
                'default' => 5,
            ],
        ],
        'checkbox_4' => [
            'label' => 'checkbox_4 cols=inline, "MO" and "WE" pre-selected',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['label' => 'Mo'],
                    ['label' => 'Tu'],
                    ['label' => 'We'],
                    ['label' => 'Th'],
                    ['label' => 'Fr'],
                    ['label' => 'Sa'],
                    ['label' => 'Su'],
                ],
                'cols' => 'inline',
                'default' => 5,
            ],
        ],

        'radio_1' => [
            'label' => 'radio_1 default=2, three options, second pre-selected',
            'config' => [
                'type' => 'radio',
                'items' => [
                    ['label' => 'foo1', 'value' => 1],
                    ['label' => 'foo2', 'value' => 2],
                    ['label' => 'foo3', 'value' => 3],
                ],
                'default' => 2,
            ],
        ],
        'radio_2' => [
            'label' => 'radio_2 default=y, three options, second pre-selected',
            'config' => [
                'type' => 'radio',
                'items' => [
                    ['label' => 'foo1', 'value' => 'x'],
                    ['label' => 'foo2', 'value' => 'y'],
                    ['label' => 'foo3', 'value' => 'z'],
                ],
                'default' => 'y',
            ],
        ],
        'radio_3' => [
            'label' => 'radio_3 empty default',
            'config' => [
                'type' => 'radio',
                'items' => [
                    ['label' => 'foo1', 'value' => 'x'],
                    ['label' => 'foo2', 'value' => 'y'],
                    ['label' => 'foo3', 'value' => 'z'],
                ],
                'default' => '',
            ],
        ],

        // @todo add default value examples for type=none

        'select_1' => [
            'label' => 'select_1 default=2, renderType=selectSingle, three items, second pre-selected',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'foo1', 'value' => 1],
                    ['label' => 'foo2', 'value' => 2],
                    ['label' => 'foo3', 'value' => 4],
                ],
                'default' => 2,
            ],
        ],
        'select_2' => [
            'label' => 'select_2 default=1,3 renderType=selectCheckBox',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['label' => 'foo 1', 'value' => 1],
                    ['label' => 'foo 2', 'value' => 2],
                    ['label' => 'foo 3', 'value' => 3],
                    ['label' => 'foo 4', 'value' => 4],
                ],
                'default' => '1,3',
            ],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => '
                --div--;basic,
                    input_1, input_2,
                    number_1,
                    text_1,
                    checkbox_1, checkbox_2, checkbox_3, checkbox_4,
                    radio_1, radio_2, radio_3,
                --div--;select,
                    select_1,select_2,
            ',
        ],
    ],

];
