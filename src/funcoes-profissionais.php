<?php
require_once "conecta.php";

function lerProfissionais(PDO $conexao):array {
    $sql = " SELECT * FROM profissionais ORDER BY nomeProfissional";

    try {

        $consulta = $conexao-> prepare($sql);
        $consulta-> execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("ERRO".$erro->getMessage());
    }

    return $resultado; 
}

// function lerUmProfissional(PDO $conexao, Int $IdProfissional): array{
//     $sql = "SELECT * FROM profissionais WHERE id = :id"; 

//     try {
//         $consulta = $conexao->prepare($sql);

//         $consulta->bindValue(":id", $IdProfissional, PDO::PARAM_INT);

//         $consulta-> execute();

//         $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

//     } catch (Exception $erro) {
//         die("Erro ao carregar!". $erro->getMessage());
//     }

//     return $resultado;
// }
