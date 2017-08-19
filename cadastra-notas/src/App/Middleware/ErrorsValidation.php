<?php 

namespace App\Middleware;

use Slim\Views\Twig;
use App\Support\Storage\Session;

class ErrorsValidation
{
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }
    public function __invoke($request,$response,$next)
    {
        if (Session::get('errors')) {
            $this->view->getEnvironment()->addGlobal('errors', Session::get('errors'));
            Session::destroy('errors');
        }

        $response = $next($request,$response);
        return $response;
    }
}