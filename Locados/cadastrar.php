<?php
include_once "../utilities/conexao.php";




$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);





//verificação se o numero de serie é repetido
$sth = $conn->prepare("SELECT nserie FROM naolocados WHERE nserie = :nserie");
$sth->bindParam(':nserie', $dados['nserie'], PDO::PARAM_INT);
$sth->execute();
$retorno = $sth->fetchAll();
//tentativa de subtrair os repetidos que é nulo
//$sthn = $conn->prepare("SELECT COUNT(npatrimonio) FROM naolocados WHERE npatrimonio IS NULL");
//$sthn->execute();
//$retornon = $sthN->fetchAll();


//verificar se os inputs estão preenchidos
if(empty($dados['nserie'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário N° de série do item!</div>"];
}elseif(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
}  elseif((count($retorno)>0)){
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: N° de série já existente na tabela!</div>"];
        }
        else{

            if($dados['obs']==NULL){
                $dados['obs'] = 'Não inserido pelo usuario';
        
        }
        

$query_ptr = "INSERT INTO naolocados (nserie, nome, obs, created, modified) VALUES (:nserie, :nome, :obs, NOW(), NULL)";
$cad_ptr = $conn->prepare($query_ptr);
$cad_ptr->bindParam(':nserie', $dados['nserie']);
$cad_ptr->bindParam(':nome', $dados['nome']);
$cad_ptr->bindParam(':obs', $dados['obs']);


//faz uma ultima verificação se foi acrescentado mais 1 dado no banco de dados com o row count, caso não tenha sido acrescentado ira mostrar este erro.
if($cad_ptr->execute()){
    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Item cadastrado com sucesso!</div>"];
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Item não foi cadastrado!</div>"];
}
}



echo json_encode($retorna);


?>
