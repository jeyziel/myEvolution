<?php 

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Validation\Forms\SignupForm;
use App\Validation\Validator;
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

	public function postSignUp(Request $request, Response $response, Twig $view)
	{
		$validation = (new Validator())->make($request, SignupForm::rules());

		return $response->withRedirect('/auth/signup');
		
	}
}