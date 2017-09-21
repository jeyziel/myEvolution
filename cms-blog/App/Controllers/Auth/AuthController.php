<?php 

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use Slim\Views\Twig;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class AuthController
{
	public function getSignUp(Request $request,Response $response,Twig $view)
	{
		return $view->render($response,'auth/signup.twig');
	}

	public function postSignUp()
}