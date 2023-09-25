<?php
require_once "src/funcoes-profissionais.php";
require_once "src/funcoes-clientes.php";

$listaProfissionais = lerProfissionais($conexao);

$listaClientes = lerClientes($conexao);


if(isset($_POST['agendar'])){
	//dataConsulta, :plataforma, :idProfissional, :idCliente)

	require_once "src/funcoes-consultas.php";

	
	$dataConsulta = filter_input(INPUT_POST, "data", FILTER_SANITIZE_SPECIAL_CHARS);
	$dataConsulta = date('y-m-d', strtotime($dataConsulta));
	$plataforma = filter_input(INPUT_POST, "plataforma", FILTER_SANITIZE_SPECIAL_CHARS);
	$profissionalId = filter_input(INPUT_POST, "profissional", FILTER_SANITIZE_NUMBER_INT);
	$clienteId = filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_NUMBER_INT);



	inserirConsultas($conexao, $dataConsulta, $plataforma,$profissionalId, $clienteId);

	header("location:visualizar.php");
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
	    <p><label for="plataforma">Plataforma:</label>
		<input type="text" id="plataforma" name="plataforma"></p>
		<!-- <select required name="plataforma" id="plataforma">
				<option value=""> </option>
				<option value="">Zoom</option>
				<option value=""> Google meets</option>
		</select> -->
        
      <p><label for="data">Data:</label>
	    <input type="date" id="data" name="data"></p>

		<p>
			<label for="profissional">Profissional: </label>
			<select required name="profissional" id="profissional">
				<option value=""> </option>

			<?php foreach($listaProfissionais as $profissionais){ ?>
				<option value="<?=$profissionais["id"]?>">
					<?=$profissionais["nomeProfissional"]?>
				</option>
			<?php } ?>
			</select>
		</p>

		<p>
			<label for="cliente">Cliente: </label>
			<select required name="cliente" id="cliente">
				<option value=""> </option>

			<?php foreach($listaClientes as $cliente){ ?>
				<option value="<?=$cliente["idCliente"]?>">
					<?=$cliente["nomeCliente"]?>
				</option>
			<?php } ?>
			</select>
		</p>
	    
      <button class="btn btn-light" name="agendar">
	  	<i class="fa-solid fa-plus" style="color: #f8f7f7;"></i>
	  	<b>Agendar</b>
		</button>
	</form>

    <hr>
    <p>
		<i class="fa-solid fa-house" style="color: #7662a5;"></i>
		<a href="index.php">Voltar ao início</a>
	</p>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>