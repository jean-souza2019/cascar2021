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
          <h5 class="text-left">Item Individual<span class="voltar cCza" onclick="voltar()">Voltar </span> <span class="excluir" onclick="excluir()">Excluir </span> <span class="incluir" onclick="editarItem()">Editar </span></h5>
        </div>


        <div class="card-body">
          <!-- <form class="form-caditem" action="gerar_item" method="POST" enctype="multipart/form-data"> -->
          <div class="col-md-12">
            <div class="row justify-content-md-center">

              <div class="col-md-2">
                <div class="form-group">
                  <label>Código</label>
                  <input class="form-control" id="codigo" name="codigo" value="<?= $objetos[0]['CODIGO'] ?>" autofocus="true" readonly="false ">
                </div>
              </div>


              <div class="col-md-8">
                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $objetos[0]['DESCRICAO'] ?>" autofocus="true" readonly="false ">
                </div>
              </div>


              <div class="col-md-3">
                <div class="form-group">
                  <label>Endereçamento</label>
                  <input class="form-control" id="enderecamento" name="enderecamento" value="<?= $objetos[0]['ENDERECAMENTO'] ?>" autofocus="true" readonly="false ">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Valor Unitário</label>
                  <input class="form-control" id="valor" name="valor" value="<?= $objetos[0]['VALOR'] ?>" autofocus="true" readonly="false ">
                </div>
              </div>


              <div class="col-md-2  ">
                <div class="form-group">
                  <label>Quantidade Estoque</label>
                  <input class="form-control" id="quantidade_estoque" name="quantidade_estoque" value="<?= $objetos[0]['QUANTIDADE_ESTOQUE'] ?>" autofocus="true" readonly="false ">
                </div>
              </div>

              <div class="col-md-3  ">
                <div class="form-group center">
                  <?php if ($objetos[0]['IMAGEM']) {  ?>
                    <img src="<?= $objetos[0]['IMAGEM'] ?>" class="imgObj" alt="<?= $objetos[0]['DESCRICAO'] ?>" width="200">
                  <?php }else{ ?>
                    <img src="<?= SIS_URL_IMG ?>" alt="Produto Sem Imagem ?>" width="120">
                  <?php } ?>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

      <?php
      // Incluí o cabeçalho
      include "../../components/2-footer.php";
      ?>

      <script>
        // function salvarDados() {
        // $('.form-i').submit();

        // }

        $(document).ready(function() {
          $("#enderecamento").mask("AA-AA-AA-AA");
        });

        function editarItem() {
          window.location.href = "<?= SIS_URL_EDITITEM ?>?item=<?= $objetos[0]['CODIGO'] ?>";

        }

        function voltar() {
          window.location.href = "<?= SIS_URL_LISEST ?>";
        }


        function excluir() {
          window.location.href = "<?= SIS_URL_EXCLITEM ?>?item=<?= $objetos[0]['CODIGO'] ?>";
        }
      </script>