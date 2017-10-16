<?php 

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Validation\Forms\SignupForm;
use App\Validation\Validator;
use Slim\Views\Twig;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class AuthController
{
	private $UserRepository;

	public function __construct()
	{
		$this->UserRepository = new UserRepository();
	}

	public function getSignUp(Request $request,Response $response,Twig $view)
	{
		return $view->render($response,'auth/signup.twig');
	}

	public function postSignUp(Request $request, Response $response)
	{
		$validation = (new Validator())->make($request, SignupForm::rules());
		if (!$validation->isFails()){
			$this->UserRepository->create([
				'username' => $request->getParam('username'),
				'email' => $request->getParam('email'),
				'password' => $request->getParam('password'),
				'roles' => 'user',
			]);
			return $response->withRedirect('/');	
		}
		return $response->withRedirect('/auth/signup');	
	}

	public function getSignIn(Request $request, Response $response, Twig $view)
	{
		return $view->render($response, 'auth/signin.twig');
	}

	public function postSignIn(Request $request, Response $response)
	{

	}


}