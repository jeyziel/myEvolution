<?php 

namespace App\Models\database\queryBuilder;

use App\Models\database\queryBuilder\QueryBuilder;


class UpdateQueryBuilder extends queryBuilder
{
	private $table;
	private $set;
	private $where;
	private $andWhere;
	private $orWhere;

	public function edit()
	{
		$updateQuery = $this->createSql();
		$update = $this->connection->prepare($updateQuery);
		$updateBind = $this->bindValues();
		$update->execute($updateBind);

		return $update->rowCount();
		

	}

	public function set(array $set)
	{
		$this->set = $set;
		return $this;
	}

	public function where($where)
	{
		$this->where = $where;
		return $this;
	}

	public function table($table)
	{
		$this->table = $table;
		return $this;
	}

	private function createSql()
	{
		return sprintf("Update %s %s %s",$this->table,$this->createSet(),$this->createWheres());
	}

	private function createSet()
	{
		$sqlSet = "set ";
		if(is_array($this->set)) {
			foreach($this->set as $key => $value) {
				$sqlSet .= " {$key} = :{$key},";
			}
		}
		return rtrim($sqlSet,',');
	}

	private function createWheres()
	{
		$where = " Where ";
		if(!is_null($this->where)){
			$param = $this->where[0];
			$sinal = $this->where[1];
			$where .= " {$param} {$sinal} :{$param}";
		}

		return $where;

	}

	private function bindValues()
	{
		$array = [$this->where[0]];
		$array = array_fill_keys($array,$this->where[2]);
		return array_merge($this->set,$array);

	}
}