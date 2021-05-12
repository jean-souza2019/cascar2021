<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

$conexao = new Conexao();
$crd = new Crd($conexao);

$cliente = $_GET['cliente'];
$Ordem = $_GET['ordem'];

$dados_ordem = $crd->getOSsCliente($cliente, $Ordem);

// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header azulcascar">
          <h5 class="text-left"><a href="#" title="Listar Ordem" class="link">Listar Ordem</a> <span class="voltar3" onclick="voltar(<?= $cliente ?>)">voltar </span></h5>
        </div>

        <div class="card-body ">
          <div class="col-md-12 ">
            <!-- justify-content-md-center -->
            <div class="row justify-content-md-center">

              <div class="col-md-2">
                <div class="form-group">
                  <label>OS</label>
                  <div class="row justify-content-md-center">
                    <input type="text" class="form-control" id="os" value="<?= $dados_ordem[0]['OS'] ?>" name="os" readonly="true">
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Cliente</label>
                  <div class="row justify-content-md-center">
                    <input type="text" class="form-control" id="cliente" value="<?= $dados_ordem[0]['NOME'] ?>" name="cliente" readonly="true">
                  </div>

                </div>
              </div>



            </div>
          </div>
          <div class="row justify-content-md-center">`
            <div class="col-md-8">
              <?php require_once('./carrinhoOrdem/carrinhoListar.php');
              ?>
            </div>
          </div>

        </div>
      </div>
    </div>

    <?php
    // Incluí o rodapé
    include "../../components/2-footer.php";

    ?>

    <script>
      function voltar(cliente) {
        window.location.href = "<?= SIS_URL_LISOSCLI ?>?cli=" + cliente;
      }
    </script>