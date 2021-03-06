<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('dialogue');

return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_board',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			'fe_group' => 'fe_group'
		),
		'searchFields' => 'title,description,sub_boards,threads,',
		'iconfile' => $extRelPath . 'Resources/Public/Icons/tx_dialogue_domain_model_board.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, description, forbid_threads, parent_board, threads',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, title, description, forbid_threads, parent_board, threads,
		--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime, fe_group'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check'
			)
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				)
			)
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				)
			)
		),
		'fe_group' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.fe_group',
			'config' => array(
				'type' => 'select',
				'size' => 7,
				'maxitems' => 20,
				'items' => array(
					array(
						'LLL:EXT:lang/locallang_general.xlf:LGL.hide_at_login',
						-1
					),
					array(
						'LLL:EXT:lang/locallang_general.xlf:LGL.any_login',
						-2
					),
					array(
						'LLL:EXT:lang/locallang_general.xlf:LGL.usergroups',
						'--div--'
					)
				),
				'exclusiveKeys' => '-1,-2',
				'foreign_table' => 'fe_groups',
				'foreign_table_where' => 'ORDER BY fe_groups.title'
			)
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_board.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_board.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'forbid_threads' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_board.forbid_threads',
			'config' => array(
				'type' => 'check'
			)
		),
		'parent_board' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_board.parent_board',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_dialogue_domain_model_board',
				'renderMode' => 'tree',
				'maxitems' => 1,
				'treeConfig' => array(
					'parentField' => 'parent_board',
					'expandAll' => true,
					'appearance' => array(
						'expandAll' => TRUE,
						'showHeader' => TRUE,
						'maxLevels' => 2,
						'nonSelectableLevels' => '0,2'
					)
				)
			)
		),
		'threads' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_board.threads',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_dialogue_domain_model_thread',
				'foreign_field' => 'board',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				)
			)
		),
		'board' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		)
	)
);
