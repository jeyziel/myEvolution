<?php 

namespace App\Controllers\Auth;

use App\Auth\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Controller;
use App\Validation\Validator;
use App\Validation\Forms\ChangeForm;
use App\Services\AuthService;
use App\Services\Contracts\AuthServiceInterface;

class PasswordController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }
    public function getChangePassword(
    	Request $request, 
    	Response $response,
    	Twig $view
    )
    {
        return $view->render($response,'auth/password/change.twig');
    }

    public function postChangePassword(
    	Request $request,
    	Response $response, 
    	Twig $view
    )
    {   
        $validation = (new Validator())->make($request,ChangeForm::rules());
        if ($validation->fails())
        {
            return $response->withRedirect('/auth/password/change');
        }
        $this->authService->changePassword($request->getParam('password'));
        $this->message('info','password modificada');
        return $response->withRedirect('/');
    }
}