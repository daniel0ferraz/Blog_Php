<?php
require 'conexao.php';

$id = 0;
if(isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);
}

if(isset($_POST['titulo']) && empty ($_POST['titulo']) == false){
	$titulo = addslashes($_POST['titulo']);
    $autor = addslashes($_POST['autor']);
	$corpo = addslashes($_POST['corpo']);
	
    $sql = "UPDATE posts SET titulo = '$titulo', data_criado = NOW(), autor = '$autor', corpo = '$corpo' WHERE id = '$id'";
    
	$pdo->query($sql);
	header("Location: index.php");
}

$sql = "SELECT * FROM posts WHERE id = '$id'";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
	$posts = $sql->fetch();
} else {
header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--CSS -->
    <link rel="stylesheet" href="css/estilo.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-3.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-3.4.1-dist/css/bootstrap.css">

    <!-- Fontes -->
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/v4-shims.css">

</head>

<body>
    <header class="">
        <h3>Adicionar postagem</h3>
    </header>
    <div class="container">

        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="posts.php">Meus Posts</a>
            </li>
            <li class="active">Adicionar Post</li>
        </ol>

    </div>

    <br>
    <div class="container">
        <form method="post">
     
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="titulo" value="<?php echo $posts['titulo'];?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor" value="<?php echo $posts['autor'];?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Corpo</label>
                <textarea name="corpo" rows="3" class="form-control"><?php echo $posts['corpo'];?></textarea>
            </div>

            <button class="btn btn-success" type="submit" value="Atualizar">Atualizar</button>

        </form>
    </div>

    <script src="bootstrap-3.4.1-dist/js/jquery-3.1.1.min.js"></script>
    <script src="bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
</body>

</html>