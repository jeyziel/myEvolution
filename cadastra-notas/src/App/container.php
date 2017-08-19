<?php
use App\Auth\Auth;
use App\Middleware\Middleware;
use App\Middleware\OldInputMiddleware;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\UserService;
use App\Support\Storage\Session;
use Interop\Container\ContainerInterface;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use function DI\get;

return [
    'router' => get(Slim\Router::class),
    'auth' => function(ContainerInterface $c) {
        return new Auth;
    },
    'flash' => function(ContainerInterface $c) {
       return new \Slim\Flash\Messages;
    },
    Twig::class => function (ContainerInterface $c) {
        $twig = new Twig(__DIR__.'/../../resources/views', [
            'cache' => false
        ]);
        $twig->addExtension(new TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));
        $twig->getEnvironment()->addGlobal('auth',[
            'check' => $c->get('auth')->check(),
            'user' => $c->get('auth')->user(),
        ]);
        $twig->getEnvironment()->addGlobal('flash',$c->get('flash'));
        return $twig;
    },
    'csrf' => function(ContainerInterface $c) {
        return new Guard;
    },
    AuthServiceInterface::class => DI\object(AuthService::class),
    UserRepositoryInterface::class => DI\object(UserRepository::class),
    UserServiceInterface::class => DI\object(UserService::class),

];