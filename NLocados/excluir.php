<?php
include_once "../utilities/conexao.php";


$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){

    $query_pptr = "DELETE FROM patrimoniopref WHERE id=:id";
    $result_pptr = $conn->prepare($query_pptr);
    $result_pptr->bindParam(':id', $id);

    if($result_pptr->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success'
        role='alert'>Patrimônio excluido com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' 
        role='alert'>Erro: O Patrimônio não foi excluido corretamente!</div>"];
    }

}
else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum Patrimônio encontrado</div>"];
  
}

echo json_encode($retorna);


?>
