<?php 

namespace Jg\Database;

use Jg\Database\RecordInterface;
use Jg\Database\Transaction;
use Jg\Database\AttributesCreate;
use Jg\Database\AttributeUpdate;

class Record implements RecordInterface
{
    private $attributes;
    private $database;

    public function __construct()
    {
        $this->database = Transaction::get();
       
    }

    public function create($attributes)
    {
        $this->attributes = new AttributesCreate();

        $fields = $this->attributes->createFields($attributes);
        $values = $this->attributes->createValues($attributes);

        $query = "INSERT INTO {$this->getEntity()}($fields) VALUES($values)";
        $pdo = $this->database->prepare($query);
        $bindParameters = $this->attributes->bindCreateParameters($attributes);

        try
        {
            $pdo->execute($bindParameters);
            return $this->database->lastInsertId();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function read()
    {
       $query = "SELECT * FROM {$this->getEntity()}";
       $pdo = $this->database->prepare($query);

       try
       {
            $pdo->execute();
            return $pdo->fetchAll();
       }
       catch(Exception $e)
       {
            echo $e->getMessage();
       }
    }

    public function update($id,$attributes)
    {
        $attributesUpdate = new AttributesUpdate();
        $fields = $attributesUpdate->updateFields($attributes);

        $query = "UPDATE {$this->getEntity()} SET {$fields} WHERE id = :id";
        $pdo = $this->database->prepare($query);
        $bindUpdateParameters = $attributesUpdate->bindUpdateParameters($attributes);
        $bindUpdateParameters[':id'] = $id;

        try
        {
           $pdo->execute($bindUpdateParameters);
           return $pdo->rowCount();
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

        
    }

    public function delete($name,$value)
    {
        $query = "DELETE FROM {$this->getEntity()} WHERE $name= :{$name}";
        $pdo = $this->database->prepare($query);

        try
        {
            $pdo->bindParam(":$name",$value);
            $pdo->execute();
            return $pdo->rowCount();
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function findBy($name,$value)
    {
        $query = "SELECT * FROM users WHERE $name = :$name";
        $pdo = $this->database->prepare($query);

        try
        {
            $pdo->bindParam(":$name",$value);
            $pdo->execute();
            return $pdo->fetch();
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function getEntity()
    {
        $class = get_class($this);
        return constant("{$class}::TABLENAME"); 
    }



}