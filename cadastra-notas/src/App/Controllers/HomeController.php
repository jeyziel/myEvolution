<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, Twig $view)
    {
        return $view->render($response, 'home.twig',['nome' => 'salve']);
    }
}

