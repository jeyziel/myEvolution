<?php 

/**
*classe reponsavel pelo conexao com o banco de dados
*@author jeyziel gama
*/

namespace Jg\Database;

use \Pdo;
use \Exception;

class Connection 
{
    const INIFILE = "./config/database.ini";

    private function __construct(){}

    public static function open()
    {
        if (file_exists(self::INIFILE))
        {
            $db = parse_ini_file(self::INIFILE);
        }
        else
        {
            throw new Exception('Arquivo ou pasta nao existe');
        }

        $drive = $db['driver'] ?? null;
        $host = $db['host'] ?? null;
        $dbase = $db['database'] ?? null;
        $user = $db['username'] ?? null;
        $pass = $db['password'] ?? null;

        switch($drive)
        {
            case 'mysql' :
                $conn = new PDO("mysql:host={$host};dbname={$dbase}",$user,$pass);
                break;
            case 'sqlite':
				$conn = new PDO("sqlite:{$host}");
				break;	
        }
        // define para que o PDO lance exceções na ocorrência de erros
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		return $conn;

    }


}