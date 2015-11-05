<?php


namespace core\hlpers;

/**
* staticka trida
*/
class Config
{
	protected static $settings = array();

	public static function getSettings($key)
	{
		return isset(self::$settings[$key]) ? self::$settings[$key] : null;
	}

	public static function addSettings($key, $val)
	{
		self::$settings[$key] = $val;
	}
}