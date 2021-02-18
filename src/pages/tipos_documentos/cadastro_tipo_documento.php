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


// Incluí o cabeçalho
include "1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header">
          <h5 class="text-left"><a href="#" title="Cadastro Senha" class="link">Cadastrar Tipo Documento</a></h5>
        </div>

        <div class="card-body">
          <form class="form-tipdoc" action="gerar_tipo_documento.php" method="POST">
            <div class="col-md-12 ">
              <div class="row justify-content-md-center">




                <div class="col-md-10">
                  <div class="form-group">
                    <label>Descrição documento</label>
                    <input type="text" class="form-control" name="desdoc" placeholder="Descrição" autofocus="true" required>
                  </div>
                </div>

                </br>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Dias válidos</label>
                    <input type="number" class="form-control" name="diaval" placeholder="Dias em validade" required>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Situação</label>
                    <select class="form-control" name="sittip" placeholder="Situação" required>
                      <option value="A" selected>Ativo</option>
                      <option value="I">Inativo</option>
                    </select>
                  </div>
                </div>


              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row justify-content-md-center">
                  <div class="form-label-group">
                    <button class="btn btn-sm btn-primary btn-registrar " onclick="salvarDados();">INCLUIR</button>
                  </div>
                </div>
              </div>
          </form>
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
      </script>