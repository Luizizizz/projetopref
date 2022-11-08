
<?php
include_once "../utilities/conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../utilities/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="../utilities/estilo.css" />

    <title>Locados</title>
</head>
<link rel="icon" type="imagem/png" href="../utilities/favicon.png" />

<!--Barra de navegação-->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top border border-dark">
  <div class="container">
    <a class="navbar-brand">
      <img src="../utilities/logoprefeituradebertioga.png" alt="..." height="42" width="204">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../Locados">Locados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../NLocados">Não Locados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../Suprimentos">Suprimentos</a>
        </li>

        <!--<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>-->
      </ul>
    </div>
  </div>
</nav>


<body>


<body>
<div class="container">
  <!--div contendo toda parte superior da pagina, a classe usando o booststrap define o estilo-->
    <div class = "row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items">

        <!--div contendo o escrito listar patrimonio na parte superior esquerda-->  
        <div>
          <h4>Suprimentos do Departamento de TI</h4>  
        </div>

        <!--div contendo o botão cadastrar-->


          <div>
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadptrModal">
        Cadastrar
</button>        

</div>


</div>
</div>


<button id="bandeira"></button>



<script src="../utilities/js/bootstrap.bundle.js"></script>
<script src="js/custom.js"></script>
</body>


</html>
