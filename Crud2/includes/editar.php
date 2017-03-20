<a href="/" class="ui blue button">Voltar para a página inicial</a>

<form class="ui form" method="post">

<?php 
    use App\Models\Livro;

    $livros = new Livro();
    $livrosCadastrados = $livros->select()->where('id','=',$_GET['id'])->first();
?>

<div class="field">
    <label>Descricao</label>
    <input type="text" name="descricao" placeholder="Digite um nome" value="<?php echo $livrosCadastrados->descricao; ?>">
    <input type="hidden" name="id" value="">
</div>

<div class="field">
    <label>Preco</label>
    <input type="text" name="preco" placeholder="Digite um email" value="<?php echo $livrosCadastrados->preco; ?>">
</div>

<div style="margin-top: 10px;">
    <input class="ui blue button" type="submit" name="atualizar" value="atualizar">
</div>
</form>
