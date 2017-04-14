<?php 

namespace App\Controllers;

use JGFW\Controller\BaseController as Controller;


class Home extends Controller
{
    public function index()
    {
       $this->setTitle("Mini framework"); 
       $this->renderView('home/index','layout');
    }
}