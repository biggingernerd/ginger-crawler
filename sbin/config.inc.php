<?php
/**
 * Config file
 *
 * @author Big Ginger Nerd
 * @package ginger-crawler
 */


ini_set('date.timezone', 'UTC');

define('BASE_PATH', realpath(dirname(__FILE__)));
define('LIBRARY_PATH', BASE_PATH."/../library/");
define('THIRD_PATH', BASE_PATH."/../3rdparty/");
define('CONFIG_PATH', BASE_PATH."/../config/");

set_include_path(".:".LIBRARY_PATH.":".THIRD_PATH);

/**
 * Autoloads PHP class files based on name
 * 
 * @param string $class Class name
 */
function __autoload($class) {
	$class = str_replace("\\", "/", $class) . '.php';

	require_once($class);
}
