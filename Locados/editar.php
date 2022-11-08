<?php
include_once "../utilities/conexao.php";




$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


 //verificação se o patrimonio é repetido
/*$sth = $conn->prepare("SELECT * FROM naolocados WHERE npatrimonio = :npatrimonio");
$sth->bindParam(':npatrimonio', $dados['npatrimonio'], PDO::PARAM_INT);
$sth->execute();
$retorno = $sth->fetchAll();*/
//verificar se os inputs estão preenchidos
if(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];

}else{


    $query_ptr = "UPDATE naolocados set nome=:nome, obs=:obs, modified=NOW() WHERE id=:id";

    $edt_ptr = $conn->prepare($query_ptr);
    $edt_ptr->bindParam(':id', $dados['id']);
    $edt_ptr->bindParam(':nome', $dados['nome']);
    $edt_ptr->bindParam(':obs', $dados['obs']);

if($edt_ptr->execute()){
    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Patrimonio editado com sucesso!</div>"];
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Patrimonio não foi editado!</div>"];
}
    

//faz uma ultima verificação se foi acrescentado mais 1 dado no banco de dados com o row count, caso não tenha sido acrescentado ira mostrar este erro.
/*if(){
    
    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Patrimonio editado com sucesso!</div>"];
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Patrimonio não foi editado!</div>"];
}*/
}


echo json_encode($retorna);


?>
