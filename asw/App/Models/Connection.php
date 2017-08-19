<?php

namespace App\Models;

use PDO;

class Connection{
 
    public static function connection(){
        $pdo = new PDO("mysql:host=localhost;dbname=crud;charset=utf8","root","root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
    }

}