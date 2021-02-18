<?php

require_once 'init.php';

require('Components/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('Components/Conexao.php');
require('Components/Dashboard.php');
require('Components/Crd.php');

$conexao = new Conexao();
$dashboard = new Dashboard();
$crd = new Crd($conexao, $dashboard);

// Consulta todos os registros
$objetos = $crd->getFornecedoresPnl($_GET['id']);
// print_r($objetos);

// Incluí o cabeçalho
include "1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header">
          <h5 class="text-left"><a href="#" title="Cadastro Senha" class="link">Editar Cadastro Fornecedor</a></h5>
        </div>

        <div class="card-body">
          <form class="form-forn" action="update_fornecedor.php" method="POST">
            <div class="col-md-12">
              <div class="row">

                <div class="col-md-2">
                  <div class="form-group">
                    <label>CNPJ*</label>
                    <input type="text" class="form-control" onchange="buscarFornecedor();buscarCodFornecedor();" id="cgccpf" name="cgccpf" placeholder="" autofocus="true" value="<?php foreach ($objetos as $objeto) echo $objeto->CGCCPF ?>" readonly=“true”>
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label>Código</label>
                    <input type="text" class="form-control" id="codfor" name="codfor" placeholder="" autofocus="true" value="<?php foreach ($objetos as $objeto) echo $objeto->CODFOR ?>" readonly=“true”>
                  </div>
                </div>


                <div class="col-md-8">
                  <div class="form-group">
                    <label>Fornecedor</label>
                    <input type="text" class="form-control" id="nomfor" name="nomfor" placeholder="" autofocus="true" value="<?php foreach ($objetos as $objeto) echo $objeto->NOMFOR ?>" readonly=“true”>
                  </div>
                </div>



                <div class="col-md-1">
                  <div class="form-group">
                    <label>Situação</label>
                    <select class="form-control" name="sitfor" placeholder="Situação" required>
                      <option value="A" <?php foreach ($objetos as $objeto) {
                                          echo ($objeto->SITFOR == 'A') ? ' selected ' : '';
                                        } ?>>Ativo</option>
                      <option value="I" <?php foreach ($objetos as $objeto) {
                                          echo ($objeto->SITFOR == 'I') ? ' selected ' : '';
                                        } ?>>Inativo</option>
                    </select>
                  </div>
                </div>

                </br>

              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row justify-content-md-center">

                  <div class="form-label-group">
                    <button class="btn btn-sm btn-primary btn-registrar " onclick="salvarDados();">SALVAR</button>
                  </div>
                </div>
              </div>
          </form>
          <!-- <button class="btn btn-sm btn-primary btn-registrar " onclick="">Cancelar</button> -->
        </div>
      </div>

      <?php
      // Incluí o cabeçalho
      include "2-footer.php";
      ?>

      <script>
        function salvarDados() {
          $('.form-forn').submit();

        }


        function cancelar() {
          Response.Redirect("http://WWW.SITE_DESTINO.COM.BR");
        }

        function atualizarPagina() {
          window.location.href = "<?= SIS_URL_EDITFORN ?>";
        }
      </script>