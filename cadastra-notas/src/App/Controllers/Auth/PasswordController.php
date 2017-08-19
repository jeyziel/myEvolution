<?php 

namespace App\Controllers\Auth;

use App\Auth\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Controller;

class PasswordController extends Controller
{
    public function getChangePassword(Request $request, Response $response,Twig $view)
    {
        return $view->render($response,'auth/password/change.twig');
    }

    public function postChangePassword(Request $request,Response $response, Twig $view)
    {
        
    }
}