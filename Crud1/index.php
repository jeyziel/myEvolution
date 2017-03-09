<?php require 'config/config.php'; 

use App\Models\Users;
use Jg\Database\Transaction;

Transaction::open();


if (isset($_POST['cadastrar']))
{
   $user = new Users;
   $cadastrado = $user->create([
       'nome' => filter_input(INPUT_POST,'name'),
       'email' => filter_input(INPUT_POST,'email'),
       'senha' => filter_input(INPUT_POST,'password')

   ]);

    if($cadastrado)
    {
            $mensagem = '<div class="ui success message">
                  <div class="header">
                    Usuário cadastrado com sucesso !!!
                  </div>
                  <p>Você acabou de registrar o usuário '.$_POST['name'].'</p>
                </div>';
    }
}

if (isset($_POST['atualizar']))
{
    $user = new Users;
    $atualizado = $user->update($_POST['id'],[
       'nome' => filter_input(INPUT_POST,'name'),
       'email' => filter_input(INPUT_POST,'email') 
    ]);

     if($atualizado == 1)
     {
              $mensagemUpdate = '<div class="ui success message">
                  <div class="header">
                    Usuário Atualizado com sucesso !!!
                  </div>
                  <p>Você acabou de atualizar o usuário '.$_POST['name'].'</p>
                </div>';
    }
}

// deletar
if(isset($_GET['excluir']) && $_GET['excluir'] == true):
    $user = new Users;
    $user->delete('id',$_GET['id']);
    header('Location:/');
endif;

Transaction::close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Curso phpoo pdo</title>
    <link rel="stylesheet" type="text/css" href="public/assets/css/semantic.min.css">
     <link rel="stylesheet" type="text/css" href="public/assets/icon/icon.min.css">
</head>
<body>

    <div style="width: 800px;margin: 0 auto;">
        <?php require (isset($_GET['p'])) ? 'includes/'.$_GET['p'].'.php' : 'includes/home.php'; ?>
    </div>

    <script type="text/javascript" src="public/assets/js/semantic.min.js"></script>
</body>
</html>