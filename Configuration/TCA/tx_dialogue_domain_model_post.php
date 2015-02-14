<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('dialogue');

$GLOBALS['TCA']['tx_dialogue_domain_model_post'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_post',
		'label' => 'message',
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
		'searchFields' => 'message,ipaddress,creator,attachments,',
		'iconfile' => $extRelPath . 'Resources/Public/Icons/tx_dialogue_domain_model_post.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, message, ipaddress, creator, attachments',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, message, ipaddress, creator, attachments, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
		'message' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_post.message',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required'
			)
		),
		'ipaddress' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_post.ipaddress',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'creator' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_post.creator',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'attachments' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_post.attachments',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'attachments',
				array(),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			)
		),
		'thread' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'crdate' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'tstamp' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
