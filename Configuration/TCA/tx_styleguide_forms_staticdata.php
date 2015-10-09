<?php
return array(
    'ctrl' => array(
        'title' => 'Form engine tests - static data',
        'label' => 'value_1',
        'rootLevel' => 1,
        'iconfile' => 'EXT:styleguide/Resources/Public/Icons/tx_styleguide_forms_staticdata.svg',
    ),

    'columns' => array(
        'value_1' => array(
            'label' => 'Value',
            'config' => array(
                'type' => 'input',
                'size' => 10,
            ),
        ),
    ),

    'interface' => array(
        'showRecordFieldList' => 'value_1',
    ),

    'types' => array(
        '0' => array(
            'showitem' => 'value_1',
        ),
    ),
);
