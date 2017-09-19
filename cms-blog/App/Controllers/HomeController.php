<?php

namespace App\Controllers;


use App\Controllers\Controller;
use Slim\Views\Twig;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class HomeController extends Controller
{
    private $userRepository;

  	public function index(Request $request, Response $response,Twig $view)
  	{
  	    return $view->render($response,'home.twig',['nome' => 'jeyziel']);
  	}



}
