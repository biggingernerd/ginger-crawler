#!/usr/bin/php -q
<?php
/**
 * CLI launcher.
 * 
 * @author Big Ginger Nerd
 * @package ginger-crawler
 */

include('config.inc.php');

$GLOBALS['arguments'] = $argv;

use Cli\Command;

Command::Go();
