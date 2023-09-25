<?php
require_once "conecta.php";

//Tipo do dado conexao é PDO
function lerClientes(PDO $conexao):array {
    $sql = " SELECT * FROM clientes ORDER BY nomeCliente";

    try {

        $consulta = $conexao-> prepare($sql);

        $consulta-> execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        //concatenação .
        die("ERRO".$erro->getMessage());
    }

    return $resultado; 
}