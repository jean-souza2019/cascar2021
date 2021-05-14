<?php

require_once 'init.php';

require('src/Components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('src/components/bd/crd.php');
require('src/Components/bd/Conexao.php');

$conexao = new Conexao();
$crd = new Crd($conexao);

$anotacoes = $crd->getAnotacoes();

// Incluí o cabeçalho
include "src/Components/1-header.php";

?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">
      <div class="card-header azulcascar">
        <h5 class="text-left">Anotações <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> </h5>
      </div>
      <div class="card-body center">
        <div class="container-fluid">

          <?php require_once('./src/pages/anotacoes/listar_anotacoes.php'); ?>

        </div>
      </div>
    </div>
  </div>

  <?php
  // Incluí o rodapé
  include "src/Components/2-footer.php";
  ?>