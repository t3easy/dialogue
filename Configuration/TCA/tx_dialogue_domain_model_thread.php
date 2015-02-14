<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('dialogue');

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_thread',
		'label' => 'subject',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'subject,posts,',
		'iconfile' => $extRelPath . 'Resources/Public/Icons/tx_dialogue_domain_model_thread.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, subject, posts',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, subject, posts, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'max' => 255,
			)
		),

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
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
				),
			),
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
				),
			),
		),

		'subject' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_thread.subject',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'posts' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_thread.posts',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_dialogue_domain_model_post',
				'foreign_field' => 'thread',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),

		'board' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
