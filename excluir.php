<?php
require_once "src/funcoes-consultas.php";

$id = filter_input(INPUT_GET,"idCliente", FILTER_SANITIZE_NUMBER_INT);

excluirConsulta($conexao, $id);

header("location:visualizar.php");

?>