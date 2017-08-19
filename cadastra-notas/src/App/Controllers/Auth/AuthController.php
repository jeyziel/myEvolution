<?php 

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Support\Storage\Session;
use App\Validation\Forms\SigninForm;
use App\Validation\Forms\SignupForm;
use App\Validation\Validator;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class AuthController extends Controller
{
    private $authService;
    private $userService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function getSignUp(Response $response,Twig $view)
    {
        return $view->render($response,'auth/signup.twig',['nome' => 'salve']);
    }

    public function postSignUp(Request $request, Response $response)
    {
        $validation = (new Validator())->make($request,SignupForm::rules());

        if (!$validation->fails()){
            $user = $this->authService->create($request); 
            if ($user) {
                $this->message('info','Usuario Cadastrado com sucesso');
                return $response->withRedirect('/');
            }
        } 

        return $response->withRedirect('/auth/signup');
    }

    public function getSignIn(Response $response, Twig $view)
    {
         return $view->render($response,'auth/signin.twig');
    }

    public function postSignIn(Request $request,Response $response
    )
    {
       $authenticate = $this->authService->attempt(
           $request->getParam('email'),
           $request->getParam('password')
       );

       if (!$authenticate) {
          return $response->withRedirect('/auth/signin');
       }
       $this->message('info','Login efetuado com sucesso');
       return $response->withRedirect('/');

    }

    public function getSignOut(Response $response)
    {
        $this->authService->logout();
        $this->message('info','volte sempre');
        return $response->withRedirect('/');
    }


}