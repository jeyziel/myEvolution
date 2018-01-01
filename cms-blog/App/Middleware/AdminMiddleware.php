<?php 

namespace App\Middleware;

use App\Auth\Auth;

class AdminMiddleware 
{
	private $auth;

	public function __construct()
	{
		$this->auth = new Auth();
	}

	public function __invoke($request, $response, $next)
	{
		if ( !$this->auth->isAdmin() ) {
			return $response->withRedirect('/');
		}

		$response = $next( $request, $response ) ;
		return $response;
	}
}