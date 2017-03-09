<h2 style="color: green;"><i class="user icon"></i>Cadastrar User</h2>

<?php echo (isset($mensagem)) ? $mensagem : ''; ?>

<form class="ui form" method="post">

    <div class="filed">
        <label>User</label>
        <input type="text" name="name" placeholder="Digite um nome">
        <input type="hidden" name="cadastrar">
    </div>

    <div class="filed">
        <label>E-mail</label>
        <input type="text" name="email" placeholder="Digite um email">
    <div class="filed">

    <div class="filed">
        <label>Senha</label>
        <input type="text" name="password" placeholder="Digite uma senha">
    <div class="filed">

    <div style="margin-top: 10px;">
        <button class="ui blue button" type="submit"><i class="check green icon"></i>Cadastrar</button>
    </div>
</form>

<div class="ui divider"></div>
<h2 style="color: green;"><i class="users icon"></i>Lista de users cadastrados</h2>

<table width="100%" class="ui table">
    <thead>
         <tr>
            <th>User</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>

    <tbody>
        <?php
            use App\Models\Users;
            use Jg\Database\Transaction;

            Transaction::open();

            $user = new Users;
            $users = $user->read();

            foreach ($users as $user): 
        ?>
       <tr> 
            <td><?php echo $user->nome; ?></td>
            <td><?php echo $user->email; ?></td>
             <td><a href="?p=editar&editar=true&id=<?php echo $user->id ?>" class="ui green button"><i class="edit icon"></i>Editar</a></td>
            <td><a href="?excluir=true&id=<?php echo $user->id ?>" class="ui red button"><i class="remove icon"></i>Excluir</a></td>
       </tr>

       <?php endforeach; 
       
         Transaction::close();   
       ?>


    </tbody>
</table>


