<?php 

use App\Middleware\ErrorsMiddleware;
use Slim\Views\Twig;

$app->add(new ErrorsMiddleware($container->get(Twig::class)));