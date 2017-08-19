<?php 

namespace App\Models\database\queryBuilder;

use App\Models\database\queryBuilder\QueryBuilder;

class InsertQueryBuilder extends QueryBuilder
{
	private $insert;
	private $values;
	private $sql;
	private $table;

	public function save()
	{
		$this->sql = sprintf("insert into %s (%s) values (%s)",$this->table,
			implode(',',array_keys($this->insert)), ":" . implode(',:',array_keys($this->insert)));
		$insert = $this->connection->prepare($this->sql);
		$insert->execute($this->insert);
		return $this->connection->lastInsertId();
	}

	public function insert(array $insert)
	{
		$this->insert = $insert;
		return $this;
	}

	public function table($table)
	{
		$this->table = $table;
		return $this;
	}



}