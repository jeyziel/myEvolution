<?php 
session_start();

ini_set('display_errors', 1);

require_once "vendor/autoload.php";
require_once "App/Functions/functions.php";
require_once "App/Functions/Helper.php";


use Core\Routes;
use Core\Bind;
use App\Models\Connection;


Bind::bind('connection',Connection::connection());

$route = new Routes;


