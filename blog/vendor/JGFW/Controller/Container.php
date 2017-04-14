<?php


namespace JGFW\Controller;

/*
*@author jeyziel
*classe responsavel por iniciar o controler
*/

class Container
{
    public static function newController($controller)
    {
        $objController = "App\\Controllers\\".$controller;
        return new $objController();
    }

    public static function getModel($model)
    {
        $objModel = "App\\Models\\".$model;
        return new $objModel(); 
    }

    public static function pageNotFound()
    {
        if (file_exists(__DIR__ . "/../../../App/Views/404.phtml"))
        {
            return require_once(__DIR__ . "/../../../App/Views/404.phtml");
        }
        else
        {
            print "pagina nao encontrada";
        }
    }
}