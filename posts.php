<?php
require 'conexao.php';


if (isset($_POST['titulo']) && empty($_POST['titulo']) == false) {
    $titulo = addslashes($_POST['titulo']);
    $data_criado = addslashes($_POST['data_criado']);
    $autor = addslashes($_POST['autor']);
    $corpo = addslashes($_POST['corpo']);

    $sql = "INSERT INTO posts SET titulo = '$titulo', data_criado = '$data_criado', autor = '$autor', corpo = '$corpo' ";

    $pdo->query($sql);
    header("Location:index.php");

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
        <link rel="stylesheet" href="ASbootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap-3.4.1-dist/css/bootstrap.css">

        <!-- Fontes -->
        <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">
        <link
            rel="stylesheet"
            href="fontawesome-free-5.11.2-web/css/fontawesome.min.css">
        <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/v4-shims.css">

    </head>

    <body>

        <header class="">
            <div class="container">
                <h3>Meus Posts</h3>
            </div>

        </header>

        <div class="container-fluid">

            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Meus Post</li>
            </ol>

            <div class="page-header">
                <h2>Lista de postagens</h2> 
           
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Data</th>
                        <th>Autor</th>
                        <th>Corpo</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
            $sql =("SELECT * FROM posts ORDER BY titulo DESC");
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $posts):
                 ?>
                    <tr>
                        <td><?php echo $posts['titulo'] ;?></td>
                        <td><?php echo $posts['data_criado'] ;?></td>
                        <td><?php echo $posts['autor'] ;?></td>
                        <td><?php echo $posts['corpo'] ;?></td>
                        <td>
                        <?php echo '<a class="btn btn-default "href="editar.php?id='.$posts['id'] ;?>'"><i class="far fa-edit"></i></a>
                        <?php echo '<a class="btn btn-default"href="deletar.php?id='.$posts['id']; ?>'"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            
            <?php
 
                endforeach;
                }
            
            ?>
        </tbody>
    </table>

</div>



<script src="bootstrap-3.4.1-dist/js/jquery-3.1.1.min.js"></script>
<script src="bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
</body>
</html>