<?php 

use App\Controllers\Auth\AuthController;
use App\Controllers\Auth\PasswordController;
use Slim\Views\Twig;

$app->get('/', ['App\Controllers\HomeController', 'index'])->setName('home');

$app->group('/auth',function(){

    $this->get('/signup',['App\Controllers\Auth\AuthController','getSignUp'])->setName('auth.signup');
    $this->post('/signup',['App\Controllers\Auth\AuthController','postSignUp']);
    $this->get('/signin', ['App\Controllers\Auth\AuthController','getSignIn'])->setName('auth.signin');
    $this->post('/signin', ['App\Controllers\Auth\AuthController','postSignIn']);
    $this->get('/signout',['App\Controllers\Auth\AuthController','getSignOut'])->setName('auth.signout');
    $this->get('/password/change',['App\Controllers\Auth\PasswordController','getChangePassword'])->setName('auth.change.password');
    $this->post('/password/change',['App\Controllers\Auth\PasswordController','postChangePassword']);
});


