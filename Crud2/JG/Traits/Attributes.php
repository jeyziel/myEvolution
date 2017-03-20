<?php 

namespace JG\Traits;

/**
*CLASSE RESPONSAVEL POR REALIZAR AS OPERAÇÕES DE INSERT E DELETE
*/

trait Attributes
{
	protected $data = [];


	public function __set($key,$value)
	{
		$this->data[$key] = $value;
	}

	public function __get($key)
	{
		return $this->data[$key];
	}
	//"INSERT INTO TABELA ()"
	public function insertFields()
	{
		return implode(',',array_keys($this->data));
	}

	public function insertValues()
	{
		return ':' .  implode(',:',array_keys($this->data));
	}

	public function insertSql()
	{
		return "INSERT INTO {$this->table}({$this->insertFields()}) VALUES ({$this->insertValues()})";
	}

	public function updateSql()
	{
		$sql = "UPDATE {$this->table} set ";
		foreach ($this->data as $key => $value)
		{
			$sql .= "$key=:$key,";
		}
		$sql = rtrim($sql,",");

		if (!is_null($this->where))
		{
			$sql.=' where ' . $this->where;
		}
		return $sql;
	}


}