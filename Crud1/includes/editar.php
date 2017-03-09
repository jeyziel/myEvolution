<a href="/" class="ui blue button">Voltar para a página inicial</a>
<?php 
    use Jg\Database\Transaction;
?>

<?php echo (isset($mensagemUpdate)) ? $mensagemUpdate : ''; ?>

<?php if(isset($_GET['editar']) && $_GET['editar'] == true): ?>
    <?php
        
        Transaction::open();
        $user = new App\Models\Users;
        $userEncontrado = $user->findBy('id',$_GET['id']);
        Transaction::close();
     ?>
<form class="ui form" method="post">

<div class="field">
    <label>User</label>
    <input type="text" name="name" placeholder="Digite um nome" value="<?php echo $userEncontrado->nome; ?>">
    <input type="hidden" name="atualizar">
    <input type="hidden" name="id" value="<?php echo $userEncontrado->id; ?>">
</div>

<div class="field">
    <label>E-mail</label>
    <input type="text" name="email" placeholder="Digite um email" value="<?php echo $userEncontrado->email; ?>">
</div>

<div style="margin-top: 10px;">
    <button class="ui blue button" type="submit"><i class="check green icon"></i>Atualizar</button>
</div>
</form>
<?php else: ?>
    Escolha um usuário antes de editar
<?php endif; ?>