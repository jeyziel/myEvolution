<?php 

namespace JG\Model;

use JG\Database\Transaction;
use JG\Interfaces\RecordInterface;
use JG\QueryBuilder\QueryBuilder;

abstract class Record extends QueryBuilder implements RecordInterface
{
	protected $data;
	protected $conn;

	public function __construct()
	{
		$this->conn = Transaction::get();
	}

	public function __set($name,$value)
	{
		$this->data[$name] = $value;
	}

	public function __get($name)
	{
		if (isset($this->data[$name]))
			return $this->data[$name];
	}

	public function toArray()
	{
		return $this->data;
	}

	public function __isset($name)
	{
		return isset($this->data[$name]);
	}

	public function getEntity ()
    {
    	$class = get_class($this);
    	return constant("{$class}::TABLENAME");
    }

    //realiza o store no banco de dados
	public function store()
	{
		try
		{
			$pdo = $this->conn->prepare($this->queryInsert());

			foreach ($this->data as $key => $value)
			{
				$pdo->bindValue(":$key","$value");
			}

			$pdo->execute();
			return $this->conn->lastInsertId();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	//realiza o select
	public function all()
	{
		try
		{
			$pdo = $this->conn->prepare($this->querySelect());
			if ($this->value)
			{
				$pdo->bindValue(":{$this->field}",$this->value);
			}
			$result = $pdo->execute();
			
			if ($result)
			{
				while($row = $pdo->fetchObject(get_class($this)))
                {
                    //armazena os resultado no array
                    $results[] = $row;
                    
                }
			}
			return $results;


		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	//retorna apenas 1
	public function first()
	{
		$pdo = $this->conn->prepare($this->querySelect());

		if ($this->value)
		{
			$pdo->bindValue(":{$this->field}",$this->value);
		}
		$result = $pdo->execute();

		if ($result)
		{
			$object = $pdo->fetchObject(get_class($this));
		}

		return $object;


	}

	//realiza o update no bando de dados
	public function update()
	{
		try
		{
			$pdo = $this->conn->prepare($this->queryUpdate());

			
			foreach ($this->data as $key => $val)
			{
				$pdo->bindValue(":$key",$val);
			}

			if ($this->value)
			{
			
				$pdo->bindValue(":$this->field",$this->value);
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
		$pdo = $this->conn->prepare($this->queryDelete());

		if ($this->value)
		{
			$pdo->bindValue(":$this->field",$this->value);
		}

		return $pdo->execute();
	}




}