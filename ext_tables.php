<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Dialogue plugin'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Dialogue');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dialogue_domain_model_board', 'EXT:dialogue/Resources/Private/Language/locallang_csh_tx_dialogue_domain_model_board.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dialogue_domain_model_board');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dialogue_domain_model_thread', 'EXT:dialogue/Resources/Private/Language/locallang_csh_tx_dialogue_domain_model_thread.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dialogue_domain_model_thread');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dialogue_domain_model_post', 'EXT:dialogue/Resources/Private/Language/locallang_csh_tx_dialogue_domain_model_post.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dialogue_domain_model_post');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'sys_file_reference',
	'EXT:dialogue/Resources/Private/Language/locallang_csh_sys_file_reference.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'fe_users',
	'EXT:dialogue/Resources/Private/Language/locallang_csh_fe_users.xlf'
);
