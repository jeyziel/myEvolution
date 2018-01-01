<?php 

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Validation\Forms\CategoryForm;
use App\Validation\Validator;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Symfony\Component\Config\Definition\Exception\Exception;

class DashBoardController
{
    public function index(Request $request, Response $response, Twig $view )
    {
        return $view->render($response, 'dashboard/index.twig');
    }

    public function createCategory(Request $request, Response $response, Twig $view)
    {

       return $view->render($response,'dashboard/category.twig');
    }

    public function storeCategory(Request $request, Response $response)
    {
        $validation = (new Validator())->make($request, CategoryForm::rules());

        if ($validation->isFails()){
            return $response->withRedirect('/dashboard/category');
        }

        try {
           $category =  new Category();
           $data = [
                'name' => $request->getParam('name'),
                'description' => $request->getParam('description'),
           ];
           $category->create($data);
        }catch(\Exception $e) {
            die('erro' . $e->getMessage());
        }

        return $response->withRedirect('/dashboard');

    }

    public function createPost(Request $request, Response $response, Twig $view)
    {
        $categories = Category::all();
        return $view->render($response, 'dashboard/post.twig',['categories' => $categories]);
    }

    public function storePost(Request $request, Response $response, Twig $view)
    {
        $files = $request->getUploadedFiles();
        $newfile = $files['image'];
        if ($newfile->getError() == UPLOAD_ERR_OK) {
            $uploadFileName = $newfile->getClientFilename();
            try {
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . "./../../../public/images/" . $newfile->getClientFileName());
                //$newfile->moveTo(__DIR__ . "./../../../public/images/" . $uploadFileName);
                $base_url = $request->getUri()->getBaseUrl();
            }catch (\Exception $e) {
                echo $e->getMessage();
            }


        }




    }




}