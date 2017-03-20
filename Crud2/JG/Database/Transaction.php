<?php 

namespace JG\Database;

use JG\Database\Connection;

Final class Transaction 
{
	private static $conn;

	/** obtem a conexao com o bando de dados **/
	public static function open()
	{
		if (empty(self::$conn))
		{
			self::$conn = Connection::open();
			//inicia a transação
			self::$conn->beginTransaction();
		}
		return self::$conn;	
	}

	/** desfaz as operaçoes **/
	public static function rollback()
	{
		self::$conn->rollback();
		self::$conn = null;
	}

	public static function close()
	{
		if (self::$conn)
		{
			self::$conn->commit();
			self::$conn = null;
		}
	}



}