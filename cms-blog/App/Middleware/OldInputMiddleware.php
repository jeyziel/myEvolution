<?php 

namespace App\Middleware;

use App\Support\Storage\Session;
use Slim\Views\Twig;

class OldInputMiddleware
{
	private $view;

	public function __construct(Twig $twig)
	{
		$this->view = $twig;
	}
	public function __invoke($request, $response, $next)
	{
		if ( Session::find('old') ) {
			$this->view->getEnvironment()->addGlobal('old',Session::get('old'));
		}
		Session::set('old', $request->getParams() );
		$response = $next( $request, $response );
		return $response;
	}
}