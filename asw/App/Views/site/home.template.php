<h2>Olá @name você tem <?php echo count($users); ?> cadastrados</h2>

<p><?php echo user('user')->nome; ?></p>
<?php if(isAuth('user')): ?>
    <a href="/login/destroy">Logout</a>
<?php endif; ?>

<form action="/" method="get" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">Busca</label>
        <input type="text" class="form-control" name="s" placeholder="Buscar Post">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Post</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->nome; ?></td>

            <td>
                <a class="btn btn-default btn-xs" href="/post/<?php echo $user->id; ?>" role="button">ver post</a>
            </td>
<!--            <td>-->
<!--                <a class="btn btn-default btn-xs" href="/post/edit/--><?php //echo $post->idPost; ?><!--" role="button">editar</a>-->
<!--            </td>-->
<!--            <td>-->
<!--                <a class="btn btn-default btn-xs" href="/post/destroy/--><?php //echo $post->idPost; ?><!--" role="button">deletar</a>-->
<!--            </td>-->
        </tr>
    <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr>
            <td>@links</td>
        </tr>
    </tfoot>
</table>