<?php

namespace App\Traits;

use Core\Bind;

trait DB
{
    private $connection;

    public function __construct()
    {
        $this->connection = Bind::get('connection');
    }

    public function find($field,$value)
    {
        $sql = "select * from {$this->table} where {$field} = ?";
        $find = $this->connection->prepare($sql);
        $find->bindValue(1,$value);
        $find->execute();
        return $find->fetch();
    }

    public function all()
    {
        $sql = "select * from {$this->table}";
        $all = $this->connection->prepare($sql);
        $all->execute();
        return $all->fetchAll();
    }
}