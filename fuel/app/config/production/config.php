<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

return array(

	'profiling'  => false,
	/**
	 * Default location for the file cache
	 */
	'cache_dir'       => APPPATH.'cache/',

	/**
	 * Settings for the file finder cache (the Cache class has it's own config!)
	 */
	'caching'         => true,
	'cache_lifetime'  => 3600, // In Seconds

);
