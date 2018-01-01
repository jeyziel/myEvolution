<?php 

use App\Auth\Auth;
use App\Controllers\HomeController;
use App\Repositories\UserRepository;
use Interop\Container\ContainerInterface;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;
use Slim\Router;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use function DI\get;

return [
	'router' => get(Slim\Router::class),
	'flash' => function(ContainerInterface $c) {
		return new Messages;
	},
    'auth' => function(ContainerInterface $c) {
        return new Auth;
    },
	Twig::class => function (ContainerInterface $c) {
        $twig = new Twig(__DIR__.'/../resources/views', [
            'cache' => false
        ]);
        $twig->addExtension(new TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));
        $twig->getEnvironment()->addGlobal('auth',[
            'check' => $c->get('auth')->check(),
            'user' => $c->get('auth')->user()
        ]);
        $twig->getEnvironment()->addGlobal('flash',$c->get('flash'));
        return $twig;
    },
    'csrf' => function(ContainerInterface $c) {
        return new Guard;
    },
    UserRepositoryInterface::class => DI\object(UserRepository::class),
];