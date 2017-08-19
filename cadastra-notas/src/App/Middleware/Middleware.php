<?php 

namespace App\Middleware;

use Slim\Views\Twig;

class Middleware
{
	protected $container;

	public function __construct($container)
	{
		$this->container = $container;
	}
}