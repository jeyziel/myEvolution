<?php 

use App\Controllers\HomeController;
use App\Middleware\AdminMiddleware;

$app->get('/',['App\Controllers\HomeController','index'])->setName('home');

$app->group('/auth', function(){
	$this->get('/signup',['App\Controllers\Auth\AuthController','getSignUp'])->setName('auth.signup');
    $this->post('/signup',['App\Controllers\Auth\AuthController','postSignUp']);
    $this->get('/signin', ['App\Controllers\Auth\AuthController','getSignIn'])->setName('auth.signin');
    $this->post('/signin', ['App\Controllers\Auth\AuthController','postSignIn']);
    $this->get('/logout',['App\Controllers\Auth\AuthController','logout'])->setName('auth.logout');
});

$app->group('/admin', function() {
	$this->get('/signin', ['App\Controllers\Admin\AdminController','getSignIn'])->setName('admin.signin');
    $this->post('/signin', ['App\Controllers\Admin\AdminController','postSignIn']);
});

$app->group('/dashboard', function() {
    $this->get('',['App\Controllers\Admin\DashBoardController','index'])->setName('admin.index');
    $this->get('/category', ['App\Controllers\Admin\DashBoardController','createCategory'])->setName('create.category');
    $this->post('/category', ['App\Controllers\Admin\DashBoardController','storeCategory']);
    $this->get('/post',['App\Controllers\Admin\DashBoardController','createPost'])->setName('create.post');
    $this->post('/post',['App\Controllers\Admin\DashBoardController','storePost']);
})->add(new AdminMiddleware());


