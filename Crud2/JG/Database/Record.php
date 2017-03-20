<?php 

namespace JG\Database;

use JG\Database\QueryBuilder;
use JG\Database\Transaction;
use JG\Traits\Attributes;

class Record extends QueryBuilder
{
	protected $connection;
	use Attributes;

	public function __construct()
	{
		$this->connection = Transaction::open();
	}

	public function all()
	{
		try
		{
			$pdo = $this->connection->prepare($this->queryBuilder());
			$pdo->execute();
			return $pdo->fetchAll();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function first()
	{
		try
		{
			$pdo = $this->connection->prepare($this->queryBuilder());
			$pdo->execute();
			return $pdo->fetch();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function count()
	{
		try 
		{
			$pdo = $this->connection->prepare($this->queryBuilder());
			$pdo->execute();
			return $pdo->rowCount();
		} 
		catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	}

	public function save()
	{
		try
		{
			$sql = $this->insertSql();
			$pdo = $this->connection->prepare($sql);

			foreach ($this->data as $key => $value)
			{
				$pdo->bindValue(":$key","$value");
			}
			$pdo->execute();

			return $this->connection->lastInsertId();

		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function update($valor)
	{
		try
		{
			$sql = $this->updateSql();
			$pdo = $this->connection->prepare($sql);

			foreach ($this->data as $key => $value)
			{
				$pdo->bindValue(":$key",$value);
			}

			if ($this->where)
			{
				$pdo->bindValue(":$this->variavel",$valor);
			}

			$pdo->execute();

			return $pdo->rowCount();
			
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function delete()
	{
		
	}
}