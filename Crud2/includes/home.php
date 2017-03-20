<h2 style="color: green;"><i class="user icon"></i>Cadastrar User</h2>

<?php 

use JG\Database\Transaction;
if ($mensagem){ 
    echo $mensagem;
} 
?>


<form class="ui form" method="post">

    <div class="filed">
        <label>Descricao</label>
        <input type="text" name="descricao" placeholder="Digite um nome">
    </div>

    <div class="filed">
        <label>Preco</label>
        <input type="text" name="preco" placeholder="Digite o preco">
    <div class="filed">

    <div style="margin-top: 10px;">
        
        <input type="submit" name="cadastrar" class="ui blue button">
    </div>
</form>

<?php 
    use App\Models\Livro;

    $livros = new Livro();
    $livrosCadastrados = $livros->select()->all();

    Transaction::close();
    
?>

<div class="ui divider"></div>
<h2 style="color: green;"><i class="users icon"></i>Existem <?php echo $livros->count() ?> Livros Cadastrados</h2>

<table width="100%" class="ui table">
    <thead>
         <tr>
            <th>ID</th>
            <th>Descricao</th>
            <th>Preco</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>

    <tbody>
        <?php if($livros->count() <=0): ?>
                <tr><td>Nenhum livro cadastrado</td></tr>
        <?php endif;?>
        
        <?php foreach($livrosCadastrados as $livros): ?>
            <tr> 
                <td><?php echo $livros->id; ?></td>
                <td><?php echo $livros->descricao;?></td>
                <td><?php echo number_format($livros->preco,'2',',','.');?></td>
                   
                <td><a href="?p=editar&editar=true&id=<?php echo $livros->id; ?>" class="ui green button"><i class="edit icon"></i>Editar</a></td>
                <td><a href="?excluir=true&id=<?php echo $livros->id; ?>" class="ui red button"><i class="remove icon"></i>Excluir</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


