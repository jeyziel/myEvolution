<?php 

use App\Controllers\HomeController;

$app->get('/',['App\Controllers\HomeController','index'])->setName('home');

$app->group('/auth', function(){
	$this->get('/signup',['App\Controllers\Auth\AuthController','getSignUp'])->setName('auth.signup');
    $this->post('/signup',['App\Controllers\Auth\AuthController','postSignUp']);
    $this->get('/signin', ['App\Controllers\Auth\AuthController','getSignIn'])->setName('auth.signin');
    $this->post('/signin', ['App\Controllers\Auth\AuthController','postSignIn']);
});

