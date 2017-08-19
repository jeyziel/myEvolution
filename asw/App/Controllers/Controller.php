<?php 

namespace App\Controllers;

use App\Classes\Template;
use App\Classes\Message;

abstract class Controller
{
	protected $template;

	public function __construct()
	{
		$this->template = new Template;
	}

	protected function view($data,$master)
	{
		$this->template->data($data)->load($master)->render();
	}

}