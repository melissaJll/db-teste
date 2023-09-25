<?php

//$servidor = "localhost:3307"; 
$servidor = "localhost";
$banco = "crud_psi";
$usuario = "root";
$senha = "";

try {
    $conexao = new PDO(
        "mysql:host=$servidor;
        dbname=$banco;
        charset=utf8",
         $usuario, $senha
    );

    $conexao->setAttribute(
        PDO::ATTR_ERRMODE, 
        PDO::ERRMODE_EXCEPTION
    ); 

} catch (Exception $erro) { 
    die("Erro!!! :".$erro->getMessage());
}
 

?>