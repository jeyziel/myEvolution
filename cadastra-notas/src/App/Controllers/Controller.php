<?php 

namespace App\Controllers;

use Interop\Container\ContainerInterface;
use Slim\Flash\Messages;
use \Exception;

abstract class Controller
{
	protected function message(string $type, string $message)
	{
		(new Messages())->addMessage($type,$message);
	}
}