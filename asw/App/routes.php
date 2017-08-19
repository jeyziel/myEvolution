<?php

$route->group('site',function() use($route){
	$route->get('/','HomeController@index');
    $route->get('/posts/show/{id}','PostsController@index');
    $route->get('/home/search','HomeController@search');
    $route->get('/user/create','UserController@create');
    $route->post('/user/store','UserController@store');
    $route->get('/login/create','LoginController@create');
    $route->post('/login/store','LoginController@store');
});










//
//$route->get('/posts','site\PostsController@index',['auth']);
//
//$route->get('/posts/{id}','site\PostsController@show',['auth']);
//
//// $route->get('/posts/{name}','site\PostsController@show');
//
//$route->get('/user/show/{id}','site\UserController@create');
//
//$route->post('/user/store','site\UserController@store');
$route->run();



