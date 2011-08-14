<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Search',
	array(

	),
	// non-cacheable actions
	array(

	)
);

	// registering the page indexer itself
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['pageIndexing']['tx_elasticsearch_Indexer'] = 'EXT:elasticsearch/Classes/Indexer.php:Tx_Elasticsearch_Indexer';
	// track FE user groups used to protect content on a page
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['postInit']['tx_elasticsearch_Indexer'] = 'EXT:elasticsearch/Classes/Indexer.php:&Tx_Elasticsearch_Indexer';

?>