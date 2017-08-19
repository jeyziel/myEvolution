<?php 

namespace App\Models\database\queryBuilder;


use App\Models\database\queryBuilder\QueryBuilder;


class DeleteQueryBuilder extends QueryBuilder
{
	private $where;
	private $sqlQuery;
	private $table;
	private $sql;

	public function run()
	{
		$this->sql = $this->createSql();
		$sqlQuery = $this->connection->prepare($this->sql);
		$sqlQuery->execute($this->bindValues());
		return $sqlQuery->rowCount();
	}

	public function table($table)
	{
		$this->table = $table;
		return $this;	
	}

	private function createSql()
	{
		return sprintf("delete from %s %s",$this->table,$this->createWhere());
	}

	public function where(array $where)
	{
		$this->where = $where;
		return $this;
	}

	private function createWhere()
	{
		return " where {$this->where[0]} {$this->where[1]} :{$this->where[0]}";
	}

	private function bindValues()
	{
		return [$this->where[0] => $this->where[2]];
	}






}