<?php 

namespace Core;

class Uri 
{
	public static function Uri()
	{
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}

	public static function method()
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
}