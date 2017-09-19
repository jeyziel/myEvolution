<?php 

use App\Controllers\HomeController;
use Interop\Container\ContainerInterface;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;
use Slim\Router;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use function DI\get;

return [
	// 'router' => get(Slim\Router::class),
	'flash' => function(ContainerInterface $c) {
		return new Messages;
	},
	Twig::class => function (ContainerInterface $c) {
        $twig = new Twig(__DIR__.'/../resources/views', [
            'cache' => false
        ]);
        $twig->addExtension(new TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));
        $twig->getEnvironment()->addGlobal('flash',$c->get('flash'));
        return $twig;
    },
    'csrf' => function(ContainerInterface $c) {
        return new Guard;
    },
];