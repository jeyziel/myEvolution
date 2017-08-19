<?php

namespace App\Models\database\queryBuilder;

use App\Models\database\queryBuilder\ConditionsPaginate;
use App\Models\database\queryBuilder\SelectPaginate;


class SelectQueryBuilder extends QueryBuilder
{
    private $sql;
    private $select;
    private $where;
    private $and;
    private $or;
    private $order;
    private $limit;
    private $group;
    private $join;
    private $on;
    private $table;
    private $search;
    private $orSearch;
    private $debugSql;
    private $first;
    private $paginate;
    private $selectToPaginate;
    private $conditionsPaginate;

    public function get()
    {
        $fields = SelectFieldsTable::select($this->select);

        $this->sql = "select {$fields} from {$this->table}";

        if(isset($this->join))
        {
            $selectJoin = new SelectJoin();
            $this->sql .= $selectJoin->join($this->join,$this->on);
        }

        if (isset($this->where))
        {
            $selectWhere = new SelectWhere();
            $this->sql .= $selectWhere->where($this->where);
        }

        if(isset($this->and))
        {
            $selectAnd = new SelectAnd();
            $this->sql .= $selectAnd->and($this->and);
        }

        $conditionsPaginate = new ConditionsPaginate;

        if (isset($this->search)) {
            $selectSearch = new SelectSearch;
            $this->sql .= $selectSearch->search($this->search);

            $conditionsPaginate->isSearch = true;
        }

        if(isset($this->orSearch))
        {
            $SelectOrsearch = new SelectOrSearch();
            $this->sql.= $SelectOrsearch->orSearch($this->orSearch);
        }

        if(isset($this->or))
        {
            $selectOr = new SelectOr();
            $this->sql .= $selectOr->or($this->or);
        }

        if(isset($this->order))
        {
            $selectOrder = new SelectOrder();
            $this->sql .= $selectOrder->order($this->order);
        }

        if(isset($this->group))
        {
            $selectLimit = new SelectGroup();
            $this->sql .= $selectLimit->group($this->group);
        }

        if(isset($this->limit))
        {
            $selectLimit = new SelectLimit();
            $this->sql .= $selectLimit->limit($this->limit);
        }

        if(isset($this->debugSql))
        {
            dd($this->sql);
        }

        if(isset($this->paginate)) {
           $selectPaginate = $this->connection->prepare($this->sql);
           $this->selectToPaginate = new SelectPaginate($conditionsPaginate);
           $this->sql .= $this->selectToPaginate->sqlToPaginate($this->paginate);
        }

        $select = $this->connection->prepare($this->sql);
       
        if (isset($this->where)) {
            $whereBind = new SelectWhereBind;
            $select = $whereBind->where($this->where, $select);
            $selectPaginate = $whereBind->where($this->where, $selectPaginate);
        }

        if (isset($this->and)) {
            $andBind = new SelectAndBind;
            $select = $andBind->and($this->and, $select);
            $selectPaginate = $andBind->where($this->and, $selectPaginate);
        }

        if (isset($this->or)) {
            $orBind = new SelectOrBind;
            $select = $orBind->or($this->or, $select);
            $selectPaginate = $orBind->where($this->or, $selectPaginate);
        }

        if (isset($this->search)) {
            $searchBind = new SelectSearchBind;
            $select = $searchBind->search($this->search, $select);
            $selectPaginate = $searchBind->search($this->search, $selectPaginate);
        }

        if (isset($this->orSearch)) {
            $orSearchBind = new SelectOrSearchBind;
            $select = $orSearchBind->orSearch($this->orSearch, $select);
            $selectPaginate = $orSearchBind->orSearch($this->orSearch, $selectPaginate);
        }

        $conditionsPaginate->select = $selectPaginate;


        try
        {
            $select->execute();

            if ($this->first) {
                return $select->fetch();
            }
            return $select->fetchAll();
        }
        catch (\Throwable $e)
        {
            dd($e->getMessage());
        }

        return $this->sql;
    }

    public function select($select)
    {
        $this->select = $select;
        return $this;
    }

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function where(...$where)
    {
        $this->where = $where;
        return $this;
    }

    public function and(...$and)
    {
        $this->and = $and;
        return $this;
    }

    public function or(...$or)
    {
        $this->or = $or;

        return $this;
    }

    public function order(...$order)
    {
        $this->order = $order;

        return $this;
    }

    public function group(...$group)
    {
        $this->group = $group;

        return $this;
    }

    public function limit(...$limit)
    {
        $this->limit = $limit;

        return $this;
    }

    public function join(...$join)
    {
        $this->join = $join;

        return $this;
    }

    public function on(...$on)
    {
        $this->on = $on;

        return $this;
    }

    public function search(...$search)
    {
        $this->search = $search;
        return $this;
    }

    public function orSearch(...$orSearch)
    {
        $this->orSearch = $orSearch;
        return $this;
    }

    public function first()
    {
        $this->first = true;
        return $this;
    }

    public function paginate(...$paginate)
    {
        $this->paginate = $paginate;
        return $this;
    }

    public function sql()
    {
       $this->debugSql = true;
       return $this;
    }

    public function render() {
        return $this->selectToPaginate->render();

    }


}