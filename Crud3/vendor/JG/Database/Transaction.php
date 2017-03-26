<?php 

/*
* @author jeyziel gama
*Classe responsavel pela transacao da conexao
*/

namespace JG\Database;

Final class Transaction
{
	private static $conn;

	public function open()
	{
		if(empty(self::$conn))
		{
			self::$conn = Connection::open();
			self::$conn->beginTransaction();
		}
	}

	/**
	*retorna a conexao
	*/
	public function get()
	{
		return self::$conn;
	}

	/**
	*desfaz as operações
	*/
	public function rollback()
	{
		self::$conn->rollback();
		self::$conn = null;
	}

	/*
	*aplica as alterações e fecha a conexao
	*/
	public function close()
	{
		if (self::$conn)
		{
			self::$conn->commit();
			self::$conn = null;
		}
	}





}