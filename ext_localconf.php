<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'T3easy.' . $_EXTKEY,
	'Pi1',
	array(
		'Board' => 'list, new, create, edit, update, delete',
		'Thread' => 'list, new, create, edit, update, delete',
		'Post' => 'list, create, edit, update, delete'
	),
	array(
		'Board' => 'create, update, delete',
		'Thread' => 'create, update, delete',
		'Post' => 'create, update, delete'
	)
);
