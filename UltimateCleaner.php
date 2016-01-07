<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not a valid entry point.' );
}


$wgExtensionCredits['antispam'][] = array(
	'path' => __FILE__,
	'name' => 'UltimateCleaner',
	'namemsg' => 'ultimatecleaner-extensionname',
	'author' => array(
		'Aravind Sai V',
		'Keerthana Balakrishnan',
		'Kashmi Abdulkareem',
		'Mubashira N',
		'Rahul VK'
	),
	'descriptionmsg'  => 'ultimatecleaner-desc',
	'license-name' => 'GPL-2.0',
	'version' => '0.1',
	'url' => 'https://www.mediawiki.org/wiki/Extension:UltimateCleaner',
);

$dir = dirname( __FILE__ );
$dirbasename = basename( $dir );

// Permissions
$wgAvailableRights[] = 'ultimatecleaner';
$wgGroupPermissions['*']['ultimatecleaner'] = true;

// Localisation Directories
$wgMessagesDirs['UltimateCleaner'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['UltimateCleanerAlias'] = $dir . '/UltimateCleaner.i18n.alias.php';


$wgSpecialPages['UltimateCleaner'] = 'SpecialUltimateCleaner';

$wgAutoloadClasses['SpecialUltimateCleaner'] = $dir . '/special/SpecialUltimateCleaner.php';

$wgResourceModules['ext.UltimateCleaner.retriever'] = array(
	'scripts' => 'js/ext.UltimateCleaner.js',
	'styles' => 'css/UltimateCleaner.css',
	'localBasePath' => __DIR__ . "/static",
	'remoteExtPath' => 'UltimateCleaner/static',
	'dependencies' => array(
		'mediawiki.jqueryMsg',
		'jquery.spinner'
	)
);