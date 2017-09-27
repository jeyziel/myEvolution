<?php 

namespace App\Middleware;

use App\Support\Storage\Session;
use Slim\Views\Twig;

class ErrorsMiddleware
{
	private $view;

	public function __construct(Twig $view)
	{
		$this->view = $view;
	}

	public function __invoke($request, $response, $next)
	{
		if ( Session::get('errors') ) {
			$this->view->getEnvironment()->addGlobal('errors',  Session::get('errors'));
			Session::destroy('errors');
		}
		$response = $next( $request, $response );
		return $response;
	}
}