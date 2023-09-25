<?php

function verificarStatusDaData($dataInformada) {
    $dataTimestamp = strtotime($dataInformada);
    
    // capturando o timestamp atual
    $dataAtual = time();
    
    // Compara os timestamps
    if ($dataTimestamp < $dataAtual) {
      return "Concluída";
    } else {
      return "Em andamento";
    }
  }

  function calcularSomaPrecos($listaConsultas) {
    $somaPrecos = 0;
    
    foreach ($listaConsultas as $consulta) {
        $somaPrecos += $consulta["preco"];
    }

    return $somaPrecos;
}

?>