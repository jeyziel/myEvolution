<form action="/user/store" method="POST" role="form">
	 <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="informe seu nome">
        <?php echo $this->error('nome'); ?>
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="informe seu email">
        <?php echo $this->error('email'); ?>
    </div>

    
    <div class="form-group">
        <label for="">Senha</label>
        <input type="text" class="form-control" name="senha" placeholder="informe sua senha">
        <?php echo $this->error('senha'); ?>
    </div>


    <button class="btn btn-primary" type="submit">Cadastrar</button>

</form>