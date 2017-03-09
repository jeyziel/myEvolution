<?php 

/**
*classe responsável pela transacao com o banco de dados
*/
namespace Jg\Database;

use Jg\Database\Connection;


class Transaction 
{
    private static $conn;

    /*
    *nao pode ser instanciado
    */
    private function __construct(){}

    public static function open()
    {
        if (empty(self::$conn))
        {
            self::$conn = Connection::open();
            //inicia a transacao
            self::$conn->beginTransaction();
        }
       
    }

    /**
    *retorna a conecao ativa
    */
    public static function get()
    {
        return self::$conn;
    }

    /** desfaz as operaçoes **/
    public static function rollback()
    {
        self::$conn->rollback();
        $self::$conn = null;
    }

    /**
    *realiza as operações
    */
    public static function close()
    {
        if (self::$conn)
        {
            self::$conn->commit();
            self::$conn = null;
        }
    }
    
}