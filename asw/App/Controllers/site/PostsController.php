<?php 

namespace App\Controllers\site;

use App\Controllers\Controller;

class PostsController extends Controller
{

    public function index()
    {
        dd('index');
    }
	public function show($request)
	{

		$master = 'site/layout';

		$data = [
			'titulo' => 'PostsController',
			'view' => 'posts'
		];

		$this->view($data,$master);
	}


}