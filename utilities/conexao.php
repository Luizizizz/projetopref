<?php

//Aqui em conexão.php será onde o será feito a conexão do DB(Banco de Dados) com o php e todo o programa
//Será usado o PDO para essa conexão, um meio mais pratico e moderno para essa conexão com o DB
//além de possuir suporte com mais mecanismos de banco de dados.

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "syspref";
$port = 3306;

try{
    //conexão com a porta
$conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);
 
//conexão sem a porta
////$conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);
}

catch(PDOException $err){
    echo "Erro no banco de dados" . $err->getMessage();
}

