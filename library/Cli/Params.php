<?php
/**
 * CLI Params
 *
 * @author Big Ginger Nerd
 * @package ginger-crawler
 */
namespace Cli;

/**
 * This class enables usage for Params on cli
 *
 * @author Big Ginger Nerd
 * @package ginger-crawler
 *
 */
class Params {
	/**
	 * @var array $parameters Contains all parameters --key=value based
	 */
	private static $parameters = array();
	
	/**
	 * Parse all parameters
	 * 
	 * @return array $parameters
	 */
	public static function parse()
	{
		
		$arguments = $GLOBALS['arguments'];
		$parameters = array();
		foreach($arguments as $argument)
		{
			if(substr($argument, 0, 2) == "--")
			{
				// Is parameter
				$argument = str_replace("--", "", $argument);
				$aParts = explode("=", $argument);
				$parameters[$aParts[0]] = (isset($aParts[1])) ? $aParts[1] : "";
			}
		}
		$GLOBALS['parameters'] = $parameters;
		self::$parameters = $parameters;
		return $parameters;
	}
	
	/**
	 * Get parameter from parsed array
	 * @param string $key
	 * @return string|boolean
	 */
	public static function get($key)
	{
		if(!isset($GLOBALS['parameters']))
		{
			self::parse();
		}
		
		$params = self::$parameters;
		
		if(isset($params[$key]))
		{
			return $params[$key];
		} else {
			return false;
		}
	}
}
