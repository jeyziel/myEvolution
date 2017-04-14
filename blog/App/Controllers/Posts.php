<?php

namespace App\Controllers;

use JGFW\Controller\{BaseController,Container,Redirect};
use JGFW\Database\Transaction;

class Posts extends BaseController
{
    private $posts;
    private $category;

    public function __construct()
    {
        parent::__construct();
        $this->posts = Container::getModel('Posts');
    }


    public function index()
    {
        
        $this->setTitle('Postagens');
        $this->view->posts = $this->posts->all();
        //$texto = $this->view->posts[0]->content;
       // $texto = substr($texto, 0, strrpos(substr($texto, 0, 50), ' ')) . '...';
      //  echo $text = strrpos(substr($texto, 0, 50), ' ');
        Transaction::close();
        $this->renderView('posts/index','layout');
        
    }

    public function show($id)
    {
        $this->view->post = $this->posts->where('id','=',$id)->first();

        

        Transaction::close();

        
        
        if(isset($this->view->post->title))
        {
            $this->setTitle($this->view->post->title);
            $this->renderView('posts/show','layout');
        }
        else
        {
            echo 'affs';
        }
    }

    public function create()
    {
        $this->setTitle('Criar novo post');
        $this->renderView('posts/create','layout');
    }

    /** pega o request post e salva no banco de dados **/
    public function store($request)
    {
        try
        {
            
            $data = [
                'title' => $request->post->title,
                'content' => $request->post->content
            ];
           
            $this->posts->fromArray($data);

            if($this->posts->store())
            {
                Redirect::route('/posts');
            }
            else
            {
                echo 'erro ao inserir dados no banco';
            }

            Transaction::close();
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            Transaction::rollback();
        }
    }

    /** pega os dados pelo id*/
    public function edit($id)
    {
        try
        {
            $this->view->post = $this->posts->where('id','=',$id)->first();
            

            if ($this->view->post)
            {
                $this->setTitle('Edit Post - ' . $this->view->post->title);
                $this->renderView('posts/edit','layout');

                Transaction::close();
            }
            else
            {
               Redirect::route('/posts');
            }


        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            Transaction::rollback();
        }
    }

    public function update($id,$request)
    {
        $data = [
            'title' => $request->post->title,
            'content' => $request->post->content
        ];

        
        if($this->posts->fromArray($data)->where('id','=',$id)->update())
        {
            Redirect::route('/posts');
        }
        else
        {
            Redirect::route('/posts/{$id}/edit');
        }

        Transaction::close();
    }

    /*
    *@param (int)$id recebe um parametro inteiro na url
    */
    public function delete(int $id)
    {
        try
        {
            if($this->posts->where('id','=',$id)->delete())
            {
                Redirect::route('/posts');
            }
            else
            {
                echo 'nao foi possivel excluir';
            }
            Transaction::close();
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            Transaction::rollback();
        }
    }


}