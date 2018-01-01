<?php 

namespace App\Controllers\Auth;

use App\Auth\Auth;
use App\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Support\Password;
use App\Validation\Forms\SigninForm;
use App\Validation\Forms\SignupForm;
use App\Validation\Validator;
use Slim\Flash\Messages;
use Slim\Views\Twig;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class AuthController extends Controller
{
	private $UserRepository;
	private $auth;
	private $messages;

	public function __construct()
	{
		$this->UserRepository = new UserRepository();
		$this->auth = new Auth();
		$this->messages = new Messages();
	}

	public function getSignUp(Request $request,Response $response,Twig $view)
	{
		return $view->render($response,'auth/signup.twig');
	}

	public function postSignUp(Request $request, Response $response)
	{
		$validation = (new Validator())->make($request, SignupForm::rules());

		if ($validation->isFails()){
			return $response->withRedirect('/auth/signup');	
		}
		$this->UserRepository->create([
			'username' => $request->getParam('username'),
			'email' => $request->getParam('email'),
			'password' => Password::hash($request->getParam('password')),
			'roles' => 'user',
		]);

		return $response->withRedirect('/');	
	}

	public function getSignIn(Request $request, Response $response, Twig $view)
	{
		return $view->render($response, 'auth/signin.twig');
	}

	public function postSignIn(Request $request, Response $response)
	{
		$validation = (new Validator())->make($request, SigninForm::rules());

		if ($validation->isFails()){
			return $response->withRedirect('/auth/signin');	
		}
		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);

		if (!$auth)
		{
			return $response->withRedirect('/auth/signin');	
		}

		return $response->withRedirect('/');	
	}

	public function logout(Request $request, Response $response)
	{
		$this->auth->logout();
		$this->message('info','Volte sempre');
		return $response->withRedirect('/');
	}


}