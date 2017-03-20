<?php 

namespace JG\Database;

class QueryBuilder
{
	protected $select = null;
	protected $from = null;
	protected $where = null;
	protected $join;
	protected $order = null;
	protected $variavel = null;


	public function select()
	{
		$selects = func_get_args();

		if (count($selects) > 0)
		{
			$this->select = implode(',',$selects);
		}
		return $this;
	}

	public function from($from)
	{
		$this->from = $from;
		return $this;
	}

	public function where($field,$operator,$value)
	{
		$this->where = $field . ' '. $operator . ' ' . $value;
		$this->variavel = $field;
		
		return $this;
	}

	public function join($table, $join){
        if(func_num_args() != 2)
        {
            trigger_error('O método join precisa de 2 parâmetros');
        }
        $this->join = ['table'=>$table,'join'=>$joins];
        return $this;

    }

    public function order($field,$order)
    {
        $this->order = $field.' '.$order;
    }

    protected function queryBuilder()
    {
    	$query = "SELECT ";

    	if (is_null($this->select))
    	{
    		$this->select = "*";
    	}

    	$query.=$this->select. ' FROM ';

    	if (is_null($this->from))
    	{
    		$this->from = $this->table;
    	}

    	$query.=$this->from;

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
      



	// public function __toString()
	// {
	// 	return "O select está chamando os campos $this->select e o from está chamado a tabela $this->from e o where $this->where";
	// }
}