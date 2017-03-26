<?php 

namespace JG\Database;

use \Exception;
use \PDO;

/**
*@author jeyziel gama
*class Reponsible for connection to the database
*/

Final class Connection
{
	private function __construct(){}

	public static function open()
	{

		if (file_exists("../Config/config.ini"))
		{
			$db = parse_ini_file("../Config/config.ini");
		}

		$driver = $db['driver'] ?? null;
		$user = $db['user'] ?? null;
		$pass = $db['pass'] ?? null;
		$host = $db['host'] ?? null;
		$dbase = $db['dbase'] ?? null;

		switch($driver)
		{
			case 'mysql':
				$conn = new PDO("mysql:host={$host};dbname={$dbase}",$user,$pass);
				break;
			case 'sqlite':
				$conn = new PDO("sqlite:host={$host}");
				break;		
		}	



		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

		return $conn;
	}
}