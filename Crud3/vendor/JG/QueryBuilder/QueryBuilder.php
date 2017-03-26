<?php 

namespace JG\QueryBuilder;

use \Exception;

abstract class QueryBuilder
{
	private $select = null;
	private $from = null;
	private $where  = null;
	private $order = null;
	private $variavel = null;
	protected $field = null;
	protected $value = null;

	/**
	*pega os campos da tabela
	*/
	public function select()
	{
		$selects = func_get_args();

		if (func_num_args() > 1)
		{
			$this->select = '(' . implode(',',$selects) . ') ';
		}

		return $this;
	}

	/**
	*pega o nome da tabela
	*/
	public function from($from)
	{
		$this->from = $from;
		return $this;
	}

	/*
	*cria o where da query
	*/
	public function where($field,$operator,$value)
	{
		if (func_num_args() != 3)
		{
			new Exception("O metodo precisa de 3 argumentos");
		}
		else
		{
			
			$this->field = $field;
			$this->value = $value;

			$this->where = $field . ' ' . $operator . ' ' . ':'.$field;
		}
		return $this;
	}

	//ORDER BY ID DESC
	public function order($field,$order)
    {
        $this->order = $field.' '.$order;
    }

    //cria as fields da tabela
    public function insertFields():String
    {
    	return implode(',',array_keys($this->data));
    }

    //cria os values da tabela 
    public function insertValue():String
    {
    	return ':' . implode(',:',array_keys($this->data));
    }

    //retorna a query do insert pronta
    public function queryInsert():String
    {
    	return "INSERT INTO {$this->getEntity()}({$this->insertFields()}) VALUES ({$this->insertValue()})";
    }

    //RETORNA A QUERY DO SELECT
    public function querySelect():String
    {
    	$query = "SELECT ";

    	if (is_null($this->select))
    	{
    		$this->select = "* ";
    	}

    	$query.=$this->select. ' FROM ';

    	if(is_null($this->from))
    	{

    		$this->from = $this->getEntity();
    	}

    	$query.= $this->from;

    	if (!is_null($this->where))
    	{
    		$query.=' where ' . $this->where;
    	}

    	if (!is_null($this->order))
    	{
    		$query .= ' ORDER BY ' . $this->order;
    	}
    	return $query;
    }


    //retorna a query do update pronta
    public function queryUpdate():String
    {
    	$sql = "UPDATE {$this->getEntity()} SET ";

    	foreach ($this->data as $key => $value)
    	{
    		$sql .= "$key = :$key,";
    	}

    	$sql = rtrim($sql,",");

    	if (!is_null($this->where))
    	{
    		$sql.= ' WHERE ' . $this->where;
    	}

    	

    	return $sql;
    }

    public function queryDelete()
    {
    	$sql = "DELETE FROM {$this->getEntity()}";
    	$sql.= ' WHERE ' . $this->where;

    	return $sql;


    }

    




}