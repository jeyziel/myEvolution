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

	public function __get( $name )
	{
		if ( $this->container->get( $name ) ) {
			return $this->container->get( $name );
		}
	}
}