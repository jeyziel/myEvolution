<?php 

namespace JGFW\Database;

use JGFW\Database\Connection;

class Transaction
{
    private static $conn;

    private function __construct(){}

    /**abre a conexao**/
    public static function open()
    {
        if(empty(self::$conn))
        {
            self::$conn = Connection::open();
            self::$conn->beginTransaction();
        }
    }

    /**retorna a conexao**/
    public static function get()
    {
        return self::$conn;
    }

    /**desfaz as operacoes **/
    public static function rollback()
    {
        self::$conn->rollback();
        self::$conn = null;
    }

    /** aplica as alterações e fecha a conexao**/
    public static function close()
    {
        if(self::$conn)
        {
            self::$conn->commit();
            self::$conn = null;
        }
    }


}