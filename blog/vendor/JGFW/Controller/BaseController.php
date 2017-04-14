<?php 

namespace JGFW\Controller;

/**
*@author jeyziel
*classe base do controler responsavel principalmente por renderizaar a view
*/

class BaseController
{
    protected $view;
    private $viewPath;
    private $layoutPath;
    private $pageTitle;

    public function __construct()
    {
        $this->view = new \StdClass;
    }

    protected function setTitle(string $title)
    {
        $this->pageTitle = $title;
    }

    protected function getTitle($separator = null)
    {
        if(!(is_null($separator)))
            echo $this->pageTitle . " " . $separator . " ";
        else
            echo $this->pageTitle;

    }
    

    protected function renderView($viewPath,$layoutPath = null)
    {
        $this->viewPath = $viewPath;
        $this->layoutPath = $layoutPath;

        if ($layoutPath)
        {
            $this->layout();
        }
        else
        {
            $this->content();
        }
    }

    protected function content()
    {
        if (file_exists(__DIR__ . "/../../../App/Views/{$this->viewPath}.phtml"))
        {
            require_once __DIR__ . "/../../../App/Views/{$this->viewPath}.phtml";
        }
        else
        {
             echo "Error: View path not found!";
        }
    }

    protected function layout()
    {
        if (file_exists(__DIR__ . "/../../../App/Views/{$this->layoutPath}.phtml")) 
        {
            require_once __DIR__ . "/../../../App/Views/{$this->layoutPath}.phtml";
        } 
        else
        {
            echo "Error: Layout path not found!";
        }
    }

}