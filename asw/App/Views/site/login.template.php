<form action="/login/store" method="POST" role="form">

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


    <button class="btn btn-primary" type="submit">Login....</button>

</form>