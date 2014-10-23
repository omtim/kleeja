<?php
/**
*
* @package Kleeja
* @version $Id: plugins.php 2220 2013-11-12 00:36:17Z saanina $
* @copyright (c) 2007 Kleeja.com
* @license http://www.kleeja.com/license
*
*/
//no for directly open
if (!defined('IN_COMMON'))
{
	exit();
}


/**
* Kleeja Plugins System
* @package plugins
*/
class plugins
{
	/**
	 * List of loaded plugins
	 */
	private $plugins = array();
	
	/**
	 * All hooks from all plugins listed in this variable
	 */
	private $all_plugins_hooks = array();

	/**
	 * Initating the class
	 */
	public function __construct()
	{
		#if plugins system is turned off, then stop right now!
		if(defined('STOP_PLUGINS'))
		{
			return false;
		}

		$this->load_plugins();
	}
	
	/**
	 * Load the plugins from root/plugins folder
	 */
	private function load_plugins()
	{
		$dir = PATH . 'plugins';
		$dh  = opendir($dir);
		$i = 0;
		while (false !== ($filename = readdir($dh)))
		{
			if(strpos($filename, '.php') !== false)
			{
		    	$this->plugins[$i] = str_replace('.php', '', $filename);
				$i++;
			}
		}
		sort($this->plugins);
		print_r($this->plugins);
	}
	
	
	/**
	 * Get the plugin information and other things
	 */
	private function fetch_plugin($plugin_name)
	{
		include PATH . 'plugins/' . $plugin_name . '.php';
		
		
	}
	
	/**
	 * Insert plugin hooks into 
	 */
	private function include_plugin_hooks_into_kleeja($plugin_name)
	{

	}
	
	/**
	 * 
	 */
	public function run_hook($hook_name)
	{
		if(isset($this->all_plugins_hooks[$hook_name]))
		{
			return implode("\n", $this->all_plugins_hooks[$hook_name]);
		}
	}
}

