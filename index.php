<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$GLOBALS['config'] = array(
	'appName' => 'wpframework',
	'version' => "0.0.1",
	'domain' => 'wpframework.id',
	'path' => array(
		'app' => 'app/',
		'core' => 'core/',
		'index' => 'index.php'
	),
	'defaults' => array(
		'controller' => 'Main',
		'method' => 'index'
	),
	'routes' => array(),
	'database' => array(
		'host' => 'localhost',
		'username' => "",
		'password' => "",
		'name' => "",
	)
);
$GLOBALS['instance'] = array();
require_once $GLOBALS['config']['path']['core']."autoload.php";
new Router();
