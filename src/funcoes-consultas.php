<?php
require_once "conecta.php";

function inserirConsultas(PDO $conexao, string $dataConsulta, string $plataforma, int $profissionalId, int $clienteId): void{

    $sql= "INSERT INTO consultas(dataConsulta, plataforma,idProfissional, idCliente) VALUES (:dataConsulta, :plataforma, :id, :idCliente)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta ->bindValue(":plataforma", $plataforma, PDO::PARAM_STR );
        $consulta ->bindValue(":dataConsulta", $dataConsulta, PDO::PARAM_STR );
        $consulta->bindValue(":id", $profissionalId, PDO::PARAM_INT);
        $consulta->bindValue(":idCliente", $clienteId, PDO::PARAM_INT);

        $consulta-> execute();

    } catch (Exception $erro) {
        die("Erro ao inserir". $erro-> getMessage());
    }
}


function lerConsultas(PDO $conexao): array{

    $sql =  " SELECT
    c.nomeCliente,
    co.dataConsulta , co.plataforma , co.idConsulta , 
    p.preco , p.nomeProfissional
FROM
    consultas co
INNER JOIN
    profissionais p ON co.idProfissional = p.id
INNER JOIN
    clientes c ON co.idCliente = c.idCliente;
";
// where p.id=4

    try {
        $consulta = $conexao->prepare($sql);
        $consulta -> execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro ao carregar os dados dos consultas!". $erro->getMessage());
    }
    return $resultado;
}
;

function lerConsulta(PDO $conexao, int $id): array{

    $sql = "SELECT idConsulta, plataforma, idCliente, idProfissonal FROM consultas WHERE idConsulta=:id";

    try {
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(":id", $id, PDO::PARAM_INT);

        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);


    } catch (Exception $erro) {
        die("Erro ao trazer os dados do aluno". $erro->getMessage());
    }
    return $resultado;

}


function excluirConsulta(PDO $conexao, int $id):void{
    $sql = "DELETE FROM consultas WHERE idConsulta=:id";

try {
    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":id", $id, PDO::PARAM_INT);

    $consulta->execute();

} catch (Exception $erro) {
    die("Erro na exclusão". $erro->getMessage());
}


}

?>