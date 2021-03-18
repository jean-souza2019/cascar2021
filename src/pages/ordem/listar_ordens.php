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
        <h5 class="text-left">Ordens de Serviço em andamento <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> <span class="incluir" onclick="cadastrarOrdem()">Incluir </span> </h5>
      </div>
      <!-- Corpo  Inicio -->


      <div class="card-body center">

        <span class="card text-white bg-primary card-OS" style="max-width: 18rem;">
          <div class="card-header TitVerde">Ordem 22450 - Em andamento</div>
          <div class="card-body">
            <h5 class="card-title">Jean Marcos de Souza</h5>
            <p>Veiculo: <i>Golf</i></p>
            <span class="card-text"> Criação: <i>01/03/2021</i></span>
            <br>
            <span class="card-text">Previsão de Entrega:<i> 15/04/2021</i></span>
          </div>
        </span>


        <span class="card text-white bg-primary card-OS" style="max-width: 18rem;">
          <div class="card-header TitVerde">Ordem 22452 - Em andamento</div>
          <div class="card-body">
            <h5 class="card-title">Joao da Silva</h5>
            <p>Veiculo: <i>Opala</i></p>
            <span class="card-text"> Criação: <i>15/02/2021</i></span>
            <br>
            <span class="card-text">Previsão de Entrega:<i> 16/03/2021</i></span>
          </div>
        </span>

        <span class="card text-white bg-primary card-OS" style="max-width: 18rem;">
          <div class="card-header TitAmarelo">Ordem 22453 - Suspensa</div>
          <div class="card-body">
            <h5 class="card-title">Leonardo Milani Pizzi</h5>
            <p>Veiculo: <i>Fox</i></p>
            <span class="card-text"> Criação: <i>16/03/2021</i></span>
            <br>
            <span class="card-text">Previsão de Entrega:<i> 20/03/2021</i></span>
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
    // window.location.href = "<?= SIS_URL_CADOS ?>";
  }


  $(document).ready(function() {

    $(".cpf").mask("000.000.000-00");
    $(".tel").mask("(00) 0 0000-0000");
  });
</script>