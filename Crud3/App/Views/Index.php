<h2 style="color: green;"><i class="user icon"></i>Cadastrar User</h2>

<form class="ui form" method="post">
    <h2 style="color: green;">
         <?php isset($this->view->message) ? print $this->view->message : ''; ?>
    </h2>
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

<div class="ui divider"></div>
<!--<h2 style="color: green;"><i class="users icon"></i>10 Livros Cadastrados</h2> -->

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
        <?php if (isset($this->view->livros)): ?> 
            <?php foreach ($this->view->livros as $livro): ?>
            <tr> 
                <td><?php echo $livro['id']; ?></td>
                <td><?php echo $livro['descricao']; ?></td>
                <td><?php echo $livro['preco']; ?></td>
                   
                <td><a href="/Editar" class="ui green button"><i class="edit icon"></i>Editar</a></td>
                <td><a href="/deletar" class="ui red button"><i class="remove icon"></i>Excluir</a></td>
            </tr>
           <?php endforeach; ?>

        <?php endif; ?>  
    </tbody>
</table>

