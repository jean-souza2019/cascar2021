<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');


$conexao = new Conexao();
$crd = new Crd($conexao);

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
          <form class="form-cadcli" action="gerar_cliente" method="POST">
            <div class="col-md-12 ">
              <!-- justify-content-md-center -->
              <div class="row justify-content-md-center">

                <div class="col-md-1">
                  <div class="form-group">
                    <label>OS</label>
                    <input type="text" class="form-control" id="os" name="os" placeholder="" autofocus="true" readonly="true">
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group">
                    <label>Cliente</label>
                    <input type="text" class="form-control" id="cliente" name="cliente" placeholder="" autofocus="true">
                  </div>
                </div>



              </div>
            </div>
            <div class="row justify-content-md-center">`
              <div class="col-md-8">
                <?php require_once './carrinhoOrdem/carrinhoIndex.php';
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row justify-content-md-center">
                  <div class="form-label-group">
                    <button class="btn btn-sm btn-primary btn-registrar " onclick="salvarDados();">
                      Finalizar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
    // Incluí o rodapé
    include "../../components/2-footer.php";

    ?>

    <script>
      function salvarDados() {
        $('.form-cadcli').submit();
      }
    </script>