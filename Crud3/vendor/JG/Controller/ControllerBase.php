<?php 

namespace JG\Controller;

abstract class ControllerBase 
{
	protected $view;
	protected $action;

	public function __construct()
	{
		 $this->view = new \stdClass;
	}

	public function loadTemplate($view,$template = true)
	{
		$this->action = $view;
		if (file_exists("../App/Views/{$view}.php") && $template = true)
		{
			require_once("../App/Views/Template_home.php");
		}
		else
		{
			$this->content();
		}
	}

	public function content()
    {

        require_once("../App/Views/{$this->action}.php");
    }

}