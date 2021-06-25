<?php
require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];

require('../../components/bd/Conexao.php');
require('../../components/bd/Crd.php');


$conexao = new Conexao();
$crd = new Crd($conexao);


$objetos = $crd->getItemPnl($_GET['item']);


// Incluí o cabeçalho
include "../../components/1-header.php";
?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class='card card-formulario'>
        <div class="card-header azulcascar">
          <h5 class="text-left"><a href="#" title="Editar Item" class="link">Editar Item de Estoque</a></h5>
        </div>

        <div class="card-body">
          <form class="form-edititem" action="update_item" method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="row">

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Código</label>
                    <input class="form-control" id="codigo" name="codigo" value="<?= $objetos[0]['CODIGO'] ?>" autofocus="true" readonly="false ">
                  </div>
                </div>


                <div class="col-md-8">
                  <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $objetos[0]['DESCRICAO'] ?>" autofocus="true">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                    <label>Endereçamento</label>
                    <input class="form-control" id="enderecamento" name="enderecamento" value="<?= $objetos[0]['ENDERECAMENTO'] ?>" autofocus="true">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Valor Unitário</label>
                    <input class="form-control" id="valor" name="valor" value="<?= $objetos[0]['VALOR'] ?>" autofocus="true">
                  </div>
                </div>


                <div class="col-md-2  ">
                  <div class="form-group">
                    <label>Quantidade Estoque</label>
                    <input class="form-control" id="quantidade_estoque" name="quantidade_estoque" value="<?= $objetos[0]['QUANTIDADE_ESTOQUE'] ?>" autofocus="true">
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
                    Salvar
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
        $('.form-edititem').submit();
      }



      $(document).ready(function() {
        var imagem = document.getElementById('imagem');
        imagem.src = "teste";



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