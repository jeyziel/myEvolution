<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 15/06/17
 * Time: 23:19
 */

namespace App\Models\database\queryBuilder;

use Core\Bind;


abstract class QueryBuilder
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Bind::get('connection');
    }

    abstract public function table($table);
}