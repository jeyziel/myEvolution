<?php 

/**
*@author jeyziel gama
*classe resposavél por criar as rotas do sistena
*/

namespace JG\Init;

abstract class Route
{
	private static $routes;

	/** nao pode ser instanciada*/
	private function __construct(){}

	public static function add(array $routes)
	{
		self::$routes[] = $routes;
	}

	public static function getRoutes():Array
	{
		return self::$routes;
	}
}