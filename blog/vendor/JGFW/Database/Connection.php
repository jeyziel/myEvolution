<?php 

namespace JGFW\Database;

use \PDO;
use \Exception;

final class Connection
{
    private function __construct(){}

    public static function open()
    {
        if (file_exists("../App/Config/blog.ini"))
        {
            $db = parse_ini_file("../App/Config/blog.ini");
        }
        $type = $db['type']??null;
        $name = $db['name']??null;
        $user = $db['user']??null;
        $pass = $db['pass']??null;
        $host = $db['host']??null;

        switch($type)
        {
            case 'mysql':
                $conn = new \PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
                break;
            case 'sqlite':
                $conn = new \PDO("sqlite:{$name}");     
                break;
            default:
                echo 'Informe um driver válido';
        }
        // define para que o PDO lance exceções na ocorrência de erros
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		return $conn;
    }
}