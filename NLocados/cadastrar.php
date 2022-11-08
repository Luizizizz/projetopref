<?php
include_once "../utilities/conexao.php";




$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);



 //verificação se o patrimonio é repetido
$pth = $conn->prepare("SELECT npatrimonio FROM patrimoniopref WHERE npatrimonio = :npatrimonio");
$pth->bindParam(':npatrimonio', $dados['npatrimonio'], PDO::PARAM_INT);
$pth->execute();
$retorno1 = $pth->fetchAll();
//tentativa de subtrair os repetidos que é nulo, no banco de dados remover o unic do tipo
//$pthn = $conn->prepare("SELECT COUNT(npatrimonio) FROM patrimoniopref WHERE npatrimonio IS NULL");
//$pthn->execute();
//$retorno1n = $pthN->fetchAll();

//verificação se o numero de serie é repetido
$sth = $conn->prepare("SELECT nserie FROM patrimoniopref WHERE nserie = :nserie");
$sth->bindParam(':nserie', $dados['nserie'], PDO::PARAM_INT);
$sth->execute();
$retorno = $sth->fetchAll();
//tentativa de subtrair os repetidos que é nulo
//$sthn = $conn->prepare("SELECT COUNT(npatrimonio) FROM patrimoniopref WHERE npatrimonio IS NULL");
//$sthn->execute();
//$retornon = $sthN->fetchAll();


//verificar se os inputs estão preenchidos
if(empty($dados['npatrimonio']) && empty($dados['nserie'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário alguma indentificação do item!</div>"];
}elseif(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
}        elseif(count($retorno1)>0 && !empty($dados['npatrimonio'])){
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: N° de patrimonio já existente na tabela!</div>"];
        }
        elseif((count($retorno)>0) && !empty($dados['nserie'])){
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: N° de série já existente na tabela!</div>"];
        }


//validação para o patrimonio se repetido não valida, caso contrario é enviado os dados

        else{

            if($dados['obs']==NULL){
                $dados['obs'] = 'Não inserido pelo usuario';
        
        }
        
if($dados['nserie'] == NULL){
$dados['nserie'] = 'Não consta';
$query_ptr = "INSERT INTO patrimoniopref (nserie, npatrimonio, nome, obs, created, modified) VALUES (:nserie, :npatrimonio, :nome, :obs, NOW(), NULL)";
$cad_ptr = $conn->prepare($query_ptr);
$cad_ptr->bindParam(':nserie', $dados['nserie']);
$cad_ptr->bindParam(':npatrimonio', $dados['npatrimonio']);
$cad_ptr->bindParam(':nome', $dados['nome']);
$cad_ptr->bindParam(':obs', $dados['obs']);
$cad_ptr->execute();
}
elseif($dados['npatrimonio'] == NULL){
    $dados['npatrimonio'] = 'Não consta';
    $query_ptr = "INSERT INTO patrimoniopref (nserie, npatrimonio, nome, obs, created, modified) VALUES (:nserie, :npatrimonio, :nome, :obs, NOW(), NULL)";
    $cad_ptr = $conn->prepare($query_ptr);
    $cad_ptr->bindParam(':nserie', $dados['nserie']);
    $cad_ptr->bindParam(':npatrimonio', $dados['npatrimonio']);
    $cad_ptr->bindParam(':nome', $dados['nome']);
    $cad_ptr->bindParam(':obs', $dados['obs']);
    $cad_ptr->execute();
}
else{
            //$query_ptr = "INSERT INTO patrimoniopref (npatrimonio, nome, obs, foto, created) VALUES (:npatrimonio, :nome, :obs, :foto, NOW())";
$query_ptr = "INSERT INTO patrimoniopref (nserie, npatrimonio, nome, obs, created, modified) VALUES (:nserie, :npatrimonio, :nome, :obs, NOW(), NULL)";
$cad_ptr = $conn->prepare($query_ptr);
$cad_ptr->bindParam(':nserie', $dados['nserie']);
$cad_ptr->bindParam(':npatrimonio', $dados['npatrimonio']);
$cad_ptr->bindParam(':nome', $dados['nome']);
$cad_ptr->bindParam(':obs', $dados['obs']);
$cad_ptr->execute();
}

//faz uma ultima verificação se foi acrescentado mais 1 dado no banco de dados com o row count, caso não tenha sido acrescentado ira mostrar este erro.
if($cad_ptr->rowCount()){
    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Patrimonio cadastrado com sucesso!</div>"];
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Patrimonio não foi cadastrado!</div>"];
}
}



echo json_encode($retorna);


?>
