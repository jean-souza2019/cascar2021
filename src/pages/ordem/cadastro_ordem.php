<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');

// var_dump($_SESSION['carrinho']);
// echo("</br>");
// var_dump($_SESSION['cliente']);


$conexao = new Conexao();
$crd = new Crd($conexao);

$OSID = $crd->getOS();
$CLIENTES = $crd->getClientes();
$PRODUTOS = $crd->getEstoque();

$os = $OSID['ID'] + 1;
// var_dump($_SESSION['cliente']); 

// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header azulcascar">
          <h5 class="text-left"><a href="#" title="Cadastrar Cliente" class="link">Cadastrar Nova Ordem</a></h5>
        </div>

        <div class="card-body ">
          <div class="col-md-12 ">
            <!-- justify-content-md-center -->
            <div class="row justify-content-md-center">

              <div class="col-md-2">
                <div class="form-group">
                  <label>OS</label>
                  <div class="row justify-content-md-center">
                    <input type="text" class="form-control" id="os" value="<?= $os ?>" name="os" readonly="true">
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Cliente</label>
                  <select class="form-control" id="cliente" name="cliente" onchange="addCli()">
                    <!-- <select class="form-control" id="cliente" name="cliente" > -->
                    <?php if (!$_SESSION['cliente']) { ?>
                      <option value=""></option>
                    <?php } ?>
                    <?php foreach ($CLIENTES as $cli) { ?>
                      <option value="<?= $cli['ID'] ?>" <?= ($cli['ID'] === $_SESSION['cliente'] ? 'selected' : '') ?>><?= $cli['NOME'] ?></option>
                    <?php } ?>

                  </select>
                </div>
              </div>



            </div>
          </div>
          <div class="row justify-content-md-center">`
            <div class="col-md-8">
              <?php require_once('./carrinhoOrdem/carrinhoIndex.php');
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row justify-content-md-center">
                <div class="form-label-group">
                  <button class="btn btn-sm btn-primary btn-registrar " onclick="finalizar()">
                    Finalizar
                  </button>

                </div>
              </div>
            </div>
          </div>
          <?php
          // var_dump($_SESSION);
          ?>
        </div>
      </div>
    </div>

    <?php
    // Incluí o rodapé
    include "../../components/2-footer.php";

    ?>

    <script>
      function addCli() {
        cliente = document.getElementById('cliente').value;
        $.ajax({
          url: 'carrinhoOrdem/addCliOs.php',
          type: 'POST',
          data: {
            cliente: $('#cliente').val()
          },
          success: function(data) {}
        });
      }

      function finalizar() {
        window.location.href = "<?= SIS_URL_FIMOS ?>?os=<?= $os ?>&cliente=<?= $_SESSION['cliente'] ?>";
      }

      $(document).ready(function() {
        $('#cliente').select2();

      });
    </script>