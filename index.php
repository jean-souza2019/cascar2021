<?php

require_once 'init.php';

require('src/Components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('src/Components/bd/Conexao.php');

$conexao = new Conexao();

// Incluí o cabeçalho
include "src/Components/1-header.php";
?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">
      <div class="card-header azulcascar">
        <h5 class="text-left">ANOTAÇÕES SEMANAIS <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> </h5>
      </div>
      <div class="card-body">

        <div class="col-md-2">
          <div class="card">
            <div class="card-header azulcascar">
              <?php $teste = $_GET['id'];
              if (!$teste) { ?>
                <h5>
                  ITEM 1
                  <span class="atualizar" onclick="edit()">Edit</span>
                </h5>

              <?php } else { ?>

                <input type="text" class="form-control" name="" placeholder="Atualizar Titulo" id="">
              <?php } ?>


            </div>
            <div class="card-body">
              <?php
              if (!$teste) { ?>
                corpo
              <?php } else { ?>
                <input type="text" name="" class="form-control" placeholder="Atualizar Texto" id="">
                <button><a href="<?= SIS_URL ?>">ok</a></button>
              <?php } ?>

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

    function edit() {
      window.location.href = "?id=1";
    }
  </script>