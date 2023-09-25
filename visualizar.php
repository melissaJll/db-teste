<?php

require_once "src/funcoes-clientes.php";
require_once "src/funcoes-profissionais.php";
require_once "src/funcoes-consultas.php";
require_once "src/funcoes-utilitarias.php";

$listaConsultas = lerConsultas($conexao);
$somaPrecos = calcularSomaPrecos($listaConsultas);


// $quantidade = count($listaDeAlunos); nº de alunos
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Lista de Consultas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Barra de Pesquisa -->
  
<nav class="bg-light py-3">
    <form action="busca.php">
    <div class="box-search">
        <input name="buscar" type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button class="btn border my-2 my-sm-0 px-2" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #fafafa;"></i></button>
    </div>
</form>
</nav>
<div class="container">
    <h1 class="text-center">Lista de Consultas</h1>
    <hr>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->

    <table class="table">
        <thead>
            <tr>
                <th class="bg-danger">Id</th>
                <th class="bg-danger">Paciente</th>
                <th class="bg-danger">Profissional</th>
                <th class="bg-danger">Preço</th>
                <th class="bg-danger">Data da consulta</th>
                <th class="bg-danger">Situação</th>
                <th class="bg-danger">Plataforma</th>
                <th class="bg-danger"> </th>
            </tr>
        </thead>
        
 <tbody class="table-striped">
     <?php foreach ($listaConsultas as $consulta) { ?>
            <tr >
                <td><?=$consulta["idConsulta"]?></td>
                <td><?=$consulta["nomeCliente"]?></td>
                <td><?=$consulta["nomeProfissional"]?></td>
                <td><?=$consulta["preco"]?></td>
                <td><?=$consulta["dataConsulta"]?></td>
                <td><?=verificarStatusDaData($consulta["dataConsulta"])?></td>
                <td><?=$consulta["plataforma"]?></td>
                <!-- Excluir -->
                <td>
                    <a class="excluir" href= >Cancelar</a>
                    <i class="fa-solid fa-xmark" style="color: #7662a5;"></i>
                </td>
            </tr>
     <?php }?>
    </tbody>
    </table>
    <p><b>Total: </b><?=$somaPrecos?></p>


    <!-- <p><a href="index.php">Voltar ao início</a></p> -->
    <div class="text-center my-3">
        <!-- <button type="button" class="btn btn-light">
            <i class="fa-solid fa-house" style="color: #ffffff;"></i>
            <a href="index.php">Voltar ao início</a></button> -->
        <button type="button" class="btn btn-secondary">
            <i class="fa-regular fa-plus" style="color: #f8f7f7;"></i>
            <a href="inserir.php">Inserir nova consulta</a>
        </button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>