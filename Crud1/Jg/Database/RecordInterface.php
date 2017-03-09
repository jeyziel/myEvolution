<?php 

namespace Jg\Database;

interface RecordInterface
{
    public function create($attributes);
    public function read();
    public function update($id,$attributes);
    public function delete($name,$value);
    public function findBy($name,$value);

}