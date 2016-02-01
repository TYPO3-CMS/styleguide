<?php
return array(
    'ctrl' => array(
        'title' => 'Form engine tests - Top record',
        'label' => 'uid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'default_sortby' => 'ORDER BY crdate',
        'iconfile' => 'EXT:styleguide/Resources/Public/Icons/tx_styleguide_forms.svg',

        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',

        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),

        'type' => 'type_field',
    ),

    'columns' => array(
        'hidden' => array(
            'exclude' => 1,
            'config' => array(
                'type' => 'check',
                'items' => array(
                    '1' => array(
                        '0' => 'Disable',
                    ),
                ),
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'label' => 'Publish Date',
            'config' => array(
                'type' => 'input',
                'size' => '13',
                'max' => '20',
                'eval' => 'datetime',
                'default' => '0'
            ),
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ),
        'endtime' => array(
            'exclude' => 1,
            'label' => 'Expiration Date',
            'config' => array(
                'type' => 'input',
                'size' => '13',
                'max' => '20',
                'eval' => 'datetime',
                'default' => '0',
                'range' => array(
                    'upper' => mktime(0, 0, 0, 12, 31, 2020)
                )
            ),
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ),


        'type_field' => array(
            'exclude' => 1,
            'label' => 'TYPE FIELD',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('type standard', '0'),
                    array('type test', 'test'),
                ),
            ),
        ),


        'select_1' => array(
            'exclude' => 1,
            'label' => 'SELECT: 1 Two items, one with really long text',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('foo and this here is very long text that maybe does not really fit into the form in one line. Ok let us add even more text to see how this looks like if wrapped. Is this enough now? No? Then let us add some even more useless text here!', 1),
                    array('bar', 'bar'),
                ),
            ),
        ),
        'select_2' => array(
            'exclude' => 1,
            'label' => 'SELECT: 2 itemsProcFunc',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('foo', 1),
                    array('bar', 'bar'),
                ),
                'itemsProcFunc' => 'TYPO3\\CMS\\Styleguide\\UserFunctions\\FormEngine\\TypeSelect2ItemsProcFunc->itemsProcFunc',
            ),
        ),
        'select_33' => array(
            'exclude' => 1,
            'label' => 'SELECT: 33 itemsProcFunc with maxitems > 1',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'maxitems' => 42,
                'items' => array(
                    array('foo', 1),
                    array('bar', 'bar'),
                ),
                'itemsProcFunc' => 'TYPO3\\CMS\\Styleguide\\UserFunctions\\FormEngine\\TypeSelect33ItemsProcFunc->itemsProcFunc',
            ),
        ),
        'select_34' => array(
            'exclude' => 1,
            'label' => 'SELECT: 34 maxitems=1, renderType=selectSingleBox',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'items' => array(
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('foo 3', 3),
                    array('foo 4', 4),
                    array('foo 5', 5),
                    array('foo 6', 6),
                ),
                'maxitems' => 1,
            ),
        ),
        'select_3' => array(
            'exclude' => 1,
            'label' => 'SELECT: 3 Three items, second pre-selected, size=2',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('foo1', 1),
                    array('foo2', 2),
                    array('foo3', 4),
                ),
                'default' => 2,
            ),
        ),
        'select_4' => array(
            'exclude' => 1,
            'label' => 'SELECT: 4 Static values, dividers, merged with entries from staticdata table containing word "foo"',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('Static values', '--div--'),
                    array('static -2', -2),
                    array('static -1', -1),
                    array('DB values', '--div--'),
                ),
                'foreign_table' => 'tx_styleguide_forms_staticdata',
                'foreign_table_where' => 'AND tx_styleguide_forms_staticdata.value_1 LIKE \'%foo%\' ORDER BY uid',
                'rootLevel' => 1, // @TODO: docu of rootLevel says, foreign_table_where is *ignored*, which is NOT true.
                'foreign_table_prefix' => 'A prefix: ',
            ),
        ),
        'select_5' => array(
            'exclude' => 1,
            'label' => 'SELECT: 5 Items with icons',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('Icon using EXT:', 'foo', 'EXT:styleguide/Resources/Public/Icons/tx_styleguide_forms.svg'),
                    array('Icon from typo3/gfx', 'es', 'flags/es.gif'), // @TODO: docu says typo3/sysext/t3skin/icons/gfx/, but in fact it is typo3/gfx.
                ),
            ),
        ),
        'select_7' => array(
            'exclude' => 1,
            'label' => 'SELECT: 7 Items with icons, showIconTable',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('Icon using EXT:', 'foo', 'EXT:styleguide/Resources/Public/Icons/tx_styleguide_forms.svg'),
                    array('Icon from typo3/gfx', 'es', 'flags/es.gif'),
                ),
                'showIconTable' => true,
            ),
        ),
        'select_8' => array(
            'exclude' => 1,
            'label' => 'SELECT: 8 Items with icons, showIconTable, selicon_cols set to 3',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('foo1', 'es', 'flags/es.gif'),
                    array('foo2', 'fr', 'flags/fr.gif'),
                    array('foo3', 'de', 'flags/de.gif'),
                    array('foo4', 'us', 'flags/us.gif'),
                    array('foo5', 'gr', 'flags/gr.gif'),
                ),
                'showIconTable' => true,
                'selicon_cols' => 3,
            ),
        ),
        'select_9' => array(
            'exclude' => 1,
            'label' => 'SELECT: 9 fileFolder Icons from EXT:styleguide/Resources/Public/Icons and a dummy first entry, showIconTable, two columns',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('', 0),
                ),
                'fileFolder' => 'EXT:styleguide/Resources/Public/Icons',
                'fileFolder_extList' => 'png',
                'fileFolder_recursions' => 1,
                'showIconTable' => true,
                'selicon_cols' => 2,
            ),
        ),
        'select_10' => array(
            'exclude' => 1,
            'label' => 'SELECT: 10 three options, size=6',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('foo1', 1),
                    array('foo2', 2),
                    array('a divider', '--div--'),
                    array('foo3', 3),
                ),
                'size' => 6,
            ),
        ),
        'select_11' => array(
            'exclude' => 1,
            'label' => 'SELECT: 11 two options, size=2',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('foo1', 1),
                    array('foo2', 2),
                ),
                'size' => 2,
            ),
        ),
        'select_12' => array(
            'exclude' => 1,
            'label' => 'SELECT: 12 multiple, autoSizeMax=4, size=3',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => array(
                    array('foo1', 1),
                    array('foo2', 2),
                    array('a divider', '--div--'),
                    array('foo3', 3),
                    array('foo4', 4),
                    array('foo5', 5),
                    array('foo6', 6),
                ),
                'size' => 3,
                'autoSizeMax' => 5,
                'maxitems' => 5,
                'minitems' => 0,
                'multiple' => true, // @TODO: multiple does not seem to have any effect at all? Can be commented without change.
            ),
        ),
        'select_13' => array(
            'exclude' => 1,
            'label' => 'SELECT: 13 multiple, exclusiveKeys for 1 and 2',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => array(
                    array('exclusive', '--div--'),
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('multiple', '--div--'),
                    array('foo 3', 3),
                    array('foo 4', 4),
                    array('foo 5', 5),
                    array('foo 6', 6),
                ),
                'multiple' => true, // @TODO: multiple does not seem to have any effect at all?! Can be commented without change.
                'size' => 5,
                'maxitems' => 20,
                'exclusiveKeys' => '1,2',
            ),
        ),
        'select_14' => array(
            'exclude' => 1,
            'label' => 'SELECT: 14 maxitems=1, single',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('foo 3', 3),
                    array('foo 4', 4),
                    array('foo 5', 5),
                    array('foo 6', 6),
                ),
                'size' => 4,
                'maxitems' => 1,
            ),
        ),
        'select_15' => array(
            'exclude' => 1,
            'label' => 'SELECT: 15 Drop down with empty div',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('First div with items', '--div--'),
                    array('item1', 1),
                    array('item2', 2),
                    array('Second div without items', '--div--'),
                    array('Third div with items', '--div--'),
                    array('item3', 3),
                ),
            ),
        ),
        'select_16' => array(
            'exclude' => 1,
            'label' => 'SELECT: 16 maxitems=10, no size set',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => array(
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('foo 3', 3),
                    array('foo 4', 4),
                    array('foo 5', 5),
                    array('foo 6', 6),
                    array('foo 7', 7),
                    array('foo 8', 8),
                    array('foo 9', 9),
                    array('foo 10', 10),
                    array('foo 11', 11),
                    array('foo 12', 12),
                ),
                'maxitems' => 10,
            ),
        ),
        'select_17' => array(
            'exclude' => 1,
            'label' => 'SELECT: 17 multiple size=1',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'multiple' => true,
                'maxItems' => 1,
                'items' => array(
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('foo 3', 3),
                    array('foo 4', 4),
                    array('foo 5', 5),
                    array('foo 6', 6),
                    array('foo 7', 7),
                    array('foo 8', 8),
                    array('foo 9', 9),
                    array('foo 10', 10),
                    array('foo 11', 11),
                    array('foo 12', 12),
                ),
            ),
        ),
        'select_21' => array(
            'exclude' => 1,
            'label' => 'SELECT: 21 itemListStyle: green, 250 width and selectedListStyle: red, width 350',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => array(
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('foo 3', 3),
                ),
                'itemListStyle' => 'width:250px;background-color:#ffcccc;',
                'selectedListStyle' => 'width:250px;background-color:#ccffcc;',
                'size' => 2,
                'maxitems' => 2,
            ),
        ),
        'select_22' => array(
            'exclude' => 1,
            'label' => 'SELECT: 22 renderType=selectCheckBox',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => array(
                    array('item 1', 1),
                    array('item 2', 2),
                    array('item 3', 3),
                ),
                'maxitems' => 2,
            ),
        ),
        'select_23' => array(
            'exclude' => 1,
            'label' => 'SELECT: 23 renderType=selectCheckBox with icons and description',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => array(
                    array('foo 1', 1, '', 'optional description'), // @TODO: In contrast to "items" documentation, description seems not to have an effect for renderMode=checkbox
                    array('foo 2', 2, 'EXT:styleguide/Resources/Public/Icons/tx_styleguide_forms.svg', 'other description'),
                    array('foo 3', 3, '', ''),
                ),
                'maxitems' => 2,
            ),
        ),
        'select_24' => array(
            'exclude' => 1,
            'label' => 'SELECT: 24 renderType=selectSingleBox',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'items' => array(
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('divider', '--div--'),
                    array('foo 3', 3),
                    array('foo 4', 4),
                ),
                'maxitems' => 2,
            ),
        ),
        'select_25' => array(
            'exclude' => 1,
            'label' => 'SELECT: 25 renderType=selectTree of pages',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'size' => 20,
                'maxitems' => 4, // @TODO: *must* be set, otherwise invalid upon checking first item?!
                'treeConfig' => array(
                    'expandAll' => true,
                    'parentField' => 'pid',
                    'appearance' => array(
                        'showHeader' => true,
                    ),
                ),
            ),
        ),
        'select_26' => array(
            'exclude' => 1,
            'label' => 'SELECT: 26 renderType=selectTree of pages showHeader=FALSE, nonSelectableLevels=0,1, allowRecursiveMode=TRUE, width=400',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'maxitems' => 4, // @TODO: *must* be set, otherwise invalid upon checking first item?!
                'size' => 10,
                'treeConfig' => array(
                    'expandAll' => true,
                    'parentField' => 'pid',
                    'appearance' => array(
                        'showHeader' => false,
                        'nonSelectableLevels' => '0,1',
                        'allowRecursiveMode' => true, // @TODO: No effect?
                        'width' => 400,
                    ),
                ),
            ),
        ),
        'select_27' => array(
            'exclude' => 1,
            'label' => 'SELECT: 27 enableMultiSelectFilterTextfield',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => array(
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('foo 3', 3),
                    array('bar', 4),
                ),
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 999,
                'enableMultiSelectFilterTextfield' => true,
            ),
        ),
        'select_28' => array(
            'exclude' => 1,
            'label' => 'SELECT: 28 enableMultiSelectFilterTextfield, multiSelectFilterItems',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => array(
                    array('foo 1', 1),
                    array('foo 2', 2),
                    array('foo 3', 3),
                    array('bar', 4),
                ),
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 999,
                'enableMultiSelectFilterTextfield' => true,
                'multiSelectFilterItems' => array(
                    array('', ''),
                    array('foo', 'foo'),
                    array('bar', 'bar'),
                ),
            ),
        ),
        'select_29' => array(
            'exclude' => 1,
            'label' => 'SELECT: 29 wizards',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_styleguide_forms_staticdata',
                'rootLevel' => 1,
                'size' => 5,
                'autoSizeMax' => 20,
                'minitems' => 0,
                'maxitems' => 999,
                'wizards' => array(
                    '_PADDING' => 1, // @TODO: Has no sane effect
                    '_VERTICAL' => 1,
                    'edit' => array(
                        'type' => 'popup',
                        'title' => 'edit',
                        'module' => array( // @TODO: TCA documentation is not up to date at least in "Adding wizards" section of type=select here
                            'name' => 'wizard_edit',
                        ),
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    ),
                    'add' => array(
                        'type' => 'script',
                        'title' => 'add',
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'params' => array(
                            'table' => 'tx_styleguide_forms_staticdata',
                            'pid' => '0',
                            'setValue' => 'prepend',
                        ),
                    ),
                    'list' => array(
                        'type' => 'script',
                        'title' => 'list',
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_list.gif',
                        'module' => array(
                            'name' => 'wizard_list',
                        ),
                        'params' => array(
                            'table' => 'tx_styleguide_forms_staticdata',
                            'pid' => '0',
                        ),
                    ),
                ),
            ),
        ),
        'select_30' => array(
            'exclude' => 1,
            'label' => 'SELECT: 30 Slider wizard, step=1, width=200, items',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('foo1', 1),
                    array('foo2', 2),
                    array('foo3', 4),
                    array('foo4', 7),
                    array('foo5', 8),
                    array('foo6', 11),
                ),
                'default' => 4,
                'wizards' => array(
                    'angle' => array(
                        'type' => 'slider',
                        'step' => 1,
                        'width' => 200,
                    ),
                ),
            ),
        ),
        'select_31' => array(
            'exclude' => 1,
            'label' => 'SELECT: 31 renderType=selectTree of pages with maxLevels=1',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'size' => 20,
                'maxitems' => 4, // @TODO: *must* be set, otherwise invalid upon checking first item?!
                'treeConfig' => array(
                    'expandAll' => true,
                    'parentField' => 'pid',
                    'appearance' => array(
                        'showHeader' => true,
                        'maxLevels' => 1,
                    ),
                ),
            ),
        ),
        'select_32' => array(
            'exclude' => 1,
            'label' => 'SELECT: 32 renderType=selectTree of pages with maxLevels=2',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'size' => 20,
                'maxitems' => 4, // @TODO: *must* be set, otherwise invalid upon checking first item?!
                'treeConfig' => array(
                    'expandAll' => true,
                    'parentField' => 'pid',
                    'appearance' => array(
                        'showHeader' => true,
                        'maxLevels' => 2,
                    ),
                ),
            ),
        ),


        'flex_1' => array(
            'exclude' => 1,
            'label' => 'FLEX: 1 simple flex form',
            'config' => array(
                'type' => 'flex',
                'ds' => array(
                    'default' => '
						<T3DataStructure>
							<ROOT>
								<type>array</type>
								<el>
									<input_1>
										<TCEforms>
											<label>Some input field</label>
											<config>
												<type>input</type>
												<size>23</size>
												<default>a default value</default>
											</config>
										</TCEforms>
									</input_1>
								</el>
							</ROOT>
						</T3DataStructure>
					',
                ),
            ),
        ),
        'flex_2' => array(
            'exclude' => 1,
            'label' => 'FLEX: 2 simple flex form with langDisable=1',
            'config' => array(
                'type' => 'flex',
                'ds' => array(
                    'default' => '
						<T3DataStructure>
							<meta>
								<langDisable>1</langDisable>
							</meta>
							<ROOT>
								<type>array</type>
								<el>
									<input_1>
										<TCEforms>
											<label>Some input field</label>
											<config>
												<type>input</type>
												<size>23</size>
											</config>
										</TCEforms>
									</input_1>
								</el>
							</ROOT>
						</T3DataStructure>
					',
                ),
            ),
        ),
        'flex_3' => array(
            'exclude' => 1,
            'label' => 'FLEX: 3 complex flexform in an external file',
            'config' => array(
                'type' => 'flex',
                'ds' => array(
                    'default' => 'FILE:EXT:styleguide/Configuration/Flexform/Flex_3.xml',
                ),
            ),
        ),
        'flex_4' => array(
            'exclude' => 1,
            'label' => 'FLEX: 4 multiple items',
            'config' => array(
                'type' => 'flex',
                'ds' => array(
                    'default' => '
						<T3DataStructure>
							<meta>
								<langDisable>1</langDisable>
							</meta>
							<ROOT>
								<type>array</type>
								<el>
									<input_1>
										<TCEforms>
											<label>Some input field</label>
											<config>
												<type>input</type>
												<size>23</size>
											</config>
										</TCEforms>
									</input_1>
									<input_2>
										<TCEforms>
											<label>Some input field</label>
											<config>
												<type>input</type>
												<size>23</size>
											</config>
										</TCEforms>
									</input_2>
								</el>
							</ROOT>
						</T3DataStructure>
					',
                ),
            ),
        ),
        'flex_5' => array(
            'exclude' => 1,
            'label' => 'FLEX: 5 condition',
            'config' => array(
                'type' => 'flex',
                'ds' => array(
                    'default' => 'FILE:EXT:styleguide/Configuration/Flexform/Condition.xml',
                ),
            ),
        ),


        'inline_1' => array(
            'exclude' => 1,
            'label' => 'IRRE: 1 typical FAL field',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => "uid_foreign",
                'foreign_sortby' => "sorting_foreign",
                'foreign_table_field' => "tablenames",
                'foreign_match_fields' => array(
                    'fieldname' => "image",
                ),
                'foreign_label' => "uid_local",
                'foreign_selector' => "uid_local",
                'foreign_selector_fieldTcaOverride' => array(
                    'config' => array(
                        'appearance' => array(
                            'elementBrowserType' => 'file',
                            'elementBrowserAllowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                        ),
                    ),
                ),
                'filter' => array(
                    'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
                    'parameters' => array(
                        'allowedFileExtensions' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                        'disallowedFileExtensions' => '',
                    ),
                ),
                'appearance' => array(
                    'useSortable' => true,
                    'headerThumbnail' => array(
                        'field' => "uid_local",
                        'width' => "45",
                        'height' => "45c",
                    ),
                ),
                'showPossibleLocalizationRecords' => false,
                'showRemovedLocalizationRecords' => false,
                'showSynchronizationLink' => false,
                'showAllLocalizationLink' => false,
                'enabledControls' => array(
                    'info' => true,
                    'new' => false,
                    'dragdrop' => true,
                    'sort' => false,
                    'hide' => true,
                    'delete' => true,
                    'localize' => true,
                ),
                'createNewRelationLinkTitle' => "LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference",
                'behaviour' => array(
                    'localizationMode' => "select",
                    'localizeChildrenAtParentLocalization' => true,
                ),
                'foreign_types' => array(
                    0 => array(
                        'showitem' => "\n\t\t\t\t\t\t\t--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,\n\t\t\t\t\t\t\t--palette--;;filePalette",
                    ),
                    1 => array(
                        'showitem' => "\n\t\t\t\t\t\t\t--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,\n\t\t\t\t\t\t\t--palette--;;filePalette",
                    ),
                    2 => array(
                        'showitem' => "\n\t\t\t\t\t\t\t--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,\n\t\t\t\t\t\t\t--palette--;;filePalette",
                    ),
                    3 => array(
                        'showitem' => "\n\t\t\t\t\t\t\t--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,\n\t\t\t\t\t\t\t--palette--;;filePalette",
                    ),
                    4 => array(
                        'showitem' => "\n\t\t\t\t\t\t\t--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,\n\t\t\t\t\t\t\t--palette--;;filePalette",
                    ),
                    5 => array(
                        'showitem' => "\n\t\t\t\t\t\t\t--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,\n\t\t\t\t\t\t\t--palette--;;filePalette",
                    ),
                ),
            ),
        ),
        'inline_2' => array( /** Taken from irre_tutorial 1nff */
            'exclude' => 1,
            'label' => 'IRRE: 2 1:n foreign field to table with sheets with a custom text expandSingle',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_forms_inline_2_child1',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'maxitems' => 10,
                'appearance' => array(
                    'expandSingle' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => true,
                    'newRecordLinkTitle' => 'Create a new relation "inline_2"',
                ),
                'behaviour' => array(
                    'localizationMode' => 'select',
                    'localizeChildrenAtParentLocalization' => true,
                ),
            ),
        ),
        'inline_3' => array(
            'exclude' => 1,
            'label' => 'IRRE: 3 m:m async, useCombination, newRecordLinkAddTitle',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_forms_inline_3_mm',
                'foreign_field' => 'select_parent',
                'foreign_selector' => 'select_child',
                'foreign_unique' => 'select_child',
                'maxitems' => 9999,
                'appearance' => array(
                    'newRecordLinkAddTitle' => 1,
                    'useCombination' => true,
                    'collapseAll' => false,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                ),
            ),
        ),
        'inline_4' => array(
            'label' => 'IRRE: 4 media FAL field',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('inline_4', array(
                'appearance' => array(
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ),
                // custom configuration for displaying fields in the overlay/reference table
                // to use the imageoverlayPalette instead of the basicoverlayPalette
                'foreign_types' => array(
                    '0' => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.audioOverlayPalette;audioOverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.videoOverlayPalette;videoOverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    )
                )
            ), $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'])
        ),
        'inline_5' => array(
            'exclude' => 1,
            'label' => 'IRRE: 5 tt_content child with foreign_record_defaults',
            'config' => array(
                'type' => 'inline',
                'allowed' => 'tt_content',
                'foreign_table' => 'tt_content',
                'foreign_record_defaults' => array(
                    'CType' => 'text'
                ),
                'minitems' => 0,
                'maxitems' => 1,
                'appearance' => array(
                    'collapseAll' => 0,
                    'expandSingle' => 1,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showRemovedLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'showSynchronizationLink' => 1,
                    'enabledControls' => array(
                        'info' => false,
                        'new' => false,
                        'dragdrop' => true,
                        'sort' => false,
                        'hide' => true,
                        'delete' => true,
                        'localize' => true,
                    ),
                ),
            ),
        ),
        'palette_1_1' => array(
            'exclude' => 0,
            'label' => 'checkbox is type check',
            'config' => array(
                'type' => 'check',
                'default' => 1,
            ),
        ),
        'palette_1_2' => array(
            'exclude' => 0,
            'label' => 'checkbox type is user',
            'config' => array(
                'default' => true,
                'type' => 'user',
                'userFunc' => 'TYPO3\\CMS\\Styleguide\\UserFunctions\\FormEngine\\TypeUserPalette->render',
            ),
        ),
        'palette_1_3' => array(
            'exclude' => 0,
            'label' => 'checkbox is type check',
            'config' => array(
                'type' => 'check',
                'default' => 1,
            ),
        ),
        'palette_2_1' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_3_1' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_3_2' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_4_1' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_4_2' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_4_3' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_4_4' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_5_1' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_5_2' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_6_1' => array(
            'label' => 'PALETTE: Simple field with palette below',
            'exclude' => 1,
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_6_2' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),
        'palette_6_3' => array(
            'label' => 'Palette Field',
            'config' => array(
                'type' => 'input',
            ),
        ),


        'wizard_1' => array(
            'label' => 'WIZARD: 1 vertical, edit, add, list',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_styleguide_forms_staticdata',
                'rootLevel' => 1,
                'size' => 5,
                'autoSizeMax' => 20,
                'minitems' => 0,
                'maxitems' => 999,
                'wizards' => array(
                    '_PADDING' => 1, // @TODO: Has no sane effect
                    '_VERTICAL' => 1,
                    'edit' => array(
                        'type' => 'popup',
                        'title' => 'edit',
                        'module' => array( // @TODO: TCA documentation is not up to date at least in "Adding wizards" section of type=select here
                            'name' => 'wizard_edit',
                        ),
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    ),
                    'add' => array(
                        'type' => 'script',
                        'title' => 'add',
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'params' => array(
                            'table' => 'tx_styleguide_forms_staticdata',
                            'pid' => '0',
                            'setValue' => 'prepend',
                        ),
                    ),
                    'list' => array(
                        'type' => 'script',
                        'title' => 'list',
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_list.gif',
                        'module' => array(
                            'name' => 'wizard_list',
                        ),
                        'params' => array(
                            'table' => 'tx_styleguide_forms_staticdata',
                            'pid' => '0',
                        ),
                    ),
                ),
            ),
        ),
        'wizard_2' => array(
            'exclude' => 1,
            'label' => 'WIZARD: 2 colorbox',
            'config' => array(
                'type' => 'input',
                'wizards' => array(
                    '_PADDING' => 6,
                    'colorpicker' => array(
                        'type' => 'colorbox',
                        'title' => 'Color picker',
                        'module' => array(
                            'name' => 'wizard_colorpicker',
                        ),
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                    ),
                ),
            ),
        ),
        'wizard_3' => array(
            'label' => 'WIZARD: 3 colorbox, with image',
            'config' => array(
                'type' => 'input',
                'wizards' => array(
                    'colorpicker' => array(
                        'type' => 'colorbox',
                        'title' => 'Color picker',
                        'module' => array(
                            'name' => 'wizard_colorpicker',
                        ),
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        'exampleImg' => 'EXT:styleguide/Resources/Public/Images/colorpicker.jpg',
                    ),
                ),
            ),
        ),
        'wizard_4' => array(
            'label' => 'WIZARD: 4 suggest wizard, position top',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_styleguide_forms_staticdata',
                'disable_controls' => 'browser',
                'maxitems' => 999,
                'wizards' => array(
                    '_POSITION' => 'top',
                    'suggest' => array(
                        'type' => 'suggest',
                    ),
                ),
            ),
        ),
        'wizard_5' => array(
            'label' => 'WIZARD: 5 suggest wizard, position bottom',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_styleguide_forms_staticdata',
                'disable_controls' => 'browser',
                'maxitems' => 999,
                'wizards' => array(
                    '_POSITION' => 'bottom',
                    'suggest' => array(
                        'type' => 'suggest',
                    ),
                ),
            ),
        ),
        'wizard_6' => array(
            'exclude' => 1,
            'label' => 'WIZARD 6: Flex forms',
            'config' => array(
                'type' => 'flex',
                'ds' => array(
                    'default' => '
						<T3DataStructure>
							<meta>
								<langDisable>1</langDisable>
							</meta>
							<ROOT>
								<type>array</type>
								<el>
									<link_1>
										<TCEforms>
											<label>LINK 1</label>
											<config>
												<type>input</type>
												<eval>trim</eval>
												<softref>typolink</softref>
												<wizards type="array">
													<link type="array">
														<type>popup</type>
														<title>Link</title>
														<icon>EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_link.gif</icon>
														<module type="array">
															<name>wizard_link</name>
															<urlParameters type="array">
																<act>file|url</act>
															</urlParameters>
														</module>
														<params type="array">
															<blindLinkOptions>mail,folder,spec</blindLinkOptions>
														</params>
														<JSopenParams>height=300,width=500,status=0,menubar=0,scrollbars=1</JSopenParams>
													</link>
												</wizards>
											</config>
										</TCEforms>
									</link_1>
									<table_1>
										<TCEforms>
											<label>TABLE 1</label>
												<config>
													<type>text</type>
													<cols>30</cols>
													<rows>5</rows>
													<wizards>
														<table type="array">
															<type>script</type>
															<title>Table wizard</title>
															<icon>EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_table.gif</icon>
															<module type="array">
																<name>wizard_table</name>
															</module>
															<params type="array">
																<xmlOutput>0</xmlOutput>
															</params>
															<notNewRecords>1</notNewRecords>
														</table>
													</wizards>
												</config>
										</TCEforms>
									</table_1>
								</el>
							</ROOT>
						</T3DataStructure>
					',
                ),
            ),
        ),
        'wizard_7' => array(
            'label' => 'WIZARD: 7 table',
            'config' => array(
                'type' => 'text',
                'cols' => '40',
                'rows' => '5',
                'wizards' => array(
                    'table' => array(
                        'type' => 'script',
                        'title' => 'Table wizard',
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_table.gif',
                        'module' => array(
                            'name' => 'wizard_table'
                        ),
                        'params' => array(
                            'xmlOutput' => 0
                        ),
                        'notNewRecords' => 1,
                    ),
                ),
            ),
        ),
        'wizard_8' => array(
            'label' => 'WIZARD: 8 textarea with select',
            'config' => array(
                'type' => 'text',
                'cols' => '40',
                'rows' => '5',
                'wizards' => array(
                    'select' => array(
                        'type' => 'select',
                        'items' => array(
                            array('Option 1', 'Dummy Text for Option 1'),
                            array('Option 2', 'Dummy Text for Option 2'),
                            array('Option 3', 'Dummy Text for Option 3'),
                        ),
                    ),
                ),
            ),
        ),


        'rte_1' => array(
            'exclude' => 1,
            'label' => 'RTE 1',
            'config' => array(
                'type' => 'text',
            ),
            'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_css]',
        ),
        'rte_2' => array(
            'exclude' => 1,
            'label' => 'RTE 2',
            'config' => array(
                'type' => 'text',
                'cols' => 30,
                'rows' => 6,
            ),
            'defaultExtras' => 'richtext[]:rte_transform[mode=ts_css]',
        ),
        'rte_3' => array(
            'exclude' => 1,
            'label' => 'RTE 3: In inline child',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_forms_rte_3_child1',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
            ),
        ),
        'rte_4' => array(
            'exclude' => 1,
            'label' => 'RTE 4: type flex, rte in a tab, rte in section container, rte in inline',
            'config' => array(
                'type' => 'flex',
                'ds' => array(
                    'default' => '
						<T3DataStructure>
							<sheets>
								<sGeneral>
									<ROOT>
										<TCEforms>
											<sheetTitle>RTE in tab</sheetTitle>
										</TCEforms>
										<type>array</type>
										<el>
											<rte_1>
												<TCEforms>
													<label>RTE 1</label>
													<config>
														<type>text</type>
													</config>
													<defaultExtras>richtext[]:rte_transform[mode=ts_css]</defaultExtras>
												</TCEforms>
											</rte_1>
										</el>
									</ROOT>
								</sGeneral>
								<sSections>
									<ROOT>
										<TCEforms>
											<sheetTitle>RTE in section</sheetTitle>
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
														<title>1 RTE field</title>
														<el>
															<rte_2>
																<TCEforms>
																	<label>RTE 2</label>
																	<config>
																		<type>text</type>
																	</config>
																	<defaultExtras>richtext[]:rte_transform[mode=ts_css]</defaultExtras>
																</TCEforms>
															</rte_2>
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
											<sheetTitle>RTE in inline</sheetTitle>
										</TCEforms>
										<type>array</type>
										<el>
											<inline_1>
												<TCEforms>
													<label>inline_1 to one field</label>
													<config>
														<type>inline</type>
														<foreign_table>tx_styleguide_forms_rte_4_flex_inline_1_child1</foreign_table>
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
                ),
            ),
        ),

        't3editor_1' => array(
            'exclude' => 1,
            'label' => 'T3EDITOR: 1',
            'config' => array(
                'type' => 'text',
                'renderType' => 't3editor',
                'format' => 'html',
                'rows' => 7,
            ),
        ),
        't3editor_2' => array(
            'exclude' => 1,
            'label' => 'T3EDITOR: 2 Enabled on type 0 via columnsOverride',
            'config' => array(
                'type' => 'text',
                'rows' => 7,
            ),
        ),
        't3editor_5' => array(
            'exclude' => 1,
            'label' => 'T3EDITOR: 5 In inline child',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_forms_t3editor_5_child1',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
            ),
        ),
        't3editor_6' => array(
            'exclude' => 1,
            'label' => 'T3EDITOR 6: type flex, t3editor in a tab, t3editor in section container, t3editor in inline',
            'config' => array(
                'type' => 'flex',
                'ds' => array(
                    'default' => '
						<T3DataStructure>
							<sheets>
								<sGeneral>
									<ROOT>
										<TCEforms>
											<sheetTitle>t3editor in tab</sheetTitle>
										</TCEforms>
										<type>array</type>
										<el>
											<t3editor_1>
												<TCEforms>
													<label>T3EDITOR 1: New syntax</label>
													<config>
														<type>text</type>
														<renderType>t3editor</renderType>
													</config>
												</TCEforms>
											</t3editor_1>
										</el>
									</ROOT>
								</sGeneral>
								<sSections>
									<ROOT>
										<TCEforms>
											<sheetTitle>T3EDITOR in section</sheetTitle>
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
														<title>1 t3editor field</title>
														<el>
															<t3editor_3>
																<TCEforms>
																	<label>T3EDITOR 3</label>
																	<config>
																		<type>text</type>
																		<renderType>t3editor</renderType>
																	</config>
																</TCEforms>
															</t3editor_3>
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
											<sheetTitle>T3EDITOR in inline</sheetTitle>
										</TCEforms>
										<type>array</type>
										<el>
											<inline_1>
												<TCEforms>
													<label>inline_1 to one field</label>
													<config>
														<type>inline</type>
														<foreign_table>tx_styleguide_forms_t3editor_6_flex_inline_1_child1</foreign_table>
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
                ),
            ),
        ),


        'system_1' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 1 type select, special tables, renderMode checkbox, identical to be_groups tables_modify & tables_select',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'tables',
                'size' => '5',
                'autoSizeMax' => 50,
                'maxitems' => 100,
            ),
        ),
        'system_2' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 2 type select, special tables, identical to index_config table2index',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('dummy extra entry', '0')
                ),
                'special' => 'tables',
                'size' => 1, // @todo size & maxitems probably obsolete, see example below
                'maxitems' => 1,
            ),
        ),
        'system_3' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 3 type select, special tables, identical to sys_collection table_name',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'tables',
            ),
        ),
        'system_4' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 4 type select, special languages, renderMode checkbox, identical to be_groups allowed_languages',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'languages',
                'maxitems' => 1000,
            ),
        ),
        'system_5' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 5 type select, special custom, renderMode checkbox, identical to be_groups custom_options',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'custom',
                'maxitems' => 1000,
            ),
        ),
        'system_6' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 6 type select, special custom, renderMode checkbox, identical to be_groups custom',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'custom',
                'maxitems' => 1000,
            ),
        ),
        'system_7' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 7 type select, special modListGroup, identical to be_groups groupMods',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'modListGroup',
                'size' => '5',
                'autoSizeMax' => 50,
                'maxitems' => 100,
            ),
        ),
        'system_8' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 8 type select, special modListUser, identical to be_users userMods',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'modListUser',
                'size' => '5',
                'autoSizeMax' => 50,
                'maxitems' => '100',
            ),
        ),
        'system_9' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 9 type select, special pagetypes, identical to be_groups pagetypes_select',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'pagetypes',
                'size' => '5',
                'autoSizeMax' => 50,
                'maxitems' => 20,
            ),
        ),
        'system_10' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 10 type select, special explicitValues, renderMode checkbox, identical to be_groups explicit_allowdeny',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'explicitValues',
                'maxitems' => 1000,
            ),
        ),
        'system_11' => array(
            'exclude' => 1,
            'label' => 'SYSTEM: 11 type select, special exclude, renderMode checkbox, identical to be_groups non_exclude_fields',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'special' => 'exclude',
                'size' => '25',
                'maxitems' => 1000,
                'autoSizeMax' => 50,
            ),
        ),

    ),


    'interface' => array(
        'showRecordFieldList' => 'hidden,starttime,endtime,
			type_field,
			select_1, select_2, select_3, select_4, select_5, select_7, select_8, select_9, select_10,
			select_11, select_12, select_13, select_14, select_15, select_16,
			select_21, select_22, select_23, select_24, select_25, select_26, select_27, select_28, select_29,
			select_30, select_31, select_32, select_33, select_34,
			flex_1, flex_2, flex_3,
			inline_1, inline_2, inline_3, inline_4, inline_5,
			wizard_1, wizard_2, wizard_3, wizard_4, wizard_5, wizard_6, wizard_7, wizard_8,
			rte_1, rte_2, rte_3, rte_4,
			t3editor_1, t3editor_2, t3editor_5, t3editor_6,
			system_1, system_2, system_3, system_4, system_5, system_6, system_7, system_8, system_9, system_10,
			system_11,
			',
    ),

    'types' => array(
        '0' => array(
            'showitem' => '
				--div--;Type,
					type_field,
				--div--;Select,
					select_1, select_2, select_33, select_34, select_3, select_4, select_5, select_7, select_8, select_9, select_10,
					select_11, select_12, select_13, select_14, select_15, select_16, select_17,
					select_21, select_22, select_23, select_24, select_25, select_26, select_27, select_28, select_29,
					select_30, select_31, select_32,
				--div--;Flex,
					flex_1, flex_2, flex_3, flex_4, flex_5,
				--div--;Inline,
					inline_1, inline_2, inline_3, inline_4, inline_5,
				--div--;Palettes,
					--palette--;Palettes 1;palettes_1,
					--palette--;Palettes 2;palettes_2,
					--palette--;Palettes 3;palettes_3,
					--palette--;;palettes_4,
					--palette--;Palettes 5;palettes_5,
					palette_6_1;Field with palette below, --palette--;;palettes_6,
				--div--;Wizards,
					wizard_1, wizard_2, wizard_3, wizard_7, wizard_4, wizard_5, wizard_6, wizard_8,
				--div--;RTE,
					rte_1, --palette--;RTE in palette;rte_2_palette, rte_3, rte_4,
				--div--;t3editor,
					t3editor_1, t3editor_2, t3editor_5, t3editor_6,
				--div--;Access Rights,
					system_1, system_2, system_3, system_4, system_5, system_6, system_7, system_8, system_9, system_10,
					system_11,
			',
            'columnsOverrides' => array(
                't3editor_2' => array(
                    'config' => array(
                        'renderType' => 't3editor',
                        'format' => 'html',
                    ),
                ),
            ),
        ),
        'test' => array(
            'showitem' => '
				--div--;Type,
					type_field,
				--div--;t3editor,
					t3editor_2;T3EDITOR: 2 Should be usual text field,
			',
        ),
    ),

    'palettes' => array(
        'palettes_1' => array(
            'showitem' => 'palette_1_1, palette_1_2, palette_1_3',
            'canNotCollapse' => 1,
        ),
        'palettes_2' => array(
            'showitem' => 'palette_2_1',
        ),
        'palettes_3' => array(
            'showitem' => 'palette_3_1, palette_3_2',
        ),
        'palettes_4' => array(
            'showitem' => 'palette_4_1, palette_4_2, palette_4_3, --linebreak--, palette_4_4',
        ),
        'palettes_5' => array(
            'showitem' => 'palette_5_1, --linebreak--, palette_5_2',
            'canNotCollapse' => 1,
        ),
        'palettes_6' => array(
            'showitem' => 'palette_6_2, palette_6_3',
        ),
        'rte_2_palette' => array(
            'showitem' => 'rte_2',
        ),
        'visibility' => array(
            'showitem' => 'hidden;Shown in frontend',
            'canNotCollapse' => 1,
        ),
    ),

);
