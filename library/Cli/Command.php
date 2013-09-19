<?php
/**
 * CLI Command
 *
 * @author Big Ginger Nerd
 * @package ginger-crawler
 */
namespace Cli;

/**
 * This class parses the right function to the right module
 *
 * @author Big Ginger Nerd
 * @package ginger-crawler
 *
 */
class Command {
	
	/**
	 * Load the right module if found
	 * 
	 * @throws Exception
	 */
	public static function Go()
	{
		$module 	= Params::get("module");
		$type 		= Params::get("type");
		$command	= Params::get("command");
		
		if($module == "" || $type == "" || $command == "")
		{
			throw new Exception("Please supply module, type & command");
		}
		
		$namespace = "\Cli\\".ucfirst($module)."\\".ucfirst($type);
		if(method_exists($namespace, $command)) {
			$class = new $namespace();
			$class->$command();
		} else {
			throw new Exception("Module, type or command not found");
		}
		
		
	}
}
