<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');


$conexao = new Conexao();
// $crd = new Crd($conexao);

// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header azulcascar">
          <h5 class="text-left"><a href="#" title="Item de Estoque" class="link">Cadastrar Item de Estoque</a></h5>
        </div>

        <div class="card-body">
          <form class="form-caditem" action="gerar_item" method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="row">

                <div class="col-md-8">
                  <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Endereçamento</label>
                    <input class="form-control" id="enderecamento" name="enderecamento" placeholder="" autofocus="true">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Valor</label>
                    <input class="form-control" id="valor" name="valor" placeholder="" autofocus="true">
                  </div>
                </div>


                <div class="col-md-2  ">
                  <div class="form-group">
                    <label>Quantidade Atual Estoque</label>
                    <input class="form-control" id="quantidade_estoque" name="quantidade_estoque" value="1" placeholder="" autofocus="true">
                  </div>
                </div>

                <div class="col-md-4  ">
                  <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" class="form-control" name="imagem" id="imagem" />
                  </div>
                </div>

              </div>
            </div>
          </form>

          <div class="row">
            <div class="col-md-12">
              <div class="row justify-content-md-center">
                <div class="form-label-group">
                  <button class="btn btn-sm btn-primary btn-registrar " onclick="salvarDados();">
                    INCLUIR
                  </button>
                </div>
              </div>
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
      function salvarDados() {
        $('.form-caditem').submit();
      }



      $(document).ready(function() {
        // Tratamento para input de valor ser apenas número
        document.getElementById("valor").onkeypress = function(e) {
          var chr = String.fromCharCode(e.which);
          if ("1234567890".indexOf(chr) < 0)
            return false;
        };

        // Tratamento para input de quantidade estoque ser apenas número
        document.getElementById("quantidade_estoque").onkeypress = function(e) {
          var chr = String.fromCharCode(e.which);
          if ("1234567890".indexOf(chr) < 0)
            return false;
        };
      });
    </script>