<?php
include_once "../utilities/conexao.php";


$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){

    $query_pptr = "SELECT * FROM naolocados WHERE id = :id LIMIT 1";
    $result_pptr = $conn->prepare($query_pptr);
    $result_pptr->bindParam(':id', $id);
    $result_pptr->execute();

    $row_pptr = $result_pptr->fetch(PDO::FETCH_ASSOC);


    $retorna = ['erro' => false, 'dados' => $row_pptr];

}


else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum Item encontrado</div>"];
  
}

echo json_encode($retorna);


?>
