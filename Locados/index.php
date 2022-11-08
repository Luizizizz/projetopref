
<?php
include_once "../utilities/conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link href="../utilities/css/bootstrap.css" rel="stylesheet">
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
          <a class="nav-link active" aria-current="page" href="../Locados">Locados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../NLocados">Não Locados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Suprimentos">Suprimentos</a>
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
          <h4>Locados do Departamento de TI</h4>  
        </div>

        <!--div contendo o botão cadastrar-->


          <div>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadptrModal">
        Cadastrar
</button>

</div>


</div>
</div>


 <hr>



 <!--esse span "msgAlerta" é para exibir o alerta na parte superior em caso de sucesso de novo cadastro-->

 <span id="msgAlerta"></span>



 <!--div contendo o span listar-patrimonios que é o que mostra os patrimonios da tabela para o usuario-->
<div class="row">
    <div class="col-lg-12">

    <span class="listar-patrimonios"></span>

    </div>
  </div>
</div>


<!-- Modal, aqui é todo o formulario de cadastro -->
<div class="modal fade" id="cadptrModal" tabindex="-1" aria-labelledby="cadptrLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadptrModalLabel">Cadastrar Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form id="cad-ptr-form">

      <!--esse span é para caso de erro, irá ser exibido o alerta ainda no próprio formulario
    diferentemente do msgAlerta de sucesso que ira fechar o formulario e exibir o alerta na pagina inicial-->
        <span id="msgAlertaErrorCad"></span>

        <div class="mb-3">
            <label for="nserie" class="col-form-label">N° de série:</label>
            <input type="number" class="form-control"  name="nserie" id="nserie" placeholder="Numero de série">
          </div> 
   
          <div class="mb-3">
            <label for="nome" class="col-form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do patrimônio:">
          </div>

<div class="mb-3">
          <label for="foto" class="col-form-label">Foto do Item:</label>
            <input type="file" name="foto" class="form-control" id="foto" disabled>
          </div>

          <div class="mb-3">
          <label for="obs" class="col-form-label">Observações:</label>
            <input type="text" name="obs" class="form-control" id="obs" placeholder="Observações sobre o patrimonio">
          </div>

          <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-sm btn-outline-success" id="cad-ptr-btn" value="Cadastrar"/>
      </div>
        </form>

      </div>

    </div>
  </div>
</div>

<!-- Modal, aqui é todo o formulario de visualização -->
<div class="modal fade" id="visPtrModal" tabindex="-1" aria-labelledby="vispPtrLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border border-black">
        <h5 class="modal-title" id="visPtrModalLabel">Detalhes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body border border-dark">

        <span id="msgAlertaErrorVis"></span>

        <dl class="row">

        <div class="d-flex flex-row border mb-3">
  <dt class="col-sm-5 inline">Nº série:</dt>
  <dd class="col-sm-7 inline"><span id="nserieptr"></span></dd>
</div>     


<div class="d-flex flex-row border mb-3">
  <dt class="col-sm-5 inline">Nome do Item:</dt>
  <dd class="col-sm-7"><span id="nomeptr"></span></dd>
</div>

<div class="d-flex flex-row border mb-3">
  <dt class="col-sm-5 inline">Cadastro:</dt>
  <dd class="col-sm-7"><span id="cdtptr"><time></time></span></dd>
  </div>


  <div class="d-flex flex-row border mb-3">
  <dt class="col-sm-5 inline">Ultima edição:</dt>
  <dd class="col-sm-7"><span id="mdfptr"><time></time></span></dd>
  </div>


  <div class="d-flex flex-row border mb-3">
  <dt class="col-sm-5 inline">Observações:</dt>
  <dd class="col-sm-7"><span id="obsptr"></span></dd>
 </div>

  </dl>

      </div>

    </div>
  </div>
</div>


<!-- Modal, aqui é todo o formulario de edição -->
<div class="modal fade" id="edtptrModal" tabindex="-1" aria-labelledby="edtptrLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edtptrModalLabel">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form id="edt-ptr-form">

        <span id="msgAlertaErrorEdt"></span>


        <input type="hidden" name="id" id="editid">


        <div class="mb-3">
            <label class="col-form-label">N° de série:</label>
            <input class="form-control" name="nserie" id="edtnserie" disabled>
          </div>     
          
          <div class="mb-3">
            <label for="nome" class="col-form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" readonly id="edtnome" placeholder="Digite o nome do patrimônio:">
          </div>

                
          <div class="mb-3">
          <label for="obs" class="col-form-label">Observações:</label>
            <input type="text" name="obs" class="form-control" id="edtobs" placeholder="Instrução de padrão para digitar">
          </div>

          <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-sm btn-outline-warning" id="edt-ptr-btn" value="Aplicar Edição"/>
      </div>
        </form>

      </div>

    </div>
  </div>
</div>



<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="../utilities/js/bootstrap.bundle.js"></script>
<script src="js/custom.js"></script>
</body>


</html>
