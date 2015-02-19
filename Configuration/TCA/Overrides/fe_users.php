<?php
defined('TYPO3_MODE') or die();

$additionalFrontendUserColumns = array(
	'signature' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:dialogue/Resources/Private/Language/locallang_db.xlf:tx_dialogue_domain_model_user.signature',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 5,
			'eval' => 'trim'
		)
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $additionalFrontendUserColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'fe_users',
	'signature',
	'',
	'after:image'
);
