<?php 
	require_once"Config/Config.php"; 

	use App\Models\Livro;
	use JG\Database\Transaction;

	

	$cadastrar = filter_input(INPUT_POST, 'cadastrar');
	$update = filter_input(INPUT_POST, 'atualizar');


	if ($cadastrar)
	{
		$insert = new Livro();
		$insert->descricao = filter_input(INPUT_POST,'descricao');
		$insert->preco = filter_input(INPUT_POST, 'preco');
		$cadastrado = $insert->save();



		Transaction::close();

		if ($cadastrado > 0)
		{
			$mensagem = '<div class="ui success message">
                  <div class="header">
                    Usuário cadastrado com sucesso !!!
                  </div>
                  <p>Você acabou de registrar o usuário '.$_POST['descricao'].'</p>
                </div>';
		}
	}

	if ($update)
	{
		$id = filter_input(INPUT_GET,'id');
		$update = new Livro();
		$update->descricao = filter_input(INPUT_POST, 'descricao');
		$update->preco = filter_input(INPUT_POST, 'preco');
		$userCadastrado = $update->where('id','=',':id')->update($id);

		Transaction::close();

		if ($userCadastrado == 1)
		{
			$mensagemUpdate = '<div class="ui success message">
                  <div class="header">
                    Usuário Atualizado com sucesso !!!
                  </div>
                  <p>Você acabou de atualizar o usuário '.$_POST['descricao'].'</p>
                </div>';
		}
	}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chains methods</title>
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