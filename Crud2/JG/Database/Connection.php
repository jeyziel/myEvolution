<?php 

namespace JG\Database;

use \PDO;
use \Exception;

/**
* classe reponsavel pela conexao com o banco de dados
*@author jeyziel gama
*/
class Connection
{
	const INIFILE = './App/Config/livro.ini';

	private function __construct(){}

	public static function open()
	{
		if (file_exists(self::INIFILE))
		{
			$db = parse_ini_file(self::INIFILE);
		}

		$host = $db['host'] ?? NULL;
		$driver = $db['driver'] ?? NULL;
		$dbase = $db['database'] ?? NULL;
		$user = $db['user'] ?? NULL;
		$pass = $db['pass'] ?? NULL;

		switch($driver)
		{
			case 'mysql':
				$conn = new PDO("mysql:host={$host};dbname={$dbase}",$user,$pass);
				break;
			case 'sqlite':
				$conn = new PDO("sqlite:{$host}");
				break;	
		}

		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

		return $conn;


	}
}