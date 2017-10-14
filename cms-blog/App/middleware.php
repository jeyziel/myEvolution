<?php 

use App\Middleware\CsrfViewMiddleware;
use App\Middleware\ErrorsMiddleware;
use App\Middleware\OldInputMiddleware;
use Slim\Views\Twig;

$app->add(new ErrorsMiddleware($container->get(Twig::class)));
$app->add( new OldInputMiddleware($container->get(Twig::class)) );
$app->add(new CsrfViewMiddleware($container->get(Twig::class),$container->get('csrf')));
$app->add($container->get('csrf'));