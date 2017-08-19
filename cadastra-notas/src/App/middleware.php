<?php 

use App\Middleware\CsrfViewMiddleware;
use App\Middleware\OldInputMiddleware;
use App\Middleware\ErrorsValidation;
use Slim\Views\Twig;

$app->add(new OldInputMiddleware($container->get(Twig::class)));
$app->add(new CsrfViewMiddleware($container->get(Twig::class),$container->get('csrf')));
$app->add($container->get('csrf'));
$app->add(new ErrorsValidation($container->get(Twig::class)));


