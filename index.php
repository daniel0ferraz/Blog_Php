<?php
require 'conexao.php';

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
//

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
  <br>
  <div class="container-fluid">

    <div class="jumbotron">
      <h1>Bem vindo ao Blog</h1>
      <p>Veja o que está acontecendo agora...</p>
    </div>

    <div class="clearfix"></div>
  </div>
  </div>
  <nav class="navbar navbar-default navbar-fixed" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>



      </div>

      <div class="collapse navbar-collapse" id="barra-navegacao">
        <ul class="nav navbar-nav">
          <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="adicionar.php"><i class="fas fa-laptop-code"></i> Adicionar</a></li>
          <li><a href="posts.php"><i class="fa fa-newspaper-o"></i> Minhas publicações</a></li>
          <li><a href="sobre.php"><i class="fa fa-address-card-o"></i></i> Sobre</a></li>
        </ul>

        <ul class=" nav navbar-nav navbar-right">
          <li><a href=""><i class="fa fa-sign-out"> </i>Sair</a></li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- fim nav -->


  <section>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-5">

          <?php
$sql = ("SELECT * FROM posts ORDER BY data_criado DESC");
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $posts): ?>

          <div class="box">
            <img src="img/img2.jpg" width="750px" height="300px" class="img-responsive" alt="imagem">
            <br>
            <div class="row">
              <a href="#" class="btn" role="button"><i class="fa fa-user-circle-o"></i>
                <?php echo $posts['autor']; ?></a>
              <a href="#" class="btn" role="button"><i class="fa fa-calendar" aria-hidden="true"></i>
                <?php echo strftime('%d de %B de %Y', strtotime($posts['data_criado'])); ?></a>
            </div>

            <div class="titulo">
              <h2><?php echo $posts['titulo']; ?></h2>
            </div>
            <div class="box-texto">
              <p><?php echo $posts['corpo']; ?></p>
              <a href="#" class="btn btn-default"><i class="far fa-eye"></i> Ver</a>
            </div>
          </div>
          <?php
endforeach;
}
?>
        </div>





      </div>
    </div>
  </section>
  <!--fim section  -->



  <script src="bootstrap-3.4.1-dist/js/jquery-3.1.1.min.js"></script>
  <script src="bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>

</body>

</html>