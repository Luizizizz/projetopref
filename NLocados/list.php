<?php
include_once "../utilities/conexao.php";


$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){

//Calcular o inicio Visualização
$qnt_result_pg = 10; //Quantidade de registros por pagina
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//em ORDER BY é definido a ordem de listagem dos patrimonios
$query_patrimonios = "SELECT id, nserie, npatrimonio, nome, created FROM patrimoniopref ORDER BY created DESC LIMIT $inicio, $qnt_result_pg";
$result_patrimonios = $conn->prepare($query_patrimonios);
$result_patrimonios->execute();

$dados = "<div class='table'>
<table class='table table-striped table-bordered'>
    <thead>
               <tr>
                   <th>N° do Patrimônio</th>
                   <th>N° de Série</th>
                   <th>Nome do Patrimônio</th>
                   <th>Data de cadastro </th>
                   <th>Fotos</th>
                   <th>Ações</th>
               </tr>
    </thead>

    <tbody>";



while($row_patrimonio = $result_patrimonios->fetch(PDO::FETCH_ASSOC)){
    extract($row_patrimonio);


    $dia = date('d/m/Y', strtotime($created));
    $horas = date('H:i:s', strtotime($created));

//
//<i class='fa-solid fa-check position-relative start-50' readonly></i>
    $dados .= "<tr>
      <td>$npatrimonio</td>
      <td>$nserie</td>

      <td>$nome</td>
<td>$dia às $horas</td>
<td><a href='#' class='alert-link' disabled>PDF-Dados</a></td>
      <td>
      <button id='$id' class = 'btn btn-outline-primary btn-sm'
       onclick='visPtr($id)'>Visualizar</button>
       <button id='$id' class = 'btn btn-outline-warning btn-sm'
       onclick='edtPtr($id)'>Editar</button>
       <button id='$id' class = 'btn btn-outline-danger btn-sm'
       onclick='excPtr($id)'>Excluir</button>
      </td>
    </tr>";
}
$dados .= "
</tbody>
</table>
</div>";


//Quantidade de patrimonios, usamos o COUNT para saber essa quantidade
$query_pg = "SELECT COUNT(id) AS num_result FROM patrimoniopref";
$result_pg = $conn->prepare($query_pg);
$result_pg->execute();
$row_pg=$result_pg->fetch(PDO::FETCH_ASSOC);

//Quatidade de Paginas
//ceil serve para arredondar a pagina ex: depois da pag 30 ir a 31 e não para 30.1, 
//quantidade paginas = quantidade de patrimonios/quantidade que aparece em cada pagina(10);
$quantidade_paginas = ceil($row_pg['num_result']/$qnt_result_pg);

$max_links = 3;
    
$dados .= '<nav aria-label="Page navigation example"><ul class="pagination pagination-sm justify-content-center">';

$dados .= "<li class='page-item'><a href='#' class='page-link' onclick='listarPatrimonios(1)'>Primeira</a></li>";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
    if($pag_ant >= 1){
        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarPatrimonios($pag_ant)' >$pag_ant</a></li>";
    }        
}    

$dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_paginas){
        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarPatrimonios($pag_dep)'>$pag_dep</a></li>";
    }        
}

$dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarPatrimonios($quantidade_paginas)'>Última</a></li>";
$dados .=   '</ul></nav>';


echo $dados;
}
else{
  echo"<div class='alert alert-danger' role='alert'>
  Erro nenhum patrimônio encontrado!
  </div>";      
}
?>

