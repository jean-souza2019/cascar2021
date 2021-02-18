<?php

require_once 'init.php';

require('src/Components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('src/Components/bd/Conexao.php');

$conexao = new Conexao();

// $fila = new Fila($conexao, $dashboard);

// // Consulta todos os registros
// $objetos = $fila->getTodosRegistros();

// Incluí o cabeçalho
include "src/Components/1-header.php";
?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="text-left">ORDENS EM ABERTO <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> </h5>
      </div>
      <div class="card-body">

        <div class="col-md-2">
          <div class="card">
            <div class="card-header">
              ITEM 1
            </div>
            <div class="card-body">
              corpo
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php
  // Incluí o rodapé
  include "src/Components/2-footer.php";
  ?>

  <script>
    function salvarDados() {
      // $('.form-senha').submit();
    }

    function atualizarPagina() {
      window.location.href = "<?= SIS_URL ?>";
    }
  </script>