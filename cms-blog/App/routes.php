<?php 

use App\Controllers\HomeController;

$app->get('/',['App\Controllers\HomeController','index'])->setName('home');

