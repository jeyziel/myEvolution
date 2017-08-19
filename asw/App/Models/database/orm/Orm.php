<?php

namespace App\Models\database\orm;

use Core\Bind;
use App\Models\database\queryBuilder\SelectQueryBuilder;
use App\Models\database\queryBuilder\InsertQueryBuilder;
use App\Models\database\queryBuilder\UpdateQueryBuilder;
use App\Models\database\queryBuilder\DeleteQueryBuilder;


class Orm
{
    private $selectQueryBuilder;

    public function insert($insert)
    {
    	$insertQueryBuilder = new InsertQueryBuilder();
    	return $insertQueryBuilder->table($this->table)->insert($insert);
    }

    public function selected($select)
    {
       $this->selectQueryBuilder = new SelectQueryBuilder();
       return $this->selectQueryBuilder->table($this->table)->select($select);
    }

    public function update()
    {
    	$updateQueryBuilder = new UpdateQueryBuilder();
    	return $updateQueryBuilder->table($this->table);
    }

    public function delete()
    {
    	$deleteQueryBuilder = new DeleteQueryBuilder();
    	return $deleteQueryBuilder->table($this->table);
    }

    public function render() {
        return $this->selectQueryBuilder->render();
    }


}

