<?php 

$routes[] = ['/','Home@index'];

$routes[] = ['/posts','Posts@index'];
$routes[] = ['/posts/{id}/show','Posts@show'];
$routes[] = ['/posts/create','Posts@create'];
$routes[] = ['/posts/store','Posts@store'];
$routes[] = ['/posts/{id}/edit','Posts@edit'];
$routes[] = ['/posts/{id}/update','Posts@update'];
$routes[] = ['/posts/{id}/delete','Posts@delete'];

return $routes;