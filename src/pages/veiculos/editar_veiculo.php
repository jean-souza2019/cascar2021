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
$objetos = $crd->getEditTiposDocumentos($_GET['id']);

// Incluí o cabeçalho
include "1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header">
          <h5 class="text-left"><a href="#" title="Cadastro Senha" class="link">Editar Cadastro Tipo Documento</a></h5>
        </div>

        <div class="card-body">
          <form class="form-tipdoc" action="update_tipo_documento.php" method="POST">
            <div class="col-md-12 ">

              <div class="row justify-content-md-center">
                <div class="col-md-1">
                  <div class="form-group ">
                    <span style="margin-left: 20px;">ID</span>
                    <input type="text" class="form-control" name="coddoc" placeholder="Código" autofocus="true" value="<?php foreach ($objetos as $objeto) echo $objeto->CODDOC ?>" readonly=“true”>

                  </div>
                </div>
              </div>

              <div class="row justify-content-md-center">
                <div class="col-md-10">
                  <div class="form-group">
                    <label>Descrição documento</label>
                    <input type="text" class="form-control" name="desdoc" placeholder="Descrição" autofocus="true" value="<?php foreach ($objetos as $objeto) echo $objeto->DESTIP ?>" required>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Dias válidos</label>
                    <input type="number" class="form-control" name="diaval" placeholder="Dias em validade" value="<?php foreach ($objetos as $objeto) echo $objeto->DIAVAL ?>" required>
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Situação</label>
                    <select class="form-control" name="sittip" placeholder="Situação" required>
                      <option value="A" <?php foreach ($objetos as $objeto) {
                                          echo ($objeto->SITTIP == 'A') ? ' selected ' : '';
                                        } ?>>Ativo</option>
                      <option value="I" <?php foreach ($objetos as $objeto) {
                                          echo ($objeto->SITTIP == 'I') ? ' selected ' : '';
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
          $('.form-tipdoc').submit();

        }

        function verificarNumero() {
          if (form.diaval.value <= 0) {
            alert("Não pode ser negativoo")
          }
        }


        function cancelar() {
          Response.Redirect("http://WWW.SITE_DESTINO.COM.BR");
        }

        function atualizarPagina() {
          window.location.href = "<?= SIS_URL_EDITTIPDOC ?>";
        }
      </script>