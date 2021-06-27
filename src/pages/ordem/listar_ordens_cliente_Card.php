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

$Cliente = $_GET['cli'];
$Ordens = $crd->getOSCliente($Cliente);
$Dados_cliente = $crd->getClientePnl($Cliente);




// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">

      <!-- Titulo -->
      <div class="card-header azulcascar">
        <h5 class="text-left">Ordens de Serviço<span class="atualizar" onclick="atualizarPagina(<?= $Cliente ?>)">Atualizar </span> <span class="voltar2" onclick="voltar()">Voltar </span> </h5>
      </div>
      <!-- Corpo  Inicio -->


      <div class="card-body center ">
        <h5> Cliente: <b><?= $Dados_cliente[0]['NOME'] ?></b></h5>
        <br>

        <?php foreach ($Ordens as $ordem) { ?>
          <span class="card text-white bg-primary card-OS onPass" style="max-width: 18rem;" onclick="moveOrdem(<?= $Cliente ?>,<?= $ordem['OS'] ?>)">
            <div class="card-header TitVerde"></div>
            <div class="card-body ">
              <h5 class="card-title">Ordem: <?= $ordem['OS'] ?></h5>


              <div class="card-text">Data: <?php
                                            $dt = explode("-", $ordem['DATA']);
                                            echo ($dt[2] . "/" . $dt[1] . "/"
                                              . $dt[0]);



                                            ?></div>

              <div class="card-text">Itens: <?= $ordem['QTD_ITENS'] ?></div>
              <br>

              <h6>
                <div class="card-text">Total: R$ <span class="valor_total"><?= $ordem['VLR_TOTAL'] ?></span></div>
              </h6>
            </div>
          </span>

        <?php } ?>


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
  function moveOrdem(cliente, ordem) {
    window.location.href = "<?= SIS_URL_LISORD ?>?cliente=" + cliente + "&ordem=" + ordem;
  }

  function atualizarPagina(i) {
    window.location.href = "<?= SIS_URL_LISOSCLI ?>?cli=" + i;
  }

  function voltar() {
    window.location.href = "<?= SIS_URL_LISOS ?>";
  }


  $(document).ready(function() {

    $(".valor_total").mask("000.000.000", {
      reverse: true
    });
    $(".cpf").mask("000.000.000-00");
    $(".tel").mask("(00) 0 0000-0000");
  });
</script>