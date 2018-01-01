<?php 

namespace App\Controllers\Admin;

use App\Auth\Auth;
use App\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Support\Password;
use App\Support\Storage\Session;
use App\Validation\Forms\SigninForm;
use App\Validation\Validator;
use Slim\Flash\Messages;
use Slim\Views\Twig;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class AdminController 
{
	private $auth;

	public function __construct()
	{
		$this->auth = new Auth();
	}

	public function getSignIn(Request $request,Response $response,Twig $view)
	{
		return $view->render($response, 'auth/admin/signin.twig');
	}

	public function postSignIn(Request $request,Response $response)
	{
		$validation = (new Validator())->make($request, SigninForm::rules());

		if ($validation->isFails()){
			return $response->withRedirect('/admin/signin');	
		}

		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);

		if ( !$auth || !$this->auth->isAdmin())
		{
			$this->auth->logout();
			return $response->withRedirect('/admin/signin');	
		}
		return $response->withRedirect('/dashboard');
	}
}