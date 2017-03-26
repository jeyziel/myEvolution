<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MVC PHP</title>
    <link rel="stylesheet" type="text/css" href="http://localhost:8888/assets/css/semantic.min.css">
     <link rel="stylesheet" type="text/css" href="http://localhost:8888/assets/icon/icon.min.css">
</head>
<body>

    <div style="width: 800px;margin: 0 auto;">
    	<a href="/" class="ui blue button">Voltar para a página inicial</a>
        <?php echo $this->content(); ?>
    </div>

    <script type="text/javascript" src="http://localhost:8888/assets/js/semantic.min.js"></script>
</body>
</html>