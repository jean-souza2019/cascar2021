<?php

require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();

$crd = new Crd($conexao);


// Consulta todos os registros


$objetos = $crd->getClientes();


// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">

      <!-- Titulo -->
      <div class="card-header azulcascar">
        <h5 class="text-left">Ordens de Serviço - Gerais<span class="atualizar" onclick="atualizarPagina()">Atualizar </span> <span class="incluir" onclick="cadastrarOrdem()">Incluir </span> </h5>
      </div>
      <!-- Corpo  Inicio -->


      <div class="card-body center ">

        <span class="card text-white bg-primary card-OS onPass" style="max-width: 18rem;">
          <div class="card-header TitVerde"></div>
          <div class="card-body ">
            <h5 class="card-title">Jean Marcos de Souza</h5>
            <p>
              <b>
                Veiculo(s):
              </b>
              <br>
              <i>Golf Sapão</i>
            </p>
            <br>
            <div class="card-text">Revisões efetuadas: 6</div>
            <div class="card-text">Última revisão: 15/04/2021</div>
          </div>
        </span>


        <span class="card text-white bg-primary card-OS onPass" style="max-width: 18rem;">
          <div class="card-header TitVerde"></div>
          <div class="card-body ">
            <h5 class="card-title">Leonardo Milani Pizzi</h5>
            <p>
              <b>
                Veiculo(s):
              </b>
              <br>
              <i>Gol Mi 1.6</i>
            </p>
            <br>
            <div class="card-text">Revisões efetuadas: 1</div>
            <div class="card-text">Última revisão: 22/03/2021</div>
          </div>
        </span>


      </div>


      <!-- Corpo  Fim -->
    </div>
  </div>
</div>


<?php
// Incluí o cabeçalho
include "../../components/2-footer.php";

?>

<script>
  function atualizarPagina() {
    window.location.href = "<?= SIS_URL_LISOS ?>";
  }

  function cadastrarOrdem() {
    window.location.href = "<?= SIS_URL_CADOS ?>";
  }


  $(document).ready(function() {

    $(".cpf").mask("000.000.000-00");
    $(".tel").mask("(00) 0 0000-0000");
  });
</script>