<?php

require_once '../../../init.php';

require('../../components/bd/Autenticacao.php');
Autenticacao::check();
$usuario = $_SESSION['USUARIO'];



// require('Components/Conexao.php');
// require('Components/Dashboard.php');
// require('Components/Fila.php');
// require('Components/Crd.php');

// $conexao = new Conexao();
// $dashboard = new Dashboard();

// $fila = new Fila($conexao, $dashboard);
// $crd = new Crd($conexao, $dashboard);


// // Consulta todos os registros
// $objetos = $crd->getTiposDocumentos();

// Incluí o cabeçalho
include "../../components/1-header.php";

?>

<div class="container-fluid ">


  <div class="col-md-12">
    <div class="card">
      <div class="card-header">

        <h5 class="text-left">Veiculos <span class="atualizar" onclick="atualizarPagina()">Atualizar </span> <span class="incluir" onclick="cadastrarTipo()">Incluir </span> </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered thead-light data-table" id="dataTableAll" width="100%" cellspacing="0">
            <thead>
              <tr style="background: #ffffff; color: #5f5f5f;">
                <!-- <th scope="col">ID</th> -->
                <th scope="col" style="text-align:center">Código</th>
                <th scope="col" style="text-align:left">Descrição</th>
                <th scope="col" style="text-align:center">Validade</th>
                <th scope="col" style="text-align:center">Situação</th>
                <th scope="col" style="text-align:center">Opções</th>

              </tr>
            </thead>
            <tbody>
              <?php if (!empty($objetos)) { ?>
                <?php foreach ($objetos as $item) { ?>
                  <tr>

                    <td style="text-align:center;width: 5%;"><?= utf8_encode($item->CODDOC) ?></td>
                    <td style="text-align:left; width: 45%;"><?= $item->DESTIP ?></td>
                    <td style="text-align:center; width: 10%;"><?= $item->DIAVAL ?> dias</td>
                    <td style="text-align:center; width: 10%;"><?= $item->SITTIP == 'A' ? 'Ativo' : 'Inativo' ?></td>

                    <td style="text-align:center; width: 5%;"" class=" btn-acoes">
                      <a class="btn btn-outline-danger btn-sm" href="excluir_tipo_documento?id=<?= $item->CODDOC ?>" role="button"><i class="far fa-trash-alt"></i></a>
                      <a class="btn btn-outline-secondary btn-sm" href="editar_tipo_documento?id=<?= $item->CODDOC ?>" role="button"><i class="fas fa-pen"></i></a>
                    </td>

                  </tr>
                <?php } ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
// Incluí o rodape
include "../../components/2-footer.php";
?>

<script>
  function salvarDados() {
    // $('.form-senha').submit();
  }

  function atualizarPagina() {
    window.location.href = "<?= SIS_URL_LISTIPDOC ?>";
  }

  function cadastrarTipo() {
    window.location.href = "<?= SIS_URL_CADTIPDOC ?>";
  }

  function atualizar_senha() {
    // window.location.href = "atualizar_senha.php";
  }
</script>